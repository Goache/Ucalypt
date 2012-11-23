<?php 

session_start();  //look into cookies later

//gets the Solarium library (it's a solr php wrapper)
require('./scripts/php/Solarium/library/Solarium/Autoloader.php');
Solarium_Autoloader::register();

//the intial config that looks at local host at port 8983
$config = array(
    'adapteroptions' => array(
        'host' => '127.0.0.1',
        'port' => 8983,
        'path' => '/solr/',
    )
);

// creates a client instance for an actual search
$client = new Solarium_Client($config);

// get a select query instance
$query = $client->createSelect();

$query->setStart(0)->setRows(1);

//Gets the search terms and categories from the URL
$id=$_GET['id']; 


$query->setQuery("id:$id");  

// set fields to fetch certain things from my schema
$query->setFields(array('productssid','sellprice','picy','id'));

  //sets the query
  $totalresultset = $client->select($query);

  // show documents using the resultset iterator
  foreach ($totalresultset as $document) {
       $items=array();

      // the documents are also iterable, to get all fields
      foreach($document AS $field => $value)
      {
           if ($field=='productssid'){
                  $items[0]=$value;
	  }
          if ($field=='sellprice'){
                  $items[1]=$value;
	   }
          if ($field=='picy'){
                  $items[2]=$value;
	   }
          if ($field=='id'){
                  $items[3]=$value;
	   }
      }
      $searchOutput.='<a href="./product.php?&id='.$items[3].'"><img src="'.$items[2].'" width="250" height="250" alt="image 01" border="0" /></a> <br /><name> '.$items[0].'</name> <br /> '.$items[1].'<br>';	
      


       $arr = unserialize($_COOKIE['RecentlyViewed']);
       //new add
       $arr[] = '<a href="./product.php?&id='.$items[3].'"><img src="'.$items[2].'" width="150" height="150" alt="image 01" border="0" /></a> <br /><name> '.$items[0].'</name> <br /> '.$items[1].'';

      if(sizeof($arr)>10){
                array_splice($arr, 0, 1);
      }

       setcookie("RecentlyViewed",'',time()-10); 
       setcookie('RecentlyViewed', serialize($arr), time()+10000);

  }






$queryMORE = $client->createMoreLikeThis();



$queryMORE->setQuery("id:$id");
$queryMORE->setMltFields('productssid,cat4');
$queryMORE->setMinimumDocumentFrequency(1);
$queryMORE->setMinimumTermFrequency(1);
//$queryMORE->createFilterQuery('stock')->setQuery('inStock:true');
//$queryMORE->setInterestingTerms('details');
$queryMORE->setMatchInclude(true);

// this executes the query and returns the result
$resultsetMore = $client->select($queryMORE);


// show MLT documents using the resultset iterator
foreach ($resultsetMore as $document) {
 //   echo '<hr/><table>';

    // the documents are also iterable, to get all fields
    foreach($document AS $field => $value)
    {
        // this converts multivalue fields to a comma-separated string
        if(is_array($value)) $value = implode(', ', $value);
        	if ($field=='id'){
		     $id=$value;
		}
		if ($field=='productssid'){
		     $name=$value;
		}
		if ($field=='sellprice'){
		     $price=$value;
		}
		if ($field=='picy'){ 
		     $URL=$value;
		}
	      	
    }
	$MoreLikeThisOutput.= '<li><a href="./product.php?&id='.$id.'"><img src="'.$URL.'" width="150" height="150" alt="image 01" border="0" /></a> <br /><name> '.$name.'</name> <br /> '.$price.'<br> </li>';
 //   echo '</table>';
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
        <script src="scripts/js/jquery-ui-1.8.22.custom.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="scripts/js/jquery.liquidcarousel.pack.js"></script>


<script type="text/javascript">
	<!--
		$(document).ready(function() {
			$('#liquidproduct').liquidcarousel({height:300, duration:1000, hidearrows:false});
		});
		
		
		
	-->
	</script>


	



</head>
 
<body>

<?php include_once("template_header.php");?>





    <h2>Current Item  </h2>
     <hr width="85%">
    <div id="productlisting">
    
     <?php echo $searchOutput; ?>


     <form id="addcart" name="addcart" method="post" action="./cart.php">
       <input type="hidden" name="name" id="name" value="<?php echo $items[0]; ?> "/>
       <input type="hidden" name="price" id="price" value="<?php echo $items[1]; ?> "/>
       <input type="hidden" name="id" id="id" value="<?php echo $items[3]; ?> "/>
       <input type="hidden" name="URL" id="URL" value="<?php echo $items[2]; ?> "/>
       <input type="submit" name="button" id="button" value="Add to Cart" />
       </form>
      </div>





  <!--------------------------------------
Start of the of the first image carosoual
----------------------------------------->

<br>
<br>
<h2>Similiar Items  </h2>
<hr width="85%">
<div id="liquidproduct" class="liquid">

	<span class="previous"> <img src="style/images/previous.png" /> </span>
    
	<div class="wrapper">

		<ul>
			<?php echo $MoreLikeThisOutput; ?> 
		</ul>
	</div>
	<span class="next"><img src="style/images/next.png" />
     </span>
</div>

<!--------------------------------------
Start of the first  image carosoual
-----------------------------------------> 



</body>

</html>
