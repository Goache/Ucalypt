<?php
//This adds an item into the cart
session_start();  //look into cookies later


$email_to = "chrisvmiller@inbox.com";
$email_subject = "Cool XML File Output Beans";
$headers = 'From: Birthday Reminder <birthday@example.com>' . "\r\n";


@mail($email_to, $email_subject, $_SESSION['XML'], $headers); 
?>

 





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<!--Style Sheet-->
<link rel="stylesheet" href="style/headerstyle.css" type="text/css" media="screen" />
<link rel="stylesheet" href="style/main.css" type="text/css" media="screen" />

<title>Ucalypt Results</title>
	
    <link rel="stylesheet" href="../../themes/base/jquery.ui.all.css">
	<script src="scripts/js/jquery-1.8.0.js"></script>
	<script src="scripts/js/ui/jquery.ui.core.js"></script>
	<script src="scripts/js/ui/jquery.ui.widget.js"></script>
	<script src="scripts/js/ui/jquery.ui.mouse.js"></script>
	<script src="scripts/js/ui/jquery.ui.draggable.js"></script>
	<script src="scripts/js/ui/jquery.ui.droppable.js"></script>





	



</head>
 
<body>

<?php include_once("template_header.php");?>


Thank you for contacting us. We will touch you very soon. Cool beans


</body>

</html>
