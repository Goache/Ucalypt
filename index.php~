<?php 

//session_start();  //look into cookies later

//creates the correct formate for the slider
foreach(unserialize($_COOKIE["RecentlyViewed"]) as $item) {
  	$RecentOut.='<li>';
	$RecentOut.=$item;
	$RecentOut.='</li>';
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Import JS and CSS-->
<link rel="stylesheet" href="style/main.css" type="text/css" media="screen" />
<link href="style/js-image-slider.css" rel="stylesheet" type="text/css" />
<script src="scripts/js/js-image-slider.js" type="text/javascript"></script>
<script src="scripts/js/jquery-1.8.0.js" type="text/javascript"></script>
<script src="scripts/js/jquery-ui-1.8.22.custom.min.js" type="text/javascript"></script>

	<script type="text/javascript" src="scripts/js/jquery.liquidcarousel.pack.js"></script>



<!-- End Import JS and CSS-->


	<script type="text/javascript">
	<!--
		$(document).ready(function() {
			$('#liquid1').liquidcarousel({height:300, duration:1000, hidearrows:false});
		});
		
		
			$(document).ready(function() {
			$('#liquid2').liquidcarousel({height:300, duration:1000, hidearrows:false});
		});
		
	-->
	</script>


<title>Ucalypt Online Marketplace</title>
</head>



<body>
<?php include_once("template_header.php");?>







<br /> <!-- CHANGE THIS LATER TO PADDING-->




<!--------------------------------------
Start of the of the main image turner
----------------------------------------->

<div id="sliderFrame">
        <div id="slider">
            <a href="http://www.menucool.com/jquery-slider" target="_blank">
                <img src="style/images/image-slider-1.png" />
            </a>
            <img src="style/images/image-slider-2.jpg" alt="" />
            <img src="style/images/image-slider-3.jpg" alt="Pure Javascript. No jQuery. No flash." />
            <img src="style/images/image-slider-4.jpg" alt="#htmlcaption" />
            <img src="style/images/image-slider-5.jpg" />
        </div>
        <div id="htmlcaption" style="display: none;">
            <em>HTML</em> caption. Link to <a href="http://www.google.com/">Google</a>.
        </div>
  
  
</div>

<!--------------------------------------
End of the main image turner
----------------------------------------->



<br /> <!-- CHANGE THIS LATER TO PADDING-->
<br /> <!-- CHANGE THIS LATER TO PADDING-->



<!--------------------------------------
Start of the of the first image carosoual
----------------------------------------->


<h2>Daily Deals  </h2>
<hr width="85%">
<div id="liquid1" class="liquid">

	<span class="previous"> <img src="style/images/previous.png" /> </span>
    
	<div class="wrapper">

		<ul>
        <li><a href="#" title="image 01"><img src="http://productimages.grainger.com/is/image/Grainger/1GAH9_AS01?$productdetail$" width="150" height="176" alt="image 01" border="0" /></a> <br /> FLUKE True RMS, Auto Ranging MultiMeter <br /> Price: $194.00 </li>
			<li><a href="#" title="image 01"><img src="https://static.fishersci.com/images/F35323~wl.jpg" width="150" height="176" alt="image 01" border="0" /></a> <br /> Plastic Test Tubes <br /> Price: $9.95 (Pack of 12) </li>
			<li><a href="#" title="image 02"><img src="http://www.officemax.com/catalog/images/397x353/23355655i_01.jpg"  width="150" height="176" alt="image 02" border="0" /></a> HP EliteBook 8560p Notebook <br /> Price: $1235.95</li>
			<li><a href="#" title="image 03"><img src="http://www.officemax.com/catalog/images/397x353/20591851i_01.jpg"  width="150" height="176" alt="image 03" border="0" /></a>HP EliteBook 8560p Notebook <br /> Price: $1.99</li>
			<li><a href="#" title="image 04"><img src="https://static.fishersci.com/images/F28590~wl.jpg"  width="150" height="176" alt="image 04" border="0" /></a> Fisher Scientific Maxima C Plus Vacuum Pump <br /> Price: $3,967.74    </li>
			<li><a href="#" title="image 06"><img src="http://www.officemax.com/catalog/images/397x353/20120110i_01.jpg"  width="150" height="176" alt="image 06" border="0" /></a>Hammermill Color Copy Laser Paper <br /> Price:13.95</li>
		</ul>
	</div>
	<span class="next"><img src="style/images/next.png" />
     </span>
</div>

<!--------------------------------------
Start of the first  image carosoual
----------------------------------------->




<!--------------------------------------
Start of the of the second image carosoual
----------------------------------------->

<h2>Recently Viewed Items </h2>
<hr width="85%">

<div id="liquid2" class="liquid">
	<span class="previous"> <img src="style/images/previous.png" /> </span>
		<div class="wrapper">
    
		<ul>
			<?php echo $RecentOut; ?> 
		</ul>
	</div>
	<span class="next"><img src="style/images/next.png" />
     </span>
</div>


<!--------------------------------------
End of the of the second image carosoual
----------------------------------------->











<!-- Start of the Footer-->
<div id="footer">

<div>
</div>

<!-- End of the Footer-->

</body>

</html>
