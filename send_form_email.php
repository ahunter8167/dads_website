<?php

// define variables and set to empty values
$field_fname = $field_lname = $field_email = $field_phone = $field_position = $field_other_position = $field_years = $field_career_plan = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$field_fname = ( isset( $_POST['fname'] ) ) ? $_POST['fname'] : null;
$field_lname = ( isset( $_POST['lname'] ) ) ? $_POST['lname'] : null;
$field_email = ( isset( $_POST['email'] ) ) ? $_POST['email'] : null;
$field_phone = ( isset( $_POST['phone'] ) ) ? $_POST['phone'] : null;
$field_position = ( isset( $_POST['position'] ) ) ? $_POST['position'] : null;
$field_other_position = ( isset( $_POST['other_position'] ) ) ? $_POST['other_position'] : null;
$field_years = ( isset( $_POST['years'] ) ) ? $_POST['years'] : null;
$field_career_plan = ( isset( $_POST['career_plan'] ) ) ? $_POST['career_plan'] : null;
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$mail_to = 'j_j_mcfarland@hotmail.com';
$subject = 'New Client Submission: Coaching '.$field_name;

$body_message = 'Client First Name: '.$field_fname."\n";
$body_message .= 'Client Last Name: '.$field_lname."\n";
$body_message .= 'Client E-Mail: '.$field_email."\n";
$body_message .= 'Contact Phone Number: '.$field_phone."\n";
$body_message .= 'Client Current Position: '.$field_position."\n";
$body_message .= 'Other Client Position: '.$field_other_position."\n";
$body_message .= 'Years in the Current Position: '.$field_years."\n";
$body_message .= 'Are they a Career Planner?: '.$field_career_plan."\n";

$headers = 'From:' . $field_email . "\r\n";
$headers .= 'Reply-To:' . $field_email . "\r\n";
'X-Mailer: PHP/' . phpversion(5.6);

$mail_status = mail($mail_to, $subject, $body_message, $headers);

if ($mail_status) { ?>
	<script language="javascript" type="text/javascript">
		window.location = 'contact_completion_form.html';
	</script>
<?php
}
else { ?>
	<script language="javascript" type="text/javascript">
		alert('Message failed. Please, send an email to j_j_mcfarland@hotmail.com');
		window.location = 'contact_page.html';
	</script>
<?php
}
?>
