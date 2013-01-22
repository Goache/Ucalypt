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
          <div class="row-fluid">
              <div class="span3">
                  <div class="well sidebar-nav">
                      <ul class="nav nav-list">


<form name="myformmore" id="myformmore" action="./results.php" method='get'>
         <input type="hidden" name="searchterms" size='2' value="<?php echo $keyword ?>" />
         <input type="hidden" name="cat2" size='2' value="<?php echo $Cat2 ?>" />
         <input type="hidden" name="cat3" size='2' value="<?php echo $Cat3 ?>" />
         <input type="hidden" name="cat4" size='2' value="<?php echo $Cat4 ?>" />
         Min: <input type="number" name="minprice" width="30" style="width: 30px" value="<?php echo $_GET['minprice']; ?>" />  
         Max: <input type="number" name="maxprice" width="30" style="width: 30px" value="<?php echo $_GET['maxprice']; ?>" /> 
	 Sort: <select name="sort"  width="130" style="width: 80px" >
		<option value="SORT_DEFAULT" <?php if($_REQUEST['sort']=='SORT_DEFAULT') echo "selected='selected'";?>>Relevant</option>		
		<option value="SORT_ASC"  <?php if($_REQUEST['sort']=='SORT_ASC') echo "selected='selected'";?>>Price Inc</option>
		<option value="SORT_DESC" <?php if($_REQUEST['sort']=='SORT_DESC') echo "selected='selected'";?>>Price Dec</option>

		</select>
         <input type='submit'  class="submitd" value='Go' />
	 <input type="hidden" name="Next" value="0">
        </form>









                          <li class="nav-header">Sort By</li>

                           <?php echo $faceteditems; ?>

                      </ul>
                  </div><!--/.well -->
              </div><!--/span-->
              <div class="span9">
                  <div class="row-fluid">
                      <header id="overview">
  
                          </div>
                   <?php echo $Didyoumean; ?>	<br>
		     Total number found:<?php echo $NumFound; ?> <br>   
                   Looking at Items:  <?php echo $StartPosition-1; ?> and <?php echo $FinalPosition; ?> <br>


   	<form name="nextprevious" id="myformmore" action="./results.php" method='get'>

         <input type="hidden" name="searchterms" size='2' value="<?php echo $keyword ?>" />
         <input type="hidden" name="cat2" size='2' value="<?php echo $Cat2 ?>" />
         <input type="hidden" name="cat3" size='2' value="<?php echo $Cat3 ?>" />
         <input type="hidden" name="cat4" size='2' value="<?php echo $Cat4 ?>" />
          <input type="hidden" name="minprice" size='1' value="<?php echo $_GET['minprice']; ?>" /> <br>
         <input type="hidden" name="maxprice" size='1' value="<?php echo $_GET['maxprice']; ?>" /> <br>
	 <select style="visibility:hidden;" name="sort"  >
		<option value="SORT_DEFAULT" <?php if($_REQUEST['sort']=='SORT_DEFAULT') echo "selected='selected'";?>> Relevant</option>		
		<option value="SORT_ASC"  <?php if($_REQUEST['sort']=='SORT_ASC') echo "selected='selected'";?>>  Price Ascending</option>
		<option value="SORT_DESC" <?php if($_REQUEST['sort']=='SORT_DESC') echo "selected='selected'";?>  > Price Descending</option>

		</select>
         <button type="submit" name="Previous" value="<?php echo $StartPosition ?>">Previous</button>
	 <button type="submit" name="Next" value="<?php echo $StartPosition ?>">Next</button>
        </form>








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
    <script src="scripts/js/jquery.js"></script>
    <script src="scripts/js/bootstrap-transition.js"></script>
    <script src="scripts/js/bootstrap-alert.js"></script>
    <script src="scripts/js/bootstrap-dropdown.js"></script>
    <script src="scripts/js/bootstrap-tab.js"></script>
    <script src="scripts/js/bootstrap-button.js"></script>
    <script src="scripts/js/bootstrap-carousel.js"></script>
    <script>
       $(document).ready(function(){
        $('.carousel').carousel();
       });
    </script>















</body>

</html>
