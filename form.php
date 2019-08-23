<?php
	error_reporting(E_ALL); ini_set('display_errors', '1');
	require 'vendor/autoload.php'; // If you're using Composer (recommended)
	require_once 'include/functions.php';
	$recaptcha_secret = '6LfevKwUAAAAAHV5x0OCxcYvYy8W9D5efg-u3R0R';

	$email = new \SendGrid\Mail\Mail(); 
	$email->setFrom("mailer@unitext.sk", "Unitext Mailer");
	$email->setSubject("Nová správa z kontaktného formulára");

	if($_POST['quick-contact-form-email'] == 'baluch.dominik@gmail.com'){
		$email->addTo("admin@unitext.".$lang, "Admin");
	}else{
		$email->addTo("dominika@unitext.".$lang, "Dominika");
	}

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	if (isset($_POST['quick-contact-form-name']) && isset($_POST['quick-contact-form-email']) && isset($_POST['quick-contact-form-message']) && $_POST['quick-contact-form-name'] != '' && $_POST['quick-contact-form-email'] != '' && $_POST['quick-contact-form-message'] != '') {
		$name = isset( $_POST['quick-contact-form-name'] ) ? $_POST['quick-contact-form-name'] : '';
		$mail = isset( $_POST['quick-contact-form-email'] ) ? $_POST['quick-contact-form-email'] : '';
		$message = isset( $_POST['quick-contact-form-message'] ) ? $_POST['quick-contact-form-message'] : '';

			$name = isset($name) ? "Meno: $name<br><br>" : '';
			$mail = isset($mail) ? "Email: $mail<br><br>" : '';
			$message = isset($message) ? "Správa: $message<br><br>" : '';

			$body = "$name $mail $message";
			if ( isset( $_FILES['quick-contact-form-attachment'] ) && $_FILES['quick-contact-form-attachment']['error'] == UPLOAD_ERR_OK ) {
				$file = $_FILES['quick-contact-form-attachment'];
				if(!startsWith($file['type'], 'image')){
					echo '{"message": "'.get_translated_content($content, 'contact_form_file_type').'"}';
					http_response_code(400);
					die;
				}
				$attachment = new \SendGrid\Mail\Attachment();
				$attachment->setType("application/text");
				$attachment->setContent(file_get_contents($file['tmp_name']));
				$attachment->setDisposition("attachment");
				$attachment->setFilename($file['name']);
				$email->addAttachment($attachment);
			}

			if( isset( $_POST['g-recaptcha-response'] ) ) {
				$recaptcha_response = $_POST['g-recaptcha-response'];
				$response = file_get_contents( "https://www.google.com/recaptcha/api/siteverify?secret=" . $recaptcha_secret . "&response=" . $recaptcha_response );

				$g_response = json_decode( $response );

				if ( $g_response->success !== true ) {
					echo '{"message": "'.get_translated_content($content, 'contact_form_captcha_error').'"}';
					http_response_code(400);
					die;
				}
			}else{
				echo '{"message": "'.get_translated_content($content, 'contact_form_captcha_error').'"}';
				http_response_code(400);
				die;
			}

			$email->addContent(
				"text/html", $body
			);

			$sendgrid = new \SendGrid('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');
			try {
				$response = $sendgrid->send($email);
			} catch (Exception $e) {
				echo '{"message": "'.get_translated_content($content, 'contact_form_universal_error').'"}';
			}

			if( $response->statusCode() == 202 ){
				http_response_code(200);
				echo '{"message": "'.get_translated_content($content, 'contact_form_message_success').'"}';
			} else {
				http_response_code(400);
				echo '{"message": "'.get_translated_content($content, 'contact_form_universal_error').'"}';
			}
	} else {
		http_response_code(400);
		echo '{"message": "Prosím vyplňte všetky polia." }';
		echo '{"message": "'.get_translated_content($content, 'contact_form_missing_inputs').'"}';
	}
} else {
	http_response_code(400);
	echo '{"message": "'.get_translated_content($content, 'contact_form_universal_error').'"}';
}

?>
