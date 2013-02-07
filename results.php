<?php include_once("./scripts/php/search.php");?>



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

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.comsvn/trunk/html5.js"></script>
    <![endif]-->


  </head>
 
<body>

<?php include_once("template_header.php");?>





  <div class="container-fluid">
          <hr>
          <div class="row-fluid" style="padding-top: 20px;">
              <div class="span3">
                  <div class="well sidebar-nav">
                      <ul class="nav nav-list">


<form name="myformmore" id="myformmore" action="./results.php" method='get'>
         <input type="hidden" name="searchterms" size='2' value="<?php echo $keyword ?>" />
         <input type="hidden" name="cat2" size='2' value="<?php echo $Cat2 ?>" />
         <input type="hidden" name="cat3" size='2' value="<?php echo $Cat3 ?>" />
         <input type="hidden" name="cat4" size='2' value="<?php echo $Cat4 ?>" />
         Min: <input type="number" name="minprice" style="width: 30px" value="<?php echo $_GET['minprice']; ?>" />  
         Max: <input type="number" name="maxprice"style="width: 30px" value="<?php echo $_GET['maxprice']; ?>" /> <br>
	 Sort: <select name="sort" style="width: 120px" >
		<option value="SORT_DEFAULT" <?php if($_REQUEST['sort']=='SORT_DEFAULT') echo "selected='selected'";?>>Relevance</option>		
		<option value="SORT_ASC"  <?php if($_REQUEST['sort']=='SORT_ASC') echo "selected='selected'";?>>Lowest Price</option>
		<option value="SORT_DESC" <?php if($_REQUEST['sort']=='SORT_DESC') echo "selected='selected'";?>>Highest Price</option>

		</select>
         <input type='submit'  class="submitd" value='Go' />
	 <input type="hidden" name="Next" value="0">
        </form>


                          <li class="nav-header">Refine</li>

                           <?php echo $faceteditems; ?>

                      </ul>
                  </div><!--/.well -->
              </div><!--/span-->
              <div class="span9">
                  <div class="row-fluid">
                      <header id="overview">
  
                          </div>
                   <?php echo $Didyoumean; ?>	







	

    <ul class="breadcrumb" class="pull-right">
    <li><?php if(empty($keyword)!=1) {echo '<a href="/results.php?searchterms=', urlencode($keyword), '  ">'.$keyword.'</a>';}else{echo '<a href="/results.php?cat2=', urlencode($Cat2), '  ">'.$Cat2.'</a>';}   ?></a> <span class="divider">/</span></li>


        <li><?php if(empty($keyword)!=1) {echo '<a href="/results.php?searchterms='. urlencode($keyword). '&cat3='. urlencode($Cat3).'  ">'.$Cat3.'</a>';}else{echo '<a href="/results.php?cat2='. urlencode($Cat2). '&cat3='.urlencode($Cat3).'  ">'.$Cat3.'</a>';}   ?></a> <span class="divider">/</span></li>




    <li class="active"> <?php echo $Cat4; ?></li>
    </ul>


   	<form name="nextprevious" class="pull-right" id="myformmore" action="./results.php" method='get'>

         <input type="hidden" name="searchterms" size='2' value="<?php echo $keyword ?>" />
         <input type="hidden" name="cat2" size='2' value="<?php echo $Cat2 ?>" />
         <input type="hidden" name="cat3" size='2' value="<?php echo $Cat3 ?>" />
         <input type="hidden" name="cat4" size='2' value="<?php echo $Cat4 ?>" />
          <input type="hidden" name="minprice" size='1' value="<?php echo $_GET['minprice']; ?>" /> 
         <input type="hidden" name="maxprice" size='1' value="<?php echo $_GET['maxprice']; ?>" /> 
	 <select style="visibility:hidden;" name="sort"  >
		<option value="SORT_DEFAULT" <?php if($_REQUEST['sort']=='SORT_DEFAULT') echo "selected='selected'";?>> Relevant</option>		
		<option value="SORT_ASC"  <?php if($_REQUEST['sort']=='SORT_ASC') echo "selected='selected'";?>>  Price Ascending</option>
		<option value="SORT_DESC" <?php if($_REQUEST['sort']=='SORT_DESC') echo "selected='selected'";?>  > Price Descending</option>

		</select>
         <button class="btn" type="submit" name="Previous" value="<?php echo $StartPosition ?>">Previous</button>
          <?php echo $CurrentPage; ?>  of  <?php echo $pages; ?> 
	 <button class="btn" type="submit" name="Next" value="<?php echo $StartPosition ?>">Next</button>
        </form>



<br>
<br>
<br>





                  <div class="row-fluid">
                      




                    <?php echo $Out; ?>



 
                      </div><!--/span-->
                  </div><!--/row-->
              </div><!--/span-->
          </div><!--/row-->


      <hr>

      <footer>
        <p>&copy; Company 2012</p>
      </footer>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script>
       $(document).ready(function(){
        $('.carousel').carousel();
       });
    </script>















</body>

</html>
