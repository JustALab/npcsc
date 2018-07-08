<?php 

	function getWalletIdByUserId($userId){
		global $dbc;
		$query = "SELECT wallet_id FROM ".TABLE_WALLET." WHERE user_id='$userId'";
		$result = mysqli_query($dbc, $query);
		$row = mysqli_fetch_assoc($result);
		return $row['wallet_id'];
	} 

	function getWalletBalance($walletId){
		global $dbc;
		$query = "SELECT amount FROM ".TABLE_WALLET." WHERE wallet_id='$walletId'";
		$result = mysqli_query($dbc, $query);
		$row = mysqli_fetch_assoc($result);
		return $row['amount'];
	}

	function updateWalletAmount($walletId, $previousBalance, $amount, $isCredit){
		global $db;
		if($isCredit){
			$newBalance = $previousBalance + $amount;
		} else {
			$newBalance = $previousBalance - $amount;
		}
		$result = $db->updateOperation(TABLE_WALLET, array('amount'=>$newBalance), array('wallet_id'=>$walletId));
		$result['new_balance'] = $newBalance;
		return $result;
	}

	function addWalletTransaction($walletId, $description, $previousBalance, $trancationType, $amount, $newBalance){
		global $db;
		$transactionData = array('date_time' => date("d-m-Y H:i:s"), 'description' => $description, 'previous_balance' => $previousBalance, 'transaction_type' => $trancationType, 'amount' => $amount, 'balance' => $newBalance, 'wallet_id' => $walletId);
		$result = $db->insertOperation(TABLE_WALLET_TRANS, $transactionData);
		return $result;
	}

	function reverseWalletTransaction($transactionId, $description){
		global $dbc;
		$transactionQuery = "SELECT * FROM ".TABLE_WALLET_TRANS." WHERE transaction_id='$transactionId'";
		$transactionResult = mysqli_query($dbc, $transactionQuery);
		$transactionData = mysqli_fetch_assoc($transactionResult);
		$walletBalance = getWalletBalance($transactionData['wallet_id']);
		$walletUpdateResult = updateWalletAmount($transactionData['wallet_id'], $walletBalance, $transactionData['amount'], true);
		if($walletUpdateResult['status'] == 'success'){
			addWalletTransaction($transactionData['wallet_id'], $description, $walletBalance,TRANSACTION_CREDIT, $transactionData['amount'], $walletUpdateResult['new_balance']);
		}
	}

	function updateTransactionId($tableName, $applicationNo, $walletTransactionId){
		global $db;
		$result = $db->updateOperation($tableName, array('wallet_transaction_id' => $walletTransactionId), array('application_no' => $applicationNo));
		return $result;
	}

	function getWalletTransactionId($tableName, $applicationNo){
        global $dbc;
        $query = 'SELECT wallet_transaction_id FROM '.$tableName.' WHERE application_no="'.$applicationNo.'"';
        $result = mysqli_query($dbc, $query);
        return mysqli_fetch_assoc($result)['wallet_transaction_id'];
    }  

	function getServicePrice($serviceId){
		global $dbc;
		$query = "SELECT * FROM ".TABLE_PRICE_CONFIG." WHERE service_id='$serviceId'";
		$result = mysqli_query($dbc, $query);
		return mysqli_fetch_assoc($result)['amount'];
	}

	function compareServicePrice($walletBalance, $servicePrice){
		return $walletBalance >= $servicePrice;
	}

	function addUserIdPadding($userId){
		$userId = str_pad($userId, 6, "0",STR_PAD_LEFT);
		return 'NARPAVI' . $userId;
	}

	function getEmailByUserId($userId){
		global $dbc;
		$query = "SELECT email FROM ".TABLE_USERS." WHERE user_id='$userId'";
		$result = mysqli_query($dbc, $query);
		return mysqli_fetch_assoc($result)['email'];
	}
	
?>