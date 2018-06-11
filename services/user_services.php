<?php
	require 'formwrapper.php' ;
	require '../pages/dbconfig.php';
	require 'dbwrapper_mysqli.php';
	require 'constants.php';

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
	    default:
	        $finaloutput = array("infocode" => "INVALIDACTION", "message" => "Irrelevant action");
	}

	echo json_encode($finaloutput);

    function registerUser(){
        global $db, $form;
        $regFormElements = array("name" => "name", "email" => "email", "password" => "password", "mobile" => "mobile", "aadhaar_no" => "aadhaar_no", "pan_no" => "pan_no", "address" => "address");
        $regFormElements = $form->getFormValues($regFormElements, $_POST);
        $options = array('cost' => 12);
        $regFormElements['password'] = password_hash($regFormElements['password'], PASSWORD_BCRYPT, $options);
        if(!checkIfUserExists($regFormElements['email'])){
            $result = $db->insertOperation(TABLE_USERS,$regFormElements);
            //file_put_contents("formlog.log", print_r( $regFormElements, true ));
            if($result['status'] == 'success'){
                $lastInsertId = $result['last_insert_id'];
                return array("status"=>"success","message"=>"User registered successfully. Please wait for approval.");
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
            }
            return array("status"=>"success","message"=>"User status successfully updated.");
        }
        return array("status"=>"failure","message"=>"User status update failure.");
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
            file_put_contents("formlog.log", print_r( true, true ));

            return true;
        }
        file_put_contents("formlog.log", print_r( $password, true ));
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

?>