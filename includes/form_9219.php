<?php
	if (empty($_POST['email_24998_9219']) && strlen($_POST['email_24998_9219']) == 0 || empty($_POST['input_2101']) && strlen($_POST['input_2101']) == 0)
	{
		return false;
	}
	
	$email_24998_9219 = $_POST['email_24998_9219'];
	$input_2101 = $_POST['input_2101'];
	
	// Create Message	
	$to = 'receiver@yoursite.com';
	$email_subject = "Message from a Blocs website.";
	$email_body = "You have received a new message. \n\nEmail_24998_9219: $email_24998_9219 \nInput_2101: $input_2101 \n";
	$headers = "MIME-Version: 1.0\r\nContent-type: text/plain; charset=UTF-8\r\n";	
	$headers .= "From: contact@yoursite.com\r\n";
	$headers .= "Reply-To: $input_2101";

	// Post Message
	if (function_exists('mail'))
	{
		$result = mail($to,$email_subject,$email_body,$headers);
	}
	else // Mail() Disabled
	{
		$error = array("message" => "The php mail() function is not available on this server.");
	    header('Content-Type: application/json');
	    http_response_code(500);
	    echo json_encode($error);
	}	
?>