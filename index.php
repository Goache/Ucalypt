<?php 

//session_start();  //look into cookies later

//echo count(unserialize($_COOKIE["RecentlyViewed"]));
//creates the correct formate for the slider

$i=0;
foreach(unserialize($_COOKIE["RecentlyViewed"]) as $item) {

   if ($i==0){
        $RecentOut.='<div class="item active">';
        $RecentOut.= '<ul class="thumbnails">';
	 $RecentOut.= $item;
   }elseif ($i==4){
        $RecentOut.='</ul></div><div class="item">';
        $RecentOut.= '<ul class="thumbnails">';
	 $RecentOut.=$item;

   }else {
	  $RecentOut.=$item;
   }
   $i=$i+1;   

}
   $RecentOut.= '</ul></div>';


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





        <!-- Carousel
    ================================================== -->
     
    
      
    <div id="this-carousel-id" class="carousel slide"><!-- class of slide for animation -->
  <div class="carousel-inner">
    <div class="item active"><!-- class of active since it's the first item -->
      <img src="style/img/home01.jpg" alt="" />
    </div>
    <div class="item">
      <img src="style/img/home01.jpg" alt="" />
    </div>
    <div class="item">
      <img src="style/img/home01.jpg" alt="" />
    </div>
    <div class="item">
      <img src="style/img/home01.jpg" alt="" />
    </div>
  </div><!-- /.carousel-inner -->
  <!--  Next and Previous controls below
        href values must reference the id for this carousel -->
    <a class="carousel-control left" href="#this-carousel-id" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#this-carousel-id" data-slide="next">&rsaquo;</a>
</div><!-- /.carousel -->













      <div class="container-fluid">
          <div class="row-fluid">
              <div class="row-fluid">
                <header id="overview">
                    <h1>Recently Viewed</h1>
                </div>
         
			<div class="carousel slide" id="myCarousel">
                         
			<div style= "margin-left:40px;" class="carousel-inner">

    		       <?php echo $RecentOut; ?>
    	    
			</div>
			<a data-slide="prev" href="#myCarousel" class="left carousel-control">‹</a>
			<a data-slide="next" href="#myCarousel" class="right carousel-control">›</a>
			</div>

           </div>
        </div>



      <div class="container-fluid">
          <div class="row-fluid">
              <div class="row-fluid">
                <header id="overview">
                    <h1>Deals</h1>
                </div>
         
			<div class="carousel slide" id="myCarousel">
                         
			<div style= "margin-left:40px;" class="carousel-inner">

    		       <div class="item active"><ul class="thumbnails"><li class="span3"><div class="thumbnail"><a href="./product.php?&id=A198-073"><img src="https://maxbuyer.officemax.com/shop/images/products/imgs_180/179310.jpg" width="150" height="150" alt="image 01" border="0" /></a> <br /><p> Parker - IM Series Roller Ball Pens - Gunmetal, Black, Medium</p> <p> $25.39</p> </div> </li><li class="span3"><div class="thumbnail"><a href="./product.php?&id=A198-071"><img src="https://maxbuyer.officemax.com/shop/images/products/imgs_180/150185.jpg" width="150" height="150" alt="image 01" border="0" /></a> <br /><p> Avery - Glue Sticks - 6/Pack, 1.27 oz</p> <p> $5.26</p> </div> </li><li class="span3"><div class="thumbnail"><a href="./product.php?&id=A198089"><img src="https://maxbuyer.officemax.com/shop/images/products/imgs_180/222860.jpg" width="150" height="150" alt="image 01" border="0" /></a> <br /><p> Avery - Permanent Kidde - Front-Load Smoke Alarm - 5-year</p> <p> $14.58</p> </div> </li><li class="span3"><div class="thumbnail"><a href="./product.php?&id=A100-214"><img src="http://img3.fastenal.com/productimages/0321062_hr1c.jpg" width="150" height="150" alt="image 01" border="0" /></a> <br /><p> Vitrified Toolroom Wheel</p> <p> $101.93</p> </div> </li></ul></div><div class="item"><ul class="thumbnails"><li class="span3"><div class="thumbnail"><a href="./product.php?&id=A16008CGS5"><img src="https://maxbuyer.officemax.com/shop/images/products/imgs_180/222860.jpg" width="150" height="150" alt="image 01" border="0" /></a> <br /><p> Kidde - Front-Load Smoke Alarm - 5-year</p> <p> $4.26</p> </div> </li><li class="span3"><div class="thumbnail"><a href="./product.php?&id=A198095"><img src="https://maxbuyer.officemax.com/shop/images/products/imgs_180/218322.jpg" width="150" height="150" alt="image 01" border="0" /></a> <br /><p> Avery - Glue Sticks - Clear - 6/Pack, 0.26 oz</p> <p> $4.02</p> </div> </li><li class="span3"><div class="thumbnail"><a href="./product.php?&id=A198096"><img src="https://maxbuyer.officemax.com/shop/images/products/imgs_180/133767.jpg" width="150" height="150" alt="image 01" border="0" /></a> <br /><p> Avery - Glue Sticks - 6/Pack, 0.26 oz</p> <p> $4.02</p> </div> </li><li class="span3"><div class="thumbnail"><a href="./product.php?&id=A1E517"><img src="https://maxbuyer.officemax.com/shop/images/products/imgs_180/144526.jpg" width="150" height="150" alt="image 01" border="0" /></a> <br /><p> Elmers - Glue Sticks - 12/Pack, 0.77 oz</p> <p> $12.2</p> </div> </li></ul></div>    	    
			</div>
			<a data-slide="prev" href="#myCarousel" class="left carousel-control">‹</a>
			<a data-slide="next" href="#myCarousel" class="right carousel-control">›</a>
			</div>

           </div>
        </div>



      <div class="container-fluid">
          <div class="row-fluid">
              <div class="row-fluid">
                <header id="overview">
                    <h1>Favorites</h1>
                </div>
         
			<div class="carousel slide" id="myCarousel">
                         
			<div style= "margin-left:40px;" class="carousel-inner">

    		       <div class="item active"><ul class="thumbnails"><li class="span3"><div class="thumbnail"><a href="./product.php?&id=A198-071"><img src="https://maxbuyer.officemax.com/shop/images/products/imgs_180/222864.jpg" width="150" height="150" alt="image 01" border="0" /></a> <br /><p> Kidde - Pro Line Tri-Class Dry Chemical Fire Extinguishers - 18 Lbs., Ul Rating-10A-80B:C, Aluminum </p> <p> $158.31</p> </div> </li><li class="span3"><div class="thumbnail"><a href="./product.php?&id=A198-073"><img src="https://maxbuyer.officemax.com/shop/images/products/imgs_180/180008.jpg" width="150" height="150" alt="image 01" border="0" /></a> <br /><p>Post-It - Note Pads in Pastel Colors - Assorted, 5/Pack, 3 x 5, </p> <p> $5.88</p> </div> </li><li class="span3"><div class="thumbnail"><a href="./product.php?&id=A198089"><img src="https://maxbuyer.officemax.com/shop/images/products/imgs_180/161623.jpg" width="150" height="150" alt="image 01" border="0" /></a> <br /><p> 3M - Notebook/LCD Desktop Monitor Privacy Filters - 15.4 Widescreen</p> <p> $45.18</p> </div> </li><li class="span3"><div class="thumbnail"><a href="./product.php?&id=A100-214"><img src="https://maxbuyer.officemax.com/shop/images/products/imgs_180/36261.jpg" width="150" height="150" alt="image 01" border="0" /></a> <br /><p> Bausch & Lomb - Handheld Round Magnifiers - 2X/4X, 4 dia</p> <p> $9.66</p> </div> </li></ul></div><div class="item"><ul class="thumbnails"><li class="span3"><div class="thumbnail"><a href="./product.php?&id=A16008CGS5"><img src="https://maxbuyer.officemax.com/shop/images/products/imgs_180/146737.jpg" width="150" height="150" alt="image 01" border="0" /></a> <br /><p> Scotch - Clear Glue Sticks - 5/Pack, 0.27 oz, Stick</p> <p> $4.26</p> </div> </li><li class="span3"><div class="thumbnail"><a href="./product.php?&id=A198095"><img src="https://maxbuyer.officemax.com/shop/images/products/imgs_180/218322.jpg" width="150" height="150" alt="image 01" border="0" /></a> <br /><p> Avery - Glue Sticks - Clear - 6/Pack, 0.26 oz</p> <p> $4.02</p> </div> </li><li class="span3"><div class="thumbnail"><a href="./product.php?&id=A198096"><img src="https://maxbuyer.officemax.com/shop/images/products/imgs_180/133767.jpg" width="150" height="150" alt="image 01" border="0" /></a> <br /><p> Avery - Glue Sticks - 6/Pack, 0.26 oz</p> <p> $4.02</p> </div> </li><li class="span3"><div class="thumbnail"><a href="./product.php?&id=A1E517"><img src="https://maxbuyer.officemax.com/shop/images/products/imgs_180/144526.jpg" width="150" height="150" alt="image 01" border="0" /></a> <br /><p> Elmers - Glue Sticks - 12/Pack, 0.77 oz</p> <p> $12.2</p> </div> </li></ul></div>    	    
			</div>
			<a data-slide="prev" href="#myCarousel" class="left carousel-control">‹</a>
			<a data-slide="next" href="#myCarousel" class="right carousel-control">›</a>
			</div>

           </div>
        </div>






   <footer>
        <p>&copy; Ucalypt 2012</p>
   </footer>

    </div> <!-- /container -->




</body>

</html>
