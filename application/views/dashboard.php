<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');
$this->load->helper('url');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to my  libarary</title>


</head>
<body>

<div><h1></h1></div>
<div><h2>Select An a choice </h2></div>
<a href="<?php echo base_url();?>index.php/library/add_book">add books</a></br>
<a href="<?php echo base_url();?>index.php/library/search_books">search </a></br>
<a href="<?php echo base_url();?>index.php/library/showallbooks">view all books </a></br>
<a href="<?php echo base_url();?>index.php/library/add_genere">add genre</a></br>
<a href="<?php echo base_url();?>index.php/library/add_author">add author</a></br>

<a href="<?php echo base_url();?>index.php/library">logout</a>

</body>
</html>
