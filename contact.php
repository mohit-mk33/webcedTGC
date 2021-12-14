<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TECHUE :: Multi-Purpose HTML Landing Page Template by Codefes&trade;</title>
	<meta name="description" content="Techue (pronounced Tech-Hue) is a multi-purpose HTML landing page template by Codefest&trade;. Purchase now.">
	<meta name="keywords" content="Techue,Codefest">
	<meta name="author" content="Codefest">	
	<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
	<link rel="icon" type="image/png" href="assets/images/favicon.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">	
	<link rel="stylesheet" type="text/css" href="assets/css/style.css" />
	<link rel="stylesheet" href="assets/js/owlcarousel/owl.theme.default.min.css">
	<link rel="stylesheet" href="assets/js/owlcarousel/owl.carousel.min.css">
	<!-- FONTS -->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<!-- SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	<script src="assets/js/smoothscroll.js"></script>
    <script language="JavaScript" type="text/javascript">
        setTimeout("window.history.go(-1)",7000);
	</script> 
</head>
<body>
<!-- WRAPPER -->
<div class="wrapper">
<div class="contact-us-section vh-100">    
<div class="container contact-us-content-container">
<div class="card text-center">
<div class="card-body p-5">
<!-- LOGO --> 
<img src="assets/images/sent.png" class="send-success"> 
<?php
if(!empty($_POST['website'])) die();
if(isset($_POST['email'])) { 
    // Change the email address below to your own
    $email_to = "info@tgcindia.com,tgcanimation@gmail.com, ranjan354@gmail.com";
    $email_subject = "You've received a new message"; 
    function died($error) {
        // Error message
        echo "<h2 class='contact-subtitle'>Error</h2>";
		echo "<p class='contact-title-text text-danger'>";
        echo $error."</p><br>";
		echo "<p class='contact-title-text text-danger'>Heading back to try again...</p>";
        die();
    }
    // Validation
    if(!isset($_POST['full_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('There appears to be a problem with your form submission.');       
    } 
    $full_name = $_POST['full_name']; // Required
    $email = $_POST['email']; // Required
    $message = $_POST['message']; // Required 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/'; 
  if(!preg_match($email_exp,$email)) {
    $error_message .= 'The email address you entered is not valid.<br />';
  } 
    $string_exp = "/^[A-Za-z .'-]+$/"; 
  if(!preg_match($string_exp,$full_name)) {
    $error_message .= 'The name you entered does not appear to be valid.<br />';
  } 
  if(strlen($error_message) > 0) {
    died($error_message);
  } 
    $email_message = "Message details below.\n\n";     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }	
    $email_message .= "Full Name: ".clean_string($full_name)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Message: ".clean_string($message)."\n"; 
// Email headers
$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?> 
<!-- SUCCESS MESSAGE -->
<p>Message Sent!<br>Redirecting back to homepage.</p>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
<?php 
}
?>