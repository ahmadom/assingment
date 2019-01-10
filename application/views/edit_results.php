<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');
$this->load->helper('url');

?><!DOCTYPE html>
<html lang="en">
<head>
  <title>library</title>

</head>
<body>
  <div><h1>Book updated</h1></div>
</body>
</html>
