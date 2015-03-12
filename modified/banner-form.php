<?php

	/* Configuration */
	$subject = 'Hail Claim Lawyer - Lead'; // Set email subject line here
	$mailto  = 'nick@mhouseconsulting.com'; // Email address to send form submission to
	/* END Configuration */

	$name = $_POST['banner-name'];
	$email = $_POST['banner-email'];
	$phone = $_POST['banner-phone'];
	$message = $_POST['banner-message'];
	$timestamp = date("F jS Y, h:iA.", time());

	// HTML for email to send submission details
	$body = "
	<br>
	<p>Hail Claim Lawyer - Lead</p>
	<p><strong>Name</strong>: $name</p>
	<p><strong>Email</strong>: $email</p>
	<p><strong>Phone number</strong>: $phone</p>
	<p><strong>Message</strong>: $message</p>
	<hr/>
	<p>This form was submitted on <strong>$timestamp</strong></p>
	";

	// Success Message
	$success = "
	<div class=\"banner-optin vertical\">
		<h1><strong>TAKE A STAND!</strong></h1>
		<div class=\"form-group\">
			<input name=\"banner-name\" id=\"banner-name\" type=\"text\" class=\"form-control\" required placeholder=\"Your Name\">
		</div>
		<div class=\"form-group\">
			<input name=\"banner-email\" id=\"banner-email\" type=\"text\" class=\"form-control\" required placeholder=\"Your e-mail\">
		</div>
		<div class=\"form-group\">
			<input name=\"banner-phone\" id=\"banner-phone\" type=\"text\" class=\"form-control\" placeholder=\"Your Phone Number\">
		</div>
		<div class=\"form-group\">
			<input name=\"banner-message\" id=\"banner-message\" type=\"text\" class=\"form-control\" placeholder=\"How Can We Help?\">
		</div>
		<div class=\"form-group\">
			<button type=\"submit\" class=\"btn btn-default btn-submit\">FREE CASE REVIEW</button>
		</div>
	</div>
	<div class=\"row\">
		<div class=\"col-md-12\">
			<div class=\"form-process\"></div>
		</div>
	</div>
	<div class=\"alert alert-success\">
		<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>
		<strong>Thank You!</strong> Thank you for your submission! We will be reaching out to you shortly.
	</div>
	";

	$headers = "From: $name <$email> \r\n";
	$headers .= "Reply-To: $email \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	$message = "<html><body>$body</body></html>";

	if (mail($mailto, $subject, $message, $headers)) {
		echo "$success"; // success
	} else {
		echo 'Form submission failed. Please try again...'; // failure
	}

?>