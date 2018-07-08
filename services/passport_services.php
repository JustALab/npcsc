<?php 

	require 'formwrapper.php' ;
	require '../pages/dbconfig.php';
	require 'dbwrapper_mysqli.php';
	require 'constants.php';

    include 'common_methods.php';

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
	    case 'process_paassport':
	        $finaloutput = processPassport();
	    break;
        case 'update_status':
            $finaloutput = updateStatus();
        break;
	    default:
	        $finaloutput = array("infocode" => "INVALIDACTION", "message" => "Irrelevant action");
	}

	echo json_encode($finaloutput);

	function processPassport() {
		global $db, $form;

		$passportElementsArray = array('user_id' => 'user_id', 'service_type' => 'service_type', 'application_type' => 'application_type', 'dob' => 'dob', 'name' => 'name', 'mobile_no' => 'mobile_no', 'surname' => 'surname', 'mother_name' => 'mother_name', 'father_name' => 'father_name', 'no_of_pages' => 'no_of_pages', 'place_of_birth' => 'place_of_birth', 'state_of_birth' => 'state_of_birth', 'district_of_birth' => 'district_of_birth', 'gender' => 'gender', 'since_staying_from' => 'since_staying_from', 'marital_status' => 'marital_status', 'educational_qualification' => 'educational_qualification', 'employment_type' => 'employment_type', 'permanent_address' => 'permanent_address', 'area_police_station_name' => 'area_police_station_name', 'email_id' => 'email_id', 'age_id_proof' => 'age_id_proof', 'address_proof' => 'address_proof', 'aadhaar_no' => 'aadhaar_no', 'old_passport_no' => 'old_passport_no', 'date_of_issue' => 'date_of_issue', 'date_of_expiry' => 'date_of_expiry', 'file_no' => 'file_no', 'place_of_issue' => 'place_of_issue', 'old_passport_no_child' => 'old_passport_no_child', 'date_of_issue_child' => 'date_of_issue_child', 'date_of_expiry_child' => 'date_of_expiry_child', 'file_no_child' => 'file_no_child', 'place_of_issue_child' => 'place_of_issue_child', 'parent_passport' => 'parent_passport', 'parent_passport_no' => 'parent_passport_no', 'date_of_issue_parent' => 'date_of_issue_parent', 'date_of_expiry_parent' => 'date_of_expiry_parent', 'place_of_issue_parent' => 'place_of_issue_parent');
		$passportElementsArray = $form->getFormValues($passportElementsArray, $_POST);
		$time = date('YmdHis');
        $passportElementsArray['submitted_date'] = date('d/m/Y');
        // file_put_contents("formlog.log", print_r( $_POST, true ));

		if(isset($_FILES['age_id_proof_file']['name'])){
			$fileExtenstion = explode('.', $_FILES['age_id_proof_file']['name']);
    		$fileName = $_POST['user_id'] .'_age_proof_' . $time;
    		$filePath = AGE_PROOFS_PATH.$fileName.'.'.$fileExtenstion[1];
    		$passportElementsArray['age_id_proof_file_name'] = $fileName.'.'.$fileExtenstion[1];
    		if(!move_uploaded_file($_FILES['age_id_proof_file']['tmp_name'], $filePath)){
    			$output = array("infocode" => "FILEUPLOADERR", "message" => "Unable to upload Age/ID Proof, please try again!");
    		}
    	}

    	if(isset($_FILES['address_proof_file']['name'])){
			$fileExtenstion = explode('.', $_FILES['address_proof_file']['name']);
    		$fileName = $_POST['user_id'] .'_address_proof_' . $time;
    		$filePath = ADDRESS_PROOFS_PATH.$fileName.'.'.$fileExtenstion[1];
    		$passportElementsArray['address_proof_file_name'] = $fileName.'.'.$fileExtenstion[1];
    		if(!move_uploaded_file($_FILES['address_proof_file']['tmp_name'], $filePath)){
    			$output = array("infocode" => "FILEUPLOADERR", "message" => "Unable to upload Age/ID Proof, please try again!");
    		}
    	}

    	if(isset($_FILES['old_passport_copy_file']['name'])){
			$fileExtenstion = explode('.', $_FILES['old_passport_copy_file']['name']);
    		$fileName = $_POST['user_id'] .'_old_' . $time;
    		$filePath = OLD_PASSPORT_COPY_PATH.$fileName.'.'.$fileExtenstion[1];
    		$passportElementsArray['old_passport_copy_file_name'] = $fileName.'.'.$fileExtenstion[1];
    		if(!move_uploaded_file($_FILES['old_passport_copy_file']['tmp_name'], $filePath)){
    			$output = array("infocode" => "FILEUPLOADERR", "message" => "Unable to upload Age/ID Proof, please try again!");
    		}
    	}

    	if(isset($_FILES['old_passport_child_copy_file']['name'])){
			$fileExtenstion = explode('.', $_FILES['old_passport_child_copy_file']['name']);
    		$fileName = $_POST['user_id'] .'_old_' . $time;
    		$filePath = OLD_PASSPORT_CHILD_COPY_PATH.$fileName.'.'.$fileExtenstion[1];
    		$passportElementsArray['old_passport_child_copy_file_name'] = $fileName.'.'.$fileExtenstion[1];
    		if(!move_uploaded_file($_FILES['old_passport_child_copy_file']['tmp_name'], $filePath)){
    			$output = array("infocode" => "FILEUPLOADERR", "message" => "Unable to upload Age/ID Proof, please try again!");
    		}
    	}

    	$walletId = $_POST['wallet_id'];
        $servicePrice = getServicePrice(PASSPORT_SERVICE);
        $userWallerBalance = getWalletBalance($walletId);

        if(compareServicePrice($userWallerBalance, $servicePrice)) {
        	$result = $db->insertOperation(TABLE_PASSPORT_APP, $passportElementsArray);
        	//file_put_contents("formlog.log", print_r( $result, true ));
            if($result['status'] == 'success'){
                $lastInsertId = $result['last_insert_id'];
                //deduce amount from wallet
                $walletUpdateResult = updateWalletAmount($walletId, $userWallerBalance, $servicePrice, false);
                if($walletUpdateResult['status'] == 'success'){
                    $description = 'Amount deduced for Passport application. Application No.: ' . $lastInsertId;
                    addWalletTransaction($walletId, $description, $userWallerBalance, TRANSACTION_DEBIT, $servicePrice, $walletUpdateResult['new_balance']);
                }
                return array("status"=>"success","message"=>"New Passport application request submitted successfully.", 'application_no'=> $lastInsertId);
            } else {
                return array("status"=>"failure","message"=>"Passport application submission failure.");
            }
        } else {
        	return array("status"=>"failure","message"=>"Wallet balance is low!! Application not submitted. Please add money to your wallet.");
        }
	}

    function updateStatus(){
        global $db;
        $applicationNo = $_POST['application_no'];
        $newStatus = $_POST['new_status'];
        $result = $db->updateOperation(TABLE_PASSPORT_APP, array('status'=>$newStatus), array('application_no'=>$applicationNo));
        // file_put_contents("formlog.log", print_r( $result, true ));
        if($result['status'] == 'success'){
            return array("status"=>"success","message"=>"Passport Application updated successfully.");
        }
        return array("status"=>"failure","message"=>"Passport Application update failure.");
    }   

?>