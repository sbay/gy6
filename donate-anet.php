<?php
require_once 'anet_php_sdk/AuthorizeNet.php';

define("AUTHORIZENET_API_LOGIN_ID", "84Rsk7aXw7g");
define("AUTHORIZENET_TRANSACTION_KEY", "546BcCa42qzRJd47");
define("AUTHORIZENET_SANDBOX", false);


if (isset($_POST)) {
	// Check what amount is being sent in
	$amount = ($_POST['amount'] == 'other') ? $_POST['amount-other'] : $_POST['amount'];

	$transaction = new AuthorizeNetAIM;

	$transaction->setFields(
	    array(
			'amount'		=> $amount,
			'card_num'		=> $_POST['cc_number'],
			'exp_date'		=> $_POST['cc_exp_m'] . '/' . $_POST['cc_exp_y'],
			'card_code'		=> $_POST['cc_cvv'],
			'first_name'	=> $_POST['first_name'],
			'last_name'		=> $_POST['last_name'],
			'address'		=> $_POST['address-1'] . ', ' . $_POST['address-2'],
			'city'			=> $_POST['city'],
			'state'			=> $_POST['state'],
			'zip'			=> $_POST['zip'],
			'phone'			=> $_POST['phone'],
			'email'			=> $_POST['email']
	    )
	);


	$response = $transaction->authorizeAndCapture();

	if ($response->approved) {
		echo "<span class=success>Success! Your donation has been submitted! Transaction ID: " . $response->transaction_id . '</span>';
	} else {
		echo "<span class='error tezt'>" . $response->response_reason_text . " " . $response->error_message . "</span>";
	}
} else {
	echo "<span class=error>No data was passed through.</span>";
}
?>