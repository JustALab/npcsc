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
        case 'add_wallet_amount':
            $finaloutput = addWalletAmount();
        break;
	    default:
	        $finaloutput = array("infocode" => "INVALIDACTION", "message" => "Irrelevant action");
	}

	echo json_encode($finaloutput);

	function addWalletAmount(){
		global $db, $form;
		$addWalletAmountFormElements = array('to_bank_name' => 'to_bank_name', 'transaction_type' => 'transaction_type', 'request_amount' => 'request_amount', 'request_date' => 'request_date', 'bank_name' => 'bank_name', 'reference_no' => 'reference_no', 'wallet_id' => 'wallet_id');
		$addWalletAmountFormElements = $form->getFormValues($addWalletAmountFormElements, $_POST);
		$result = $db->insertOperation(TABLE_WALLET_REQUESTS, $addWalletAmountFormElements);
		if($result['status'] == 'success'){
            $lastInsertId = $result['last_insert_id'];
            return array("status"=>"success","message"=>"Wallet request submitted successfully. Please wait for approval.", "request_id" => $lastInsertId);
        } else {
            return array("status"=>"failure","message"=>"Wallet request failure.");
        }
	}


	// function updateAmount(){
 //        global $db;
 //        $serviceId = $_POST['service_id'];
 //        $newAmount = $_POST['new_amount'];
 //        $result = $db->updateOperation(TABLE_PRICE_CONFIG, array('amount'=>$newAmount), array('service_id'=>$serviceId));
 //        // file_put_contents("formlog.log", print_r( $result, true ));
 //        if($result['status'] == 'success'){
 //            return array("status"=>"success","message"=>"Amount updated successfully.");
 //        }
 //        return array("status"=>"failure","message"=>"Amount update failure.");
 //    }

?>