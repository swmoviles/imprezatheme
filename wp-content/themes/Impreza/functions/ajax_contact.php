<?php

if ( ! function_exists('us_sendContact'))
{
	function us_sendContact()
	{
		global $smof_data;
        $captcha_salt = 'Impeza'; // Do not change unless you changed it in functions/shortcodes.php file
		$errors = array();
		$errors_count = 0;

        $emailTo = get_option('admin_email');

        if (@$_POST['receiver'] != '') {
            $emailTo = $_POST['receiver'];
        }

        if (@$_POST['captcha'] != '' AND md5(@$_POST['captcha'].$captcha_salt) != @$_POST['captcha_result']) {
            $errors['captcha'] = __('Please, enter correct result', 'us');
            $errors_count++;
        }

        if (in_array(@$smof_data['contact_form_name_field'], array('Shown, required')) AND empty($_POST['name']))
        {
            $errors_count++;
        }

        if (in_array(@$smof_data['contact_form_email_field'], array('Shown, required')) AND empty($_POST['email']))
        {
            $errors_count++;
        }

        if (in_array(@$smof_data['contact_form_phone_field'], array('Shown, required')) AND empty($_POST['phone']))
        {
            $errors_count++;
        }

        if (in_array(@$smof_data['contact_form_message_field'], array('Shown, required')) AND empty($_POST['message']))
        {
            $errors_count++;
        }

        if ($errors_count > 0)
        {
            $response = array ('success' => 0, 'errors' => $errors);
            echo json_encode($response);
            die();
        }

        $body = '';

        if ($_POST['name'] != '')
        {
            $body .= __('Name', 'us').": ".$_POST['name']."\n";
        }

        if (in_array(@$smof_data['contact_form_email_field'], array('Shown, required', 'Shown, not required')))
        {
            $body .= __('Email', 'us').": ".$_POST['email']."\n";
        }

        if ($_POST['phone'] != '')
        {
            $body .= __('Phone', 'us').": ".$_POST['phone']."\n";
        }

        if ($_POST['message'] != '')
        {
            $body .= __('Message', 'us').": ".$_POST['message']."\n";
        }

        $headers = '';

        wp_mail($emailTo, __('Contact request from', 'us')." http://".$_SERVER['HTTP_HOST'].'/', $body, $headers);

        $response = array ('success' => 1);
        echo json_encode($response);




		die();

	}

	add_action( 'wp_ajax_nopriv_sendContact', 'us_sendContact' );
	add_action( 'wp_ajax_sendContact', 'us_sendContact' );
}