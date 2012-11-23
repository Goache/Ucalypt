<?php
//Autocomplete function!

$quer=$_REQUEST['term'];//get the search terms using 'term' for some reason

//gets the Solarium library (it's a solr php wrapper)
require('./Solarium/library/Solarium/Autoloader.php');
Solarium_Autoloader::register();

//the intial config that looks at local host at port 8983
$config = array(
    'adapteroptions' => array(
        'host' => '127.0.0.1',
        'port' => 8983,
        'path' => '/solr/',
    )
);

// create a client instance
$clientsuggest = new Solarium_Client($config);

// get a suggester query instance
$querysuggest = $clientsuggest->createSuggester();
$querysuggest->setQuery($quer); //multiple terms
$querysuggest->setDictionary('suggest');
$querysuggest->setOnlyMorePopular(true);
$querysuggest->setCount(7);
$querysuggest->setCollate(true);

// this executes the query and returns the result
$resultsetsuggest = $clientsuggest->suggester($querysuggest);

$ssd=$resultsetsuggest->getCollation(); ////WORK ON THIS LATERS

$aaa='[';  //needed for json format output
// display results for each term
foreach ($resultsetsuggest as $term => $termResult) {
   foreach($termResult as $result){
           $aaa.="\"".$result."\",";
    }
}
$bbb=rtrim($aaa, ",");  //removes last comma, will mess up result
$bbb.=']'; //needed for json format output

echo $bbb;//echo json array

?>
