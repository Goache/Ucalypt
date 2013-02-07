<?php
//This adds an item into the cart
session_start();  //look into cookies later


//Get product id variable from add to chart button 
if(isset($_POST['id']) && empty($_POST['index_to_change'] ) ){
   $id=$_POST['id'];
   $price=$_POST['price'];
   $name=$_POST['name'];
   $URL=$_POST['URL'];	
   $wasFound=false;
   $i=0; //indexes array
   //checks if the cart is empty
   if(!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"])< 1) {
	   //Sets up the cart with one item and 1 quantity if nothing is already in it
	   $_SESSION["cart_array"]= array(0=> array("id"=> $id, "quantity"=>1, "name"=> $name,"price"=> $price,"URL"=> $URL)); 
   } else {
	   //Checks if the item entered is already in the cart
	   foreach ($_SESSION["cart_array"] as $each_item) {
   		 $i++;
		 //loops over 'add to cart' array
    	 while (list($key, $value) = each($each_item)) {
           //finds the item with the product id
		   if ($key=="id" && $value==$id) {
			   //adds one to the found itme
			   array_splice($_SESSION["cart_array"],$i-1,1,array(array("id"=> $id, "quantity"=>$each_item['quantity']+1,"name"=> $name,"price"=> $price,"URL"=> $URL)));      
                        var_dump($_SESSION["cart_array"]);
     			$wasFound=true;
		   } //close if
         } //close while
	   } //close foreach
 	   //if the item isn't already in the cart
	   if($wasFound==false){
		   //adds (pushes) item into cart
		   array_push($_SESSION["cart_array"], array("id"=> $id, "quantity"=>1,"name"=> $name,"price"=> $price,"URL"=> $URL) );
		   }
   }      ///closes else 
	//prevents doubling item upon refresh
	header("location:cart.php");
	exit();
}
?>


<?php
//remove a single item

//gets item id form remove button form
if(isset($_POST['index_to_remove']) && $_POST['index_to_remove']!= ""){
    $key_to_remove=$_POST['index_to_remove'];
	if(count($_SESSION["cart_array"]) <=1) {
		unset($_SESSION["cart_array"]);
	} else {  //removes array element and resets array
		unset($_SESSION["cart_array"]["$key_to_remove"]);
		sort($_SESSION["cart_array"]);
		}
}
?>

<?php
//emptys shopping cart
if(isset($_GET['cmd']) && $_GET['cmd']=="emptycart"){
   unset($_SESSION["cart_array"]);	
}
?>



<?php


//This changes the quantity of an item
  $id=$_POST['id'];
   $price=$_POST['price'];
   $name=$_POST['name'];
   $URL=$_POST['URL'];
//get's the item id from the text input form
if(isset($_POST['index_to_change']) && $_POST['index_to_change']!=""){
	$index_to_change=$_POST['index_to_change'];
	$quantity=$_POST['quantity'];  //from form (setup further in the code)	
	$i=0;
	//searches for item and changes it quantity, similiar to adding an item to the cart
	foreach($_SESSION["cart_array"] as $each_item) {
   		 $i++;
    	 while (list($key, $value) = each($each_item)) {
		   if ($key=="id" && $value == $index_to_change) {
			   array_splice($_SESSION["cart_array"],$i-1,1,array(array("id"=> $index_to_change, "quantity"=> $quantity,"name"=> $name,"price"=> $price,"URL"=> $URL)));                            
     			$wasFound=true;
		   } //close if
         } //close while
	  } //close foreach
}
?>




<?php
//Renders the cart
$cartOutput="";  //dynamic variable for cart output
$XMLout="";
$cartTotal=0;   //price of every item in cart
   //if nothing is in the cart tells the user




//list of CXML variables
$uDUNS="uDuns";
$vendorDUNS="VDuns";
$invoicenum="1234";
$username="Chris Miller";
$userstreet="1 Shields Ave";
$usercity="Davis";
$userstate="California";
$userzip="95616";
$useremail="chris@davis.edu";
$vendor="Fisher";
$vendorstreet="123 Somewhere Apt 5";
$vendorcity="Hooterville";
$vendorstate="New York";
$vendorzip="90210";
$vendoremail="mail@fisher.com";
$comment="nothing"; 

$date=date('Y-m-d');
$time=date('H:i:s');



//echo $payloadID=$date."/".$time."/".rand(1,10000);





//This is the start of the cml string
$string = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE cXML SYSTEM "http://xml.cXML.org/schemas/cXML/1.2.011/InvoiceDetail.dtd">



<cXML timestamp="$date’T’$time" payloadID="$payloadID" version="1.2.011">

<Header>
	<From>
		<Credential domain="$uDUNS">
			<Identity>Ucalypt</Identity>
		</Credential>
	</From>
	<To>
		<Credential domain="$vendorDUNS">
			<Identity>"$vendor"</Identity>
		</Credential>
	</To>
	<Sender>
		<Credential domain="[NetworkID or DUNS]">
			<Identity>UC Davis</Identity>
			<SharedSecret>[Shared Secret]</SharedSecret>
		</Credential>
		<UserAgent>[User Agent]</UserAgent>
	</Sender>


</Header>


<Request deploymentMode="test">
	<InvoiceDetailRequest>
		<InvoiceDetailRequestHeader invoiceID="$invoicenum" purpose="[standard or creditMemo]" operation="new" invoiceDate="$date’T’$time">
		<InvoiceDetailHeaderIndicator />
		<InvoiceDetailLineIndicator />
		<InvoicePartner>
			<Contact role="billTo">
				<Name xml:lang="en-US">"$username"</Name>
				<PostalAddress>
					<Street>"$userstreet"</Street>
					<City>"$usercity"</City>
					<State>"$userstate"</State>
					<PostalCode>"$userzip"</PostalCode>
					<Country isoCountryCode="US">United States</Country>
				</PostalAddress>
			</Contact>
		</InvoicePartner>
		<InvoicePartner>
		<Contact role="remitTo">
			<Name xml:lang="en-US">"$vendor"</Name>
			<PostalAddress>
				<Street>"$vendorstreet"</Street>
				<City>"$vendorcity"</City>
				<State>"$vendorstate"</State>
				<PostalCode>"$vendorzip"</PostalCode>
				<Country isoCountryCode="US">United States</Country>
			</PostalAddress>
		</Contact>
		</InvoicePartner>
		<InvoiceDetailShipping>
		<Contact role="shipFrom" addressID="[Supplier AddressID]">
	<Name xml:lang="en-US">"$vendor$"</Name>
			<PostalAddress>
				<Street>"$vendorstreet"</Street>
				<City>"$vendorcity"</City>
				<State>"$vendorstate"</State>
				<PostalCode>"$vendorzip"</PostalCode>
				<Country isoCountryCode="US">United States</Country>
			</PostalAddress>
			<Email name="default">"$vendoremail"</Email>
			<Phone name="work">
				<TelephoneNumber>
					<CountryCode isoCountryCode="US">1</CountryCode>
					<AreaOrCityCode>[Area Code]</AreaOrCityCode>
					<Number>[Phone Number]</Number>
				</TelephoneNumber>
			</Phone>
		</Contact>
		<Contact role="shipTo" addressID="[ShipTo AddressID from PO]">
			<Name xml:lang="en-US">[ShipTo Name from PO]</Name>
				<PostalAddress name="[Address Name from PO]">
					<DeliverTo>"$username"</DeliverTo>
					<Street>"$userstreet"</Street>
					<City>"$usercity"</City>
					<State>"$userstate"</State>
					<PostalCode>"$userzip"</PostalCode>
					<Country isoCountryCode="US">United States</Country>
				</PostalAddress>
			<Email name="default">"$useremail"</Email>
			<Phone name="work">
				<TelephoneNumber>
					<CountryCode isoCountryCode="US">1</CountryCode>
					<AreaOrCityCode>[Area Code]</AreaOrCityCode>
					<Number>[Phone Number]</Number>
				</TelephoneNumber>
			</Phone>
		</Contact>
		</InvoiceDetailShipping>

		<InvoiceDetailPaymentTerm payInNumberOfDays="20" percentageRate="5" />
		<InvoiceDetailPaymentTerm payInNumberOfDays="30" percentageRate="0" />
		<Comments xml:lang="en-US">"$comment "</Comments> 
		<Extrinsic name="[Extrinsic Name]">[Header Extrinsic Value]</Extrinsic>
		</InvoiceDetailRequestHeader>
		<InvoiceDetailOrder>
			<InvoiceDetailOrderInfo>
				<OrderReference orderID="[orderID from Original PO]" orderDate="[orderDate from Original PO]">
					<DocumentReference payloadID="[payloadID from Original PO]" />
				</OrderReference>
			</InvoiceDetailOrderInfo>
XML;


//
// This goes through the cart
//

$_SESSION["Cart_ItemCount"]=0;

 if(!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"])< 1) {
	   $cartOutput="Your Cart is empty!!!! :-( <br/>";
   } else {
           $i=0;
	   foreach($_SESSION["cart_array"] as $each_items) {
		 $id=$each_items['id'];
  		 $name=$each_items['name'];
		 $price=$each_items['price'];
		 $price=money_format("%1.2n",$price);
		 $URL=$each_items['URL'];
               $quantity=$each_items['quantity'];


		 $totalprice=$price*$quantity;
		 $cartTotal=$totalprice + $cartTotal;
		 $cartTotal=money_format("%1.2n",$cartTotal);

 		//nice formating for money
		 setlocale(LC_MONETARY,"en_US");
		 $totalprice=money_format("%1.2n",$totalprice);

 //creates a dynamic table
		 $cartOutput .="<tr>";
		 //output picture
		 $cartOutput .="<td>" ."<img src=$URL width='70' height='70'/>". "</td>";
		 //outputs product name with link back to image
		 $cartOutput .="<td>" .'<a href="product.php?id='.$id.'">'.$name. "</td>";
		 //outputs price
		 $cartOutput .="<td>$".$price. "</td>";
		 //outputs quantity that a user may change with a form
		 $cartOutput .='<td>  <form action="cart.php" method="post">
		 <input name="quantity" type="text" value="'.$quantity.'" size="1" maxlength="3"/>
		 <button name="changeButton'.$id.'" type= "submit" class="btn">Update</button>
		 <input name="index_to_change" type="hidden" value="'.$id.'"/> 
		 <input name="price" type="hidden" value="'.$price.'"/> 
		 <input name="URL" type="hidden" value="'.$URL.'"/>
		 <input name="name" type="hidden" value="'.$name.'"/> 
		 <input name="id" type="hidden" value="'.$id.'"/>
		 </form></td>';
		//total price for single item
		 $cartOutput .="<td>$".$totalprice. "</td>";
		 //allows a user to remove a single item
		 $cartOutput .='<td> <form action="./cart.php" method="post"> <input name="deleteButton' .$id.' "type= "submit"  value="X"/> <input name="index_to_remove" type="hidden" value="'.$i.'"/>  </form> </td>';
		 $cartOutput .="</tr>";
		 	

 	        $_SESSION["Cart_ItemCount"]=$_SESSION["Cart_ItemCount"]+1;
	 
               

  


$string .=<<<XML
			<InvoiceDetailItem invoiceLineNumber="$i" quantity="$quantity">
			<UnitOfMeasure>[UOM]</UnitOfMeasure>
			<UnitPrice>
			<Money currency="USD">$price</Money>
			</UnitPrice>
			<InvoiceDetailItemReference lineNumber="[Line Number from Original PO]">
			<ItemID>
			<SupplierPartID>$id</SupplierPartID>
			</ItemID>
			<Description xml:lang="en-US">$name</Description>
			</InvoiceDetailItemReference>
			<Comments xml:lang="en-US">[Line Level Comment]</Comments>
			<Extrinsic name="CFVALUE_[Client Custom Field Internal Name]">[Extrinsic Value]</Extrinsic>
			</InvoiceDetailItem>


XML;

 
                 $i++;

}
	
}



$string .=<<<XML
		</InvoiceDetailOrder>
		<InvoiceDetailSummary>
			<SubtotalAmount>
				<Money currency="USD">[Subtotal]</Money>
			</SubtotalAmount>
			<Tax>
				<Money currency="USD">[Total Tax Amount]</Money>
				<Description xml:lang="en-US">[Tax Description]</Description>
			</Tax>
			<SpecialHandlingAmount>
				<Money currency="USD">[Total Handling Amount]</Money>
			</SpecialHandlingAmount>
			<ShippingAmount>
				<Money currency="USD">[Total Shipping Amount]</Money>
			</ShippingAmount>
			<GrossAmount>
				<Money currency="USD">[Gross Amount]</Money>
			</GrossAmount>
			<InvoiceDetailDiscount>
				<Money currency="USD">[Discount Amount]</Money>
			</InvoiceDetailDiscount>
			<NetAmount>
				<Money currency="USD">$cartTotal</Money>
			</NetAmount>
			<DueAmount>
				<Money currency="USD">[Amount Due]</Money>
			</DueAmount>
		</InvoiceDetailSummary>
	</InvoiceDetailRequest>
</Request>

</cXML> 

XML;
                                                                       



?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Ucalypt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="style/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="style/css/bootstrap-responsive.css" rel="stylesheet">




<title>Ucalypt Online Marketplace</title>
</head>



<body>
<?php include_once("template_header.php");?>



<div class="container">
<br>
<br>
<br>
<br>
      <table class="table table-striped table-hover table-condensed">
      <tr>
        <td>Image</td>
        <td>Product</td>
        <td>Unit Price</td>
        <td>Quantity</td>
        <td>Total</td>
        <td>Remove</td>
      </tr>
    
       <?php echo $cartOutput; ?>
	
	<tr>
        <td></td>
        <td></td>
        <td></td>
        <td>Total Price: </td>
        <td>$<?php echo $cartTotal; ?></td>
        <td></td>
      </tr>

	</table>


<form id="confirm" action="./confirmation.php" method="post" >
       <input type="hidden" name="cXMLout" id="cXMLout" value="<?php echo htmlentities($string); ?> "/>
<button type= "submit" class="btn">Submit</button>
</form>
<a href="cart.php?cmd=emptycart"> Empty Your Cart </a>



</div>


</div>



</body>

</html>
