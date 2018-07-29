<?php
	
    /** Statuses */
    define('STATUS_PENDING','Pending');
	define('STATUS_APPROVED','Approved');
	define('STATUS_DENIED','Denied');
    define('STATUS_BLOCKED','Blocked');

    /** Transactions */
    define('TRANSACTION_CREDIT','Credit');
    define('TRANSACTION_DEBIT','Debit');

    /** Field Values */
    define('PASSPORT_FRESH','Fresh');
    define('PASSPORT_REISSUE','Re-issue');
    define('PASSPORT_CHILDREN','Children');
    define('PASSPORT_CHILDREN_RENEWAL','Children Renewal');

    /** Tables */
    define('TABLE_USERS', 'users');
    define('TABLE_WALLET', 'wallet');
    define('TABLE_WALLET_REQUESTS', 'wallet_requests');
    define('TABLE_WALLET_TRANS', 'wallet_transactions');
    define('TABLE_SERVICES', 'services');
    define('TABLE_PRICE_CONFIG', 'price_config');
    define('TABLE_PAN_APP', 'pan_application');
    define('TABLE_PASSPORT_APP', 'passport_application');
    define('TABLE_GST_APP', 'gst_registrations');

    /** Paths */
    define('PHOTO_PATH', 'store/photos/');
    define('SIGNATURE_PATH', 'store/signatures/');
    define('DOC_PATH', 'store/documents/');
    define('RECEIPTS_PATH', 'store/receipts/');
    define('FORM_DOCS_PATH', 'store/form_docs/');
    define('AGE_PROOFS_PATH', 'store/passport/age_proofs/');
    define('ADDRESS_PROOFS_PATH', 'store/passport/address_proofs/');
    define('OLD_PASSPORT_COPY_PATH', 'store/passport/old_passports_copy/');
    define('OLD_PASSPORT_CHILD_COPY_PATH', 'store/passport/old_passports_child_copy/');
    define('PASSPORT_ANNEXURES_PATH', 'store/passport/annexures/');
    define('PAN_FORM49_PATH', 'store/form_docs/Form49A.pdf');
    define('GST_PAN_PATH', 'store/gst/pan/');
    define('GST_COLOR_PHOTO_PATH', 'store/gst/color_photo/');
    define('GST_ADDRESS_PROOF_PATH', 'store/gst/address_proof/');
    define('GST_EB_CARD_PATH', 'store/gst/eb_card/');
    define('GST_PROPERTY_TAX_RCPT_PATH', 'store/gst/property_tax_receipt/');
    define('GST_RENTAL_AGREEMENT_PATH', 'store/gst/rental_agreement/');
    define('GST_TIN_TAX_CERT_PATH', 'store/gst/tin_tax_certificate/');
    define('GST_CERT_OF_INC_PATH', 'store/gst/certificate_incorporation/');
    define('GST_BANK_DOC_PATH', 'store/gst/bank_document/');
    define('GST_AUTH_LETTER_PATH', 'store/gst/authorisation_letter/');
    define('GST_PARTNERSHIP_DEEP_PATH', 'store/gst/partnership_deed/');
    define('GST_FIRM_REG_CERT_PATH', 'store/gst/firm_registration_certificate/');
    define('GST_BOARD_RES_FORMAT_PATH', 'store/gst/board_resolution_format/');
    define('GST_COMPANY_PAN_PATH', 'store/gst/company_pan/');

    /** Service IDs */
    define('PAN_SERVICE', 1);
    define('PASSPORT_36_PAGES', 2);
    define('PASSPORT_60_PAGES', 3);
    define('PASSPORT_MINOR_36_PAGES', 4);
    define('PASSPORT_TATKAL', 5);
    define('GST_PROPRITORSHIP', 6);
    define('GST_PARTNETSHIP', 7);
    define('GST_LIMITED_LIABILITY', 8);
    define('GST_PRIVATE_LIMITED', 9);


?>