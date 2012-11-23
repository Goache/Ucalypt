<?php include_once("./scripts/php/search.php");?>



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




    <div id="navigation">
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
 	<br> <br>

    <?php echo $faceteditems; ?>

    </div>



     <div id="results">
        <ul>
 	<?php echo $Didyoumean; ?>	

  


           <li>
      
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


<br>
<br>
<br>
<br> <br> <br>
		<ul>
                 Total number found:<?php echo $NumFound; ?> <br>   
                 Looking at Items:  <?php echo $StartPosition-1; ?> and <?php echo $FinalPosition; ?>
                 <?php echo $Out; ?>
            
                </ul>

     </div>


   



</body>

</html>
