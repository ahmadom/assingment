<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>Books</title>


</head>
<body>

<div><h1>All books</h1></div>
<div class="divTable">
<div class="divTableHeading">
<div class="divTableRow">
<div class="divTableHead">isbn</div>
<div class="divTableHead">book_title</div>
<div class="divTableHead">pubilsheddate</div>
<div class="divTableHead">Numberofpages</div>
<div class="divTableHead">authors</div>
<div class="divTableHead">genre</div>
<div class="divTableHead">type</div>
<div class="divTableHead">Delete</div>
<div class="divTableHead">Delete</div>



</div>
</div>
<div class="divTableBody">
      <?php



			  			foreach ($books as $book) {
			  				echo '<div class="divTableRow">';
								echo '<div class="divTableCell">'.$book->isbn.'</div>';
			  				echo '<div class="divTableCell">'.$book->book_title.'</div>';
		            echo '<div class="divTableCell">'.$book->pubilsheddate.'</div>';
		            echo '<div class="divTableCell">'.$book->numberofpages.'</div>';
								echo '<div class="divTableCell">'.$book->name.'</div>';
								echo '<div class="divTableCell">'.$book->genrename.'</div>';
								echo '<div class="divTableCell">'.$book->typename.'</div>';
								echo '<div class="divTableCell"><a href="'. base_url().'index.php/library/editbook/'.$book->id.'">Edit</a></div>';
								echo '<div class="divTableCell"><a href="'. base_url().'index.php/library/deletebook/'.$book->id.'">Delete</a></div>';

echo '</div>';
}
			?>
		</div>
</div>

</body>
</html>
