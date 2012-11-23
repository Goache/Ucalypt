<?php 

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





//Gets the search terms and categories from the URL
$keyword=$_GET['searchterms'];   //this is obvious
$Cat2=$_GET['cat2']; //the second category 
$Cat3=$_GET['cat3']; //the third category
$Cat4=$_GET['cat4']; //the fourth category
$Next=$_GET['Next'];  //if the next button was pressed 
$Previous=$_GET['Previous']; //if the previous button was pressed


if (empty($Next)==1){
	$StartPosition=1;		
}
if(empty($Next)!=1){
        $StartPosition=$Next+16;

}
if (empty($Previous)!=1 and $Previous>=16){
	$StartPosition=$Previous-16;
}

$query->setStart($StartPosition-1)->setRows(16);

//makes sure we have at least something
if (empty($keyword)!=1 or empty($Cat2)!=1 or empty($Cat3)!=1 or empty($Cat4)!=1 ){  

$a = explode(" ", $keyword ); // turn the search phrase into an array
$searcharray=implode(",", $a );  // output array with commas (and without final comma)
$minprice=$_GET['minprice'];  //get min price
$maxprice=$_GET['maxprice'];   //get max price
$sort=$_GET['sort'];   //gets how you want to sort everything 


// get the facetset component
$facetSet = $query->getFacetSet();


//if we have a keyword (search term), then spell check it
if (empty($keyword)!=1){ 
	//spell check libraries
	$spellcheck = $query->getSpellcheck();
	$spellcheck->setQuery(".$keyword.");
	//$spellcheck->setBuild(true);  ///only build once!!!
	$spellcheck->setExtendedResults(true);
	$spellcheck->setCollate(true);


	// this executes the query and returns the result
	$resultset = $client->select($query);
	$spellcheckResult = $resultset->getSpellcheck();


	#checks if there is a correctly spelled word
	if ($spellcheckResult->getCorrectlySpelled()) {
	       //displays results
	}
	else{  //if not spelled correct
 	     //get correctly spelled words
 	     $collation = $spellcheckResult->getCollation();
 	
	     if (isset($collation)==1){
  	        $correctlyspellled=str_replace('.','',$collation->getQuery());

 	        $Didyoumean='Did you mean: <a href="javascript:addtext();">'.$correctlyspellled.'</a>';
 	     } 
             else{
 	        $Didyoumean='No idea what you want :-(';
 	     }

	}  //ends else for 'if ($spellcheckResult->getCorrectlySpelled()) '
}


// set a query string (and makes sure minprice and maxprice are numbers)
if (is_numeric($minprice) and is_numeric($maxprice)){
      if ($minprice < $maxprice) {
        $Pricerange= "sellprice:[$minprice TO $maxprice]";
       } 
       else{
         $Pricerange="sellprice:[0 TO *]";
       }
//if there is a maxprice entered, but not a minprice 
}elseif(!is_numeric($minprice) and is_numeric($maxprice)){  
	$Pricerange= "sellprice:[0 TO $maxprice]";
}
//if there is a minprice entered, but not a maxprice 
elseif(is_numeric($minprice) and !is_numeric($maxprice)){
	$Pricerange= "sellprice:[$minprice TO *]";
}
//if there isn't anything entered
else{
	$Pricerange="sellprice:[0 TO *]";
}


//this is used to enter a phrase into a solr query
$helper = $query->getHelper();
 
//this series of if statements manges if the query comes from the catelog or the search bar (including facetting)

//if there's a keyword and only a second category, search it and facet over the third category
if (empty($keyword)==1 and empty($Cat3)==1 and empty($Cat4)==1 ) { 
          $query->setQuery("$Pricerange AND cat2:" . $helper->escapePhrase($Cat2));
	  $facetCat='cat3';
}   
//if there's a keyword with the third category selected, search it and facet over the forth category
elseif (empty($keyword)==1 and empty($Cat4)==1 ) {
          $query->setQuery("$Pricerange AND cat3:" . $helper->escapePhrase($Cat3));
	  $facetCat='cat4'; 	
}
//if there's a keyword with the fourth category selected, search it and don't do anymore faceting
elseif (empty($keyword)==1) {
          $query->setQuery("$Pricerange AND cat4:" . $helper->escapePhrase($Cat4));  	
}
//if there isn't a keyword with the second category selected, search it and facet over the third category
elseif(empty($keyword)!=1 and empty($Cat3)==1 and empty($Cat4)==1){
          $query->setQuery("$Pricerange AND productssid:.$searcharray ");
	  $facetCat='cat3';  	
}      	
//if there isn't a keyword with the third category selected, search it and facet over the forth category
elseif (empty($keyword)!=1 and empty($Cat4)==1 ) { 
	  $searchone='cat3:' . $helper->escapePhrase($Cat3);
          $query->setQuery("productssid:.$searcharray. AND $searchone. AND $Pricerange");  
	  $facetCat='cat4';
}
//if there isn't a keyword with the fourth category selected, search it and don't do anymore facetting
elseif (empty($keyword)!=1) { 
	  $searchone='cat4:' . $helper->escapePhrase($Cat4);
          $query->setQuery("productssid:.$searcharray. AND $searchone. AND $Pricerange");  
}


//set facet categories
$facetSet->createFacetField($facetCat)->setField($facetCat);


// set fields to fetch certain things from my schema
$query->setFields(array('productssid','sellprice','picy','id'));

//sort by best match or by price
if ($sort == 'SORT_ASC') {
      $query->addSort('sellprice', Solarium_Query_Select::SORT_ASC);
} 
  if ($sort == 'SORT_DESC') {
      $query->addSort('sellprice', Solarium_Query_Select::SORT_DESC);
} else {
}





//gets the complete solr responce 
$totalresultset = $client->select($query);

$FinalPosition=$StartPosition+15;
// display the total number of documents found by solr
$NumFound= $totalresultset->getNumFound();
if ($StartPosition-1 >= $NumFound-$NumFound %16){
	$StartPosition=$NumFound-$NumFound %16+1;
	$FinalPosition=$NumFound;
}












//stores the name of the current URL
$currentURL=$_SERVER["REQUEST_URI"];

  
// display facet counts
$facet = $totalresultset->getFacetSet()->getFacet("$facetCat");
$i=0;
foreach($facet as $value => $count) {
	if ($count > 4) { 
            $newURL="&$facetCat=" .$value;
            $buttonreset="&Next=0";    
	    $faceteditems.=  "<a href='$currentURL$newURL$buttonreset'> $value </a>" . ' [' . $count . ']<br/>';
        }
	$i=$i+1;
	if ($i>20){
	break;
	}
}



//outsput search table
$Out.="<table>"; //starts the html table tag
$col=0;
  // show documents using the resultset iterator
  foreach ($totalresultset as $document) {
       $items=array();  //stores the current item into an array (resets each loop iteration)
        
        if($col==0){  //starts a new 'tr' tag at the start of each row
            $Out.="<tr>"; 
        }
   

      // gets all information for each document
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
         $col++;   
         if ($col <= 4){
              $Out.="<td>"; //the item order is detemined from the setfield quaery found above
                  //$Out.='<a href="./product.php?&id='.$items[2].'"><img src="'.$items[3].'" width="150" height="150" alt="image 01" border="0" /></a> <br /><name> '.$items[0].'</name> <br /> '.$items[1].'<br>  </li>';
              $Out.='<li><a href="./product.php?&id='.$items[3].'"><img src="'.$items[2].'" width="150" height="150" alt="'.$items[0].'" border="0" /></a> <br /><name> '.$items[0].'</name> <br /> '.$items[1].'<br>  </li>';
		$Out.="</td>";
               
           }else {
            }
         

	if ($col >= 4){
	      $col = 0; // reset column to 0 each time printing one row.
              $Out.="</tr>";
	}


     }
$Out.="</tr>";
$Out.="</table>"; //ends table




} //ends if keyword is set
else // else statement for 'if (isset($keyword)==1)' ...all the way up top
{ }  //leave empty, I guess





?>
