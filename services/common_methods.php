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
		return $result['status'];
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
	
?>