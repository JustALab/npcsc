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
            $result = $db->insertOperation('users',$regFormElements);
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
        $query = "INSERT INTO wallet (user_id) VALUES ('$userId')";
        mysqli_query($dbc, $query);
    }

    function checkIfUserExists($email){
        global $dbc;
        $query = 'SELECT * FROM users WHERE email = "'.$email.'"';
        $result = mysqli_query($dbc, $query);
        if(mysqli_num_rows($result) > 0) {
            return true;
        }
        return false;
    }

	function updateStatus(){
        global $dbc;
        return array("status"=>"success","message"=>"User approved.");
    }

?>