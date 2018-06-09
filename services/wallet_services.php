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
        case 'add_wallet_amount':
            $finaloutput = addWalletAmount();
        break;
        case 'update_status':
        	$finaloutput = updateStatus();
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

	function getWalletIdByRequestId($requestId){
		global $dbc;
		$query = "SELECT wallet_id FROM ".TABLE_WALLET_REQUESTS." WHERE request_id='$requestId'";
		$result = mysqli_query($dbc, $query);
		$row = mysqli_fetch_assoc($result);
		return $row['wallet_id'];
	}

	function getRequestAmount($requestId){
		global $dbc;
		$query = "SELECT request_amount FROM ".TABLE_WALLET_REQUESTS." WHERE request_id='$requestId'";
		$result = mysqli_query($dbc, $query);
		$row = mysqli_fetch_assoc($result);
		return $row['request_amount'];
	}

	function updateStatus(){
		global $db;
        $requestId = $_POST['request_id'];
        $newStatus = $_POST['new_status'];
        $result = $db->updateOperation(TABLE_WALLET_REQUESTS, array('status'=>$newStatus), array('request_id'=>$requestId));
        // file_put_contents("formlog.log", print_r( $result, true ));
        if($result['status'] == 'success'){
        	if($newStatus == STATUS_APPROVED){
        		$walletId = getWalletIdByRequestId($requestId);
        		$previousBalance = getWalletBalance($walletId);
        		$requestAmount = getRequestAmount($requestId);
        		$walletUpdateData = updateWalletAmount($walletId, $previousBalance, $requestAmount, true);
        		if($walletUpdateData['status'] == 'success'){
        			$description = 'Added money to wallet.';
        			$transactionStatus = addWalletTransaction($walletId, $description, $previousBalance, TRANSACTION_CREDIT, $requestAmount, $walletUpdateData['new_balance']);
        		}
        	}
            return array("status"=>"success","message"=>"Wallet request updated successfully.");
        }
        return array("status"=>"failure","message"=>"Wallet request update failure.");
	}


?>