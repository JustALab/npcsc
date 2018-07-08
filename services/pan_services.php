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
	    case 'process_pan':
	        $finaloutput = processPan();
	    break;
        case 'update_status':
            $finaloutput = updateStatus();
        break;
        case 'upload_receipt':
            $finaloutput = uploadReceipt();
        break;
	    default:
	        $finaloutput = array("infocode" => "INVALIDACTION", "message" => "Irrelevant action");
	}

	echo json_encode($finaloutput);

	function processPan(){
		global $db, $form;
		$panFormElements = array("application_date" => "application_date", "application_type" => "application_type", "pan_number" => "pan_number", "applicant_category" => "applicant_category", "applicant_title" => "applicant_title", "applicant_fname" => "applicant_fname", "applicant_mname" => "applicant_mname", "applicant_lname" => "applicant_lname", "father_fname" => "father_fname", "father_mname" => "father_mname", "father_lname" => "father_lname", "name_on_card" => "name_on_card", "dob" => "dob", "contact_details" => "contact_details", "email" => "email", "name_as_per_aadhaar" => "name_as_per_aadhaar", "proof_of_id" => "proof_of_id", "proof_of_address" => "proof_of_address", "proof_of_dob" => "proof_of_dob", "gender" => "gender", "aadhaar_no" => "aadhaar_no", "flat_door_block_no" => "flat_door_block_no", "premises_building_village" => "premises_building_village", "road_street_lane_postoffice" => "road_street_lane_postoffice", "area_taluk_subdivision" => "area_taluk_subdivision", "town_district" => "town_district", "state_ut" => "state_ut", "pin_code" => "pin_code", "user_id" => "user_id"); 
		$panFormElements = $form->getFormValues($panFormElements,$_POST);

        $time = date('YmdHis');

		if(isset($_FILES['photo']['name'])){
			$fileExtenstion = explode('.', $_FILES['photo']['name']);
    		$photoFname = $_POST['user_id'] .'_photo_' . $time;
    		$photoPath = PHOTO_PATH.$photoFname.'.'.$fileExtenstion[1];
    		$panFormElements['photo_file_name'] = $photoFname.'.'.$fileExtenstion[1];
    		if(!move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath)){
    			$output = array("infocode" => "FILEUPLOADERR", "message" => "Unable to upload photo, please try again!");
    		}
    	}

    	if(isset($_FILES['signature']['name'])){
    		$fileExtenstion = explode('.', $_FILES['signature']['name']);
    		$signatureFname = $_POST['user_id'] . '_sign_' . $time;
    		$signaturePath = SIGNATURE_PATH.$signatureFname.'.'.$fileExtenstion[1];
    		$panFormElements['signature_file_name'] = $signatureFname.'.'.$fileExtenstion[1];
    		if(!move_uploaded_file($_FILES['signature']['tmp_name'], $signaturePath)){
    			$output = array("infocode" => "FILEUPLOADERR", "message" => "Unable to upload signature, please try again!");
    		}
    	}

    	if(isset($_FILES['document']['name'])){
    		$fileExtenstion = explode('.', $_FILES['document']['name']);
    		$documentFname = $_POST['user_id'] .'_doc_' . $time;
    		$documentPath = DOC_PATH.$documentFname.'.'.$fileExtenstion[1];
    		$panFormElements['document_file_name'] = $documentFname.'.'.$fileExtenstion[1];
    		if(!move_uploaded_file($_FILES['document']['tmp_name'], $documentPath)){
    			$output = array("infocode" => "FILEUPLOADERR", "message" => "Unable to upload document, please try again!");
    		}
    	}

        $walletId = $_POST['wallet_id'];
        $serviceId = PAN_SERVICE;
        $servicePrice = getServicePrice($serviceId);
        $userWallerBalance = getWalletBalance($walletId);

        if(compareServicePrice($userWallerBalance, $servicePrice)){
            $result = $db->insertOperation(TABLE_PAN_APP, $panFormElements);
            //file_put_contents("formlog.log", print_r( $result, true ));
            if($result['status'] == 'success'){
                $lastInsertId = $result['last_insert_id'];
                //deduce amount from wallet
                $walletUpdateResult = updateWalletAmount($walletId, $userWallerBalance, $servicePrice, false);
                if($walletUpdateResult['status'] == 'success'){
                    $description = 'Amount deduced for PAN application. Application No.: ' . $lastInsertId;
                    $transactionResult = addWalletTransaction($walletId, $description, $userWallerBalance, TRANSACTION_DEBIT, $servicePrice, $walletUpdateResult['new_balance']);
                    updateTransactionId(TABLE_PAN_APP, $lastInsertId, $transactionResult['last_insert_id']);
                }
                return array("status"=>"success","message"=>"New PAN application request submitted successfully.", 'application_no'=> $lastInsertId);
            } else {
                return array("status"=>"failure","message"=>"PAN application submission failure.");
            }
        } else {
            return array("status"=>"failure","message"=>"Wallet balance is low!! Application not submitted. Please add money to your wallet.");
        }
    	
	}

    function updateStatus(){
        global $db;
        $applicationNo = $_POST['application_no'];
        $newStatus = $_POST['new_status'];
        $result = $db->updateOperation(TABLE_PAN_APP, array('status'=>$newStatus), array('application_no'=>$applicationNo));
        // file_put_contents("formlog.log", print_r( $result, true ));
        if($result['status'] == 'success'){
            if($newStatus == STATUS_DENIED) {
                reverseWalletTransaction(getWalletTransactionId(TABLE_PAN_APP, $applicationNo));
            }
            return array("status"=>"success","message"=>"PAN Application updated successfully.");
        }
        return array("status"=>"failure","message"=>"PAN Application update failure.");
    } 

    function uploadReceipt(){
        global $db;
        $applicationNo = $_POST['application_no'];
        $result['status'] = '';
        if(isset($_FILES['receipt_document']['name'])){
            $fileExtenstion = explode('.', $_FILES['receipt_document']['name']);
            $documentFname = $applicationNo .'_receipt';
            $documentPath = RECEIPTS_PATH.$documentFname.'.'.$fileExtenstion[1];
            $receiptFileName = $documentFname.'.'.$fileExtenstion[1];
            if(!move_uploaded_file($_FILES['receipt_document']['tmp_name'], $documentPath)){
                $output = array("infocode" => "FILEUPLOADERR", "message" => "Unable to upload document, please try again!");
            }
            $result = $db->updateOperation(TABLE_PAN_APP, array('receipt_file_name'=>$receiptFileName), array('application_no'=>$applicationNo));
                // file_put_contents("formlog.log", print_r( $result, true ));
            if($result['status'] == 'success'){
                return array("status"=>"success","message"=>"Receipt uploaded successfully.");
            }
            return array("status"=>"failure","message"=>"Receipt upload failure.");
        }
        return array("status"=>"failure","message"=>"Please attach the receipt.");
    }

?>