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



 if(!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"])< 1) {
	   $cartOutput="Your Cart is empty!!!! :-( <br/>";
   } else {
           $i=0;
	   foreach($_SESSION["cart_array"] as $each_items) {
		 $id=$each_items['id'];
  		 $name=$each_items['name'];
		 $price=$each_items['price'];
		 $URL=$each_items['URL'];
                 $quantity=$each_items['quantity'];


		 $totalprice=$price*$quantity;
		 $cartTotal=$totalprice + $cartTotal;

 		//nice formating for money
		 setlocale(LC_MONETARY,"en_US");
		 $totalprice=money_format("%10.2n",$totalprice);

 //creates a dynamic table
		 $cartOutput .="<tr>";
		 //output picture
		 $cartOutput .="<td>" ."<img src=$URL width='50' height='50'/>". "</td>";
		 //outputs product name with link back to image
		 $cartOutput .="<td>" .'<a href="product.php?id='.$id.'">'.$name. "</td>";
		 //outputs price
		 $cartOutput .="<td>" .$price. "</td>";
		 //outputs quantity that a user may change with a form
		 $cartOutput .='<td>  <form action="cart.php" method="post">
		 <input name="quantity" type="text" value="'.$quantity.'" size="1" maxlength="2"/>
		 <input name="changeButton'.$id.' "type= "submit"  value="Change"/> <input name="index_to_change" type="hidden" value="'.$id.'"/> <input name="price" type="hidden" value="'.$price.'"/> <input name="URL" type="hidden" value="'.$URL.'"/> <input name="name" type="hidden" value="'.$name.'"/> <input name="id" type="hidden" value="'.$id.'"/>  </form> </td>';
		//total price for single item
		 $cartOutput .="<td>" .$totalprice. "</td>";
		 //allows a user to remove a single item
		 $cartOutput .='<td> <form action="./cart.php" method="post"> <input name="deleteButton' .$id.' "type= "submit"  value="X"/> <input name="index_to_remove" type="hidden" value="'.$i.'"/>  </form> </td>';
		 $cartOutput .="</tr>";
			



                 $XMLout.= '<itemnumber>'.$i; 
		 $XMLout.= '<productid>'.$id.'</productid>';
	         $XMLout.= '<name>'.$name.'</name>';
		 $XMLout.= '<price>'.$price.'</price>';
		 $XMLout.= '<quantity>'.$quantity.'</quantity>';
		 $XMLout.= '<totalprice>'.$totalprice.'</totalprice>';
                 $XMLout.= '</itemnumber>'.$i; 
 
                 $i++;

}
	
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





     <div id="cartpage">
       
 	

      <table width="100%" border="1">
      <tr>
        <td width="27%">Image</td>
        <td width="27%">Product</td>
        <td width="18%">Unit Price</td>
        <td width="17%">Quantity</td>
        <td width="28%">Total</td>
        <td width="10%">Remove</td>
      </tr>
    
       <?php echo $cartOutput; ?>
       </div>
<br>
<br>
<br>
<br>
<form action="confirmation.php" method="post" enctype="text/plain">


 
<input type="submit" value="Submit">

</form>

     <div id="cartpage">
Total Price: $ <?php echo $cartTotal; ?>

<p> <a href="cart.php?cmd=emptycart"> Empty Your Cart </a></p>
</div>


     </div>




</body>

</html>
