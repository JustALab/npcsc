<?php

require 'formwrapper.php';
require '../pages/dbconfig.php';
require 'dbwrapper_mysqli.php';
require 'constants.php';

include 'common_methods.php';

$db = new DBWrapper($dbc);
$form = new FormWrapper();

$finaloutput = array();
if (!$_POST) {
    $action = $_GET['action'];
} else {
    $action = $_POST['action'];
}
switch ($action) {
    case 'process_gst':
        $finaloutput = processGst();
        break;
    default:
        $finaloutput = array("infocode" => "INVALIDACTION", "message" => "Irrelevant action");
}

echo json_encode($finaloutput);

function processGst()
{
    global $db, $form;
    $gstFormElements = array('registration_type' => 'registration_type', 'authorised_person_name' => 'authorised_person_name', 'authorised_person_phone' => 'authorised_person_phone', 'authorised_person_email' => 'authorised_person_email', 'business_name' => 'business_name', 'business_address' => 'business_address', 'business_nature' => 'business_nature', 'business_description' => 'business_description', 'business_place_proof_type' => 'business_place_proof_type');
    $gstFormElements = $form->getFormValues($gstFormElements, $_POST);

    $time = date('YmdHis');

    $partnersCount = 1;
    if ($_POST['registration_type'] !== 'Proprietorship/Ownership Firm') {
        $partnersCount = $_POST['no_of_people'];
    }
    $gstFormElements['no_of_people'] = $partnersCount;

    $panCardArray = array();
    $colorPhotoArray = array();
    $addressProofTypeArray = array();
    $addressProofArray = array();

    for ($i = 1; $i <= $partnersCount; $i++) {
        $panFileName = copyFileAndGetName('pan_card_' . $i, GST_PAN_PATH, 'pan_card_' . $i);
        $colorPhotoFileName = copyFileAndGetName('color_photo_' . $i, GST_COLOR_PHOTO_PATH, 'color_photo_' . $i);
        $addressProofFileName = copyFileAndGetName('address_proof_' . $i, GST_ADDRESS_PROOF_PATH, 'address_proof_' . $i);

        $panCardArray['pan_card_' . $i] = $panFileName;
        $colorPhotoArray['color_photo_' . $i] = $colorPhotoFileName;
        $addressProofTypeArray['address_proof_type_' . $i] = $_POST['address_proof_type_' . $i];
        $addressProofArray['address_proof_' . $i] = $addressProofFileName;
    }

    $gstFormElements['pan_card'] = json_encode($panCardArray);
    $gstFormElements['color_photo'] = json_encode($colorPhotoArray);
    $gstFormElements['address_proof_type'] = json_encode($addressProofTypeArray);
    $gstFormElements['address_proof'] = json_encode($addressProofArray);

    $gstFormElements['property_tax_receipt'] = copyFileAndGetName('property_tax_receipt', GST_PROPERTY_TAX_RCPT_PATH, 'property_tax_receipt');
    $gstFormElements['rental_agreement'] = copyFileAndGetName('rental_agreement', GST_RENTAL_AGREEMENT_PATH, 'rental_agreement');
    $gstFormElements['eb_card'] = copyFileAndGetName('eb_card', GST_EB_CARD_PATH, 'eb_card');
    $gstFormElements['tin_tax_certificate'] = copyFileAndGetName('tin_tax_certificate', GST_TIN_TAX_CERT_PATH, 'tin_tax_certificate');
    $gstFormElements['certificate_incorporation'] = copyFileAndGetName('certificate_incorporation', GST_CERT_OF_INC_PATH, 'certificate_incorporation');
    $gstFormElements['authorisation_letter'] = copyFileAndGetName('authorisation_letter', GST_AUTH_LETTER_PATH, 'authorisation_letter');
    $gstFormElements['partnership_deed'] = copyFileAndGetName('partnership_deed', GST_PARTNERSHIP_DEEP_PATH, 'partnership_deed');
    $gstFormElements['bank_document'] = copyFileAndGetName('bank_document', GST_BANK_DOC_PATH, 'bank_document');
    $gstFormElements['firm_registration_certificate'] = copyFileAndGetName('firm_registration_certificate', GST_FIRM_REG_CERT_PATH, 'firm_registration_certificate');
    $gstFormElements['board_resolution_format'] = copyFileAndGetName('board_resolution_format', GST_BOARD_RES_FORMAT_PATH, 'board_resolution_format');
    $gstFormElements['company_pan'] = copyFileAndGetName('company_pan', GST_COMPANY_PAN_PATH, 'company_pan');
    $gstFormElements['application_date'] = date('d/m/Y');

    if ($_POST['registration_type'] === 'Proprietorship/Ownership Firm') {
        $serviceId = GST_PROPRITORSHIP;
    }

    if ($_POST['registration_type'] === 'Partnership Firm') {
        $serviceId = GST_PARTNETSHIP;
    }

    if ($_POST['registration_type'] === 'Limited Liability Partnership') {
        $serviceId = GST_LIMITED_LIABILITY;
    }

    if ($_POST['registration_type'] === 'Private Limited Company') {
        $serviceId = GST_PRIVATE_LIMITED;
    }

    $walletId = $_POST['wallet_id'];
    $servicePrice = getServicePrice($serviceId);
    $userWalletBalance = getWalletBalance($walletId);

    if (compareServicePrice($userWalletBalance, $servicePrice)) {
        $result = $db->insertOperation(TABLE_GST_APP, $gstFormElements);
        //file_put_contents("formlog.log", print_r( $result, true ));
        if ($result['status'] == 'success') {
            $lastInsertId = $result['last_insert_id'];
            //deduce amount from wallet
            $walletUpdateResult = updateWalletAmount($walletId, $userWalletBalance, $servicePrice, false);
            if ($walletUpdateResult['status'] == 'success') {
                $description = 'Amount deduced for GST application. Application No.: ' . $lastInsertId;
                $transactionResult = addWalletTransaction($walletId, $description, $userWalletBalance, TRANSACTION_DEBIT, $servicePrice, $walletUpdateResult['new_balance']);
                updateTransactionId(TABLE_GST_APP, $lastInsertId, $transactionResult['last_insert_id']);
            }
            return array("status" => "success", "message" => "New PAN application request submitted successfully.", 'application_no' => $lastInsertId);
        } else {
            return array("status" => "failure", "message" => "PAN application submission failure.");
        }
    } else {
        return array("status" => "failure", "message" => "Wallet balance is low!! Application not submitted. Please add money to your wallet.");
    }
}

function copyFileAndGetName($formElementName, $fileCopyPath, $typeName)
{
    $time = date('YmdHis');
    if (isset($_FILES[$formElementName]['name'])) {
        $fileExtenstion = explode('.', $_FILES[$formElementName]['name']);
        $fileName = $_POST['user_id'] . '_' . $typeName . '_' . $time;
        $filePath = $fileCopyPath . $fileName . '.' . $fileExtenstion[1];
        move_uploaded_file($_FILES[$formElementName]['tmp_name'], $filePath);
        return $fileName . '.' . $fileExtenstion[1];
    } else {
        return '';
    }
}
