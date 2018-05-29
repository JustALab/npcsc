<?php
	require 'formwrapper.php' ;
	require '../pages/dbconfig.php';
	require 'dbwrapper_mysqli.php';
	require 'constants.php';

	define('PHOTO_PATH', 'store/photos/');
	define('SIGNATURE_PATH', 'store/signatures/');
	define('DOC_PATH', 'store/documents/');

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
	    case 'process_pan':
	        $finaloutput = processPan();
	    break;
	    default:
	        $finaloutput = array("infocode" => "INVALIDACTION", "message" => "Irrelevant action");
	}

	echo json_encode($finaloutput);

	function processPan(){
		global $db, $form;
		$panFormElements = array("application_date" => "application_date", "application_type" => "application_type", "pan_number" => "pan_number", "applicant_category" => "applicant_category", "applicant_title" => "applicant_title", "applicant_fname" => "applicant_fname", "applicant_mname" => "applicant_mname", "applicant_lname" => "applicant_lname", "father_fname" => "father_fname", "father_mname" => "father_mname", "father_lname" => "father_lname", "name_on_card" => "name_on_card", "dob" => "dob", "contact_details" => "contact_details", "email" => "email", "name_as_per_aadhaar" => "name_as_per_aadhaar", "proof_of_id" => "proof_of_id", "proof_of_address" => "proof_of_address", "proof_of_dob" => "proof_of_dob", "gender" => "gender", "aadhaar_no" => "aadhaar_no", "flat_door_block_no" => "flat_door_block_no", "premises_building_village" => "premises_building_village", "road_street_lane_postoffice" => "road_street_lane_postoffice", "area_taluk_subdivision" => "area_taluk_subdivision", "town_district" => "town_district", "state_ut" => "state_ut", "pin_code" => "pin_code", "user_id" => "user_id"); 
		$panFormElements = $form->getFormValues($panFormElements,$_POST);

		if(isset($_FILES['photo']['name'])){
			$fileExtenstion = explode('.', $_FILES['photo']['name']);
    		$photoFname = $_POST['user_id'].'_'.$_POST['aadhaar_no'].'_photo';
    		$photoPath = PHOTO_PATH.$photoFname.'.'.$fileExtenstion[1];
    		$panFormElements['photo_path'] = $photoPath;
    		if(!move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath)){
    			$output = array("infocode" => "FILEUPLOADERR", "message" => "Unable to upload photo, please try again!");
    		}
    	}

    	if(isset($_FILES['signature']['name'])){
    		$fileExtenstion = explode('.', $_FILES['signature']['name']);
    		$signatureFname = $_POST['user_id'].'_'.$_POST['aadhaar_no'].'_sign';
    		$signaturePath = SIGNATURE_PATH.$signatureFname.'.'.$fileExtenstion[1];
    		$panFormElements['signature_path'] = $signaturePath;
    		if(!move_uploaded_file($_FILES['signature']['tmp_name'], $signaturePath)){
    			$output = array("infocode" => "FILEUPLOADERR", "message" => "Unable to upload signature, please try again!");
    		}
    	}

    	if(isset($_FILES['document']['name'])){
    		$fileExtenstion = explode('.', $_FILES['document']['name']);
    		$documentFname = $_POST['user_id'].'_'.$_POST['aadhaar_no'].'_doc';
    		$documentPath = DOC_PATH.$documentFname.'.'.$fileExtenstion[1];
    		$panFormElements['document_path'] = $documentPath;
    		if(!move_uploaded_file($_FILES['document']['tmp_name'], $documentPath)){
    			$output = array("infocode" => "FILEUPLOADERR", "message" => "Unable to upload document, please try again!");
    		}
    	}
    	
    	$result = $db->insertOperation('pan_application',$panFormElements);
    	//file_put_contents("formlog.log", print_r( $result, true ));
    	if($result['status'] == 'success'){
    		$lastInsertId = $result['last_insert_id'];
    		return array("status"=>"success","message"=>"New PAN application request submitted successfully.");
    	} else {
    		return array("status"=>"failure","message"=>"Pre Arrival Request not created successfully.");
    	}
	}

?>