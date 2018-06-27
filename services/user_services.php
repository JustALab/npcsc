<?php
	require 'formwrapper.php' ;
	require '../pages/dbconfig.php';
	require 'dbwrapper_mysqli.php';
	require 'constants.php';
    require 'common_methods.php';
    require 'config/mail_config.php';
    require '../assets/php_mailer/src/PHPMailer.php';
    require '../assets/php_mailer/src/SMTP.php';
    require '../assets/php_mailer/src/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

	$db = new DBWrapper($dbc);
	$form = new FormWrapper();
	
	$finaloutput = array();
	if(!$_POST) {
		$action = $_GET['action'];
	}
	else {
		$action = $_POST['action'];
	}
	switch($action){
	    case 'register_user':
	        $finaloutput = registerUser();
	    break;
        case 'login_user':
            $finaloutput = loginUser();
        break;
        case 'update_status':
            $finaloutput = updateStatus();
        break;
        case 'update_profile':
            $finaloutput = updateProfile();
        break;
        case 'update_password':
            $finaloutput = updatePassword();
        break;
        case 'validate_email':
            $finaloutput = validateEmail();
        break;
        case 'reset_password':
            $finaloutput = resetPassword();
        break;
	    default:
	        $finaloutput = array("infocode" => "INVALIDACTION", "message" => "Irrelevant action");
	}

	echo json_encode($finaloutput);

    function registerUser(){
        global $db, $form;
        $regFormElements = array("name" => "name", "email" => "email", "password" => "password", "mobile" => "mobile", "aadhaar_no" => "aadhaar_no", "pan_no" => "pan_no", "address" => "address", "user_location" => "user_location");
        $regFormElements = $form->getFormValues($regFormElements, $_POST);
        $options = array('cost' => 12);
        $regFormElements['password'] = password_hash($regFormElements['password'], PASSWORD_BCRYPT, $options);
        if(!checkIfUserExists($regFormElements['email'])){
            $result = $db->insertOperation(TABLE_USERS,$regFormElements);
            //file_put_contents("formlog.log", print_r( $regFormElements, true ));
            if($result['status'] == 'success'){
                $lastInsertId = $result['last_insert_id'];
                return array("status"=>"success","message"=>"User registered successfully. <br />Your Narpavi User ID is <b><span style='color:red;'>".addUserIdPadding($result['last_insert_id'])."</span></b>. Please note down this user ID for login in the future. <br/>You can login after approval. <br /> You will receive mail after approval by the admin. Please check your inbox or <b><span style='color:red;'>SPAM</span></b> folder for mail.");
            } else {
                return array("status"=>"failure","message"=>"User registration failure.");
            }
        }
        return array("status"=>"failure","message"=>"User already exists.");
    }

    /**
     * call this method when the user is approved by the admin.
     */
    function createWalletForUser($userId){
        global $dbc;
        $query = "INSERT INTO ".TABLE_WALLET." (user_id) VALUES ('$userId')";
        mysqli_query($dbc, $query);
    }

    function checkIfUserExists($email){
        global $dbc;
        $query = 'SELECT * FROM '.TABLE_USERS.' WHERE email = "'.$email.'"';
        $result = mysqli_query($dbc, $query);
        if(mysqli_num_rows($result) > 0) {
            return true;
        }
        return false;
    }

    function getPreviousStatus($userId){
        global $dbc;
        $query = "SELECT status FROM ".TABLE_USERS." WHERE user_id='$userId'";
        $result = mysqli_query($dbc, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['status'];
    }

	function updateStatus(){
        global $db;
        $userId = $_POST['user_id'];
        $oldStatus = getPreviousStatus($userId);
        $newStatus = $_POST['new_status'];
        $result = $db->updateOperation(TABLE_USERS, array('status'=>$newStatus), array('user_id'=>$userId));
        // file_put_contents("formlog.log", print_r( $result, true ));
        if($result['status'] == 'success'){
            if($oldStatus == STATUS_PENDING && $newStatus == STATUS_APPROVED){
              createWalletForUser($userId);  
              $toEmail = getEmailByUserId($userId);
              $subject = 'Your New Account Activated';
              $message = 'Welcome to Narpavi Common Services Center portal. Your registration has been approved. Your Narpavi CSC User ID is <b>' . addUserIdPadding($userId) . '</b>. Please use this ID to login into the portal.';
              sendMailToUser($toEmail, $subject, $message);
            }
            return array("status"=>"success","message"=>"User status successfully updated.");
        } else {
            return array("status"=>"failure","message"=>"User status update failure.");
        }
    }

    function updateProfile(){
        global $db;
        $userId = $_POST['user_id'];
        $mobile = $_POST['edit_mobile'];
        $address = $_POST['edit_address'];
        $result = $db->updateOperation(TABLE_USERS, array('mobile' => $mobile, 'address' => $address), array('user_id' => $userId));
        if($result['status'] == 'success'){
            return array("status"=>"success","message"=>"Profile successfully updated.");
        }
        return array("status"=>"failure","message"=>"Profile update failure.");
    }

    function compareOldPassword($userId, $oldPassword){
        global $dbc;
        $query = "SELECT password FROM ".TABLE_USERS." WHERE user_id='$userId'";
        $result = mysqli_query($dbc, $query);
        $password = mysqli_fetch_assoc($result)['password'];

        if(password_verify($oldPassword, $password)){
            return true;
        }
        return false;
    }

    function updatePassword(){
        global $db, $dbc;
        $userId = $_POST['user_id'];
        $oldPassword = mysqli_real_escape_string($dbc,trim($_POST['old_password']));
        $newPassword = mysqli_real_escape_string($dbc,trim($_POST['new_password']));
        $options = array('cost' => 12);
        $newPassword = password_hash($newPassword, PASSWORD_BCRYPT, $options);
        if(compareOldPassword($userId, $oldPassword)){
            $result = $db->updateOperation(TABLE_USERS, array('password' => $newPassword), array('user_id' => $userId));
            if($result['status'] == 'success'){
                return array("status"=>"success","message"=>"Password successfully updated.");
            }
            return array("status"=>"failure","message"=>"Password update failure.");
        }
        return array("status"=>"failure","message"=>"Entered old password does mot match!");
    }

    function validateEmail(){
        global $dbc;
        $email = $_POST['email'];
        $query = 'SELECT * FROM '.TABLE_USERS.' WHERE email="'.$email.'"';
        // file_put_contents("formlog.log", print_r( $query, true ));
        $result = mysqli_query($dbc, $query);
        if(mysqli_num_rows($result) > 0){
            return array("status"=>"success");
        }
        return array("status"=>"failure");
    }

    function randomPassword(){
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    function resetPassword(){
        global $db, $dbc;
        $email = $_POST['email'];
        $newPassword = randomPassword();
        // file_put_contents("formlog.log", print_r( $newPassword, true ));
        $options = array('cost' => 12);
        $newPasswordHash = password_hash($newPassword, PASSWORD_BCRYPT, $options);
        $result = $db->updateOperation(TABLE_USERS, array('password' => $newPasswordHash), array('email' => $email));
        if($result['status'] == 'success'){
            $subject = 'Your New Password';
            $message = 'Please login and change this password. Your new password is <b>' .$newPassword. '</b>.';
            sendMailToUser($email, $subject, $message);
            $output = array("status"=>"success","message"=>"Password successfully updated.");
        } else {
            $output = array("status"=>"failure","message"=>"Password update failure.");
        }
        return $output;
    }

    function sendMailToUser($toEmail, $subject, $message){
        $mail = new PHPMailer(true);                            
        try {
            //Server settings
            // $mail->SMTPDebug = 1;                                 
            // $mail->isSMTP();                                      
            // $mail->Host = MAIL_HOST;
            // $mail->SMTPAuth = true;                               
            // $mail->Username = MAIL_ADDR;                 
            // $mail->Password = MAIL_PWD;                          
            // $mail->SMTPSecure = 'ssl';                            
            // $mail->Port = 465;     

            $mail->setFrom(MAIL_ADDR, 'Narpavi CSC');
            $mail->addAddress($toEmail, '');     // Add a recipient
            $mail->addReplyTo('no-reply@narpavicsc.com', 'No-Reply');

            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;

            if(!$mail->send()){
                file_put_contents("php_mailer_error.log",print_r($e, true), FILE_APPEND | LOCK_EX);
            } 
        } catch (Exception $e) {
            file_put_contents("php_mailer_error.log",print_r($e, true), FILE_APPEND | LOCK_EX);
        }
    }

?>