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
        case 'update_amount':
            $finaloutput = updateAmount();
        break;
	    default:
	        $finaloutput = array("infocode" => "INVALIDACTION", "message" => "Irrelevant action");
	}

	echo json_encode($finaloutput);

	function updateAmount(){
        global $db;
        $serviceId = $_POST['service_id'];
        $newAmount = $_POST['new_amount'];
        $result = $db->updateOperation(TABLE_PRICE_CONFIG, array('amount'=>$newAmount), array('service_id'=>$serviceId));
        // file_put_contents("formlog.log", print_r( $result, true ));
        if($result['status'] == 'success'){
            return array("status"=>"success","message"=>"Amount updated successfully.");
        }
        return array("status"=>"failure","message"=>"Amount update failure.");
    }

?>