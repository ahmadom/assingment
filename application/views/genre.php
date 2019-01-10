<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');

$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>library</title>

	<script type="text/javascript">
	   <!--
	      // Form validation code will come here.
	      function validateForm()
	      {

	         if( document.forms["addgenre"]["name"].value == "" )
	         {
	            alert( "Please provide genre !" );
	            return false;
	         }



	      }
	   //-->
	</script>
</head>
<body>
	<div><h1>add genre</h1></div>

  <?php
	if(isset($result))
	{
		echo '<p  style="font-size: 2vw;" class="m-3">genre added successfully</p>';

	}
	else {
		echo '<form name="add" action="'. base_url().'index.php/library/add_genere"onsubmit="return validateForm()" method="post">

		 genre name:<input type="text" name="genrename"><br><br>';

     echo '<input type="submit" value="add" >
    		  </form>';

	}
	?>




</body>
</html>
