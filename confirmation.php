<?php

//the entire cXML xml string from the post statement
echo $cXML=$_POST['cXMLout']; 

//loads into a simplexml object 
$xml = simplexml_load_string($cXML);


//finds the relevant order children
$Items = $xml->Request->InvoiceDetailRequest->InvoiceDetailOrder->InvoiceDetailItem;

//looks at each item in the order
foreach($Items as $a) {
       //gets the line number and quantity  
	foreach($a->attributes() as $attr) {
            $attr;
       }

$Price= $a->UnitPrice->Money;
$ID=$a->InvoiceDetailItemReference->ItemID->SupplierPartID;
$Decript=$a->InvoiceDetailItemReference->Description;


}

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
