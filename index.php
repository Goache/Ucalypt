<?php 

//session_start();  //look into cookies later

//echo count(unserialize($_COOKIE["RecentlyViewed"]));
//creates the correct formate for the slider

$i=0;
foreach(unserialize($_COOKIE["RecentlyViewed"]) as $item) {

   if ($i==0){
        $RecentOut.='<div class="item active">';
        $RecentOut.= '<ul class="thumbnails">';
	 $RecentOut.=$item;
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
         
			<div class="carousel slide span12" id="myCarousel">
			<div class="carousel-inner">

    		       <?php echo $RecentOut; ?>
    	    
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

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="scripts/js/bootstrap-transition.js"></script>
    <script src="scripts/js/bootstrap-alert.js"></script>
    <script src="scripts/js/bootstrap-dropdown.js"></script>
    <script src="scripts/js/bootstrap-tab.js"></script>
    <script src="scripts/js/bootstrap-button.js"></script>
    <script src="scripts/js/bootstrap-carousel.js"></script>
    <script type="text/javascript" src="scripts/js/jquery.liquidcarousel.pack.js"></script>
    <script>
       $(document).ready(function(){
        $('.carousel').carousel();
       });
    </script>


</body>

</html>
