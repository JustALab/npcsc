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

    /** Service IDs */
    define('PAN_SERVICE', 1);
    define('PASSPORT_36_PAGES', 2);
    define('PASSPORT_60_PAGES', 3);
    define('PASSPORT_MINOR_36_PAGES', 4);
    define('PASSPORT_TATKAL', 5);


?>