<?php
defined('BASEPATH') OR exit('No direct script access allowed');
isset($_SESSION['isuserloggedin']) OR exit('please login');
$this->load->helper('url');
?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style.css">	<meta charset="utf-8">
	<title>edit book</title>

	<script type="text/javascript">
	   <!--
	      // Form validation code will come here.
	      function validateForm()
	      {

	         if( document.forms["editbook"]["book_title"].value == "" )
	         {
	            alert( "Please provide booktitle!" );
	            return false;
	         }


					if( document.forms["editbook"]["isbn"].value == "" )
				 {
						alert( "Please provide isbn!" );
						return false;
				 }
				 if( document.forms["editbook"]["pubilsheddate"].value == "" )
			  {
			 		alert( "Please provide publish date!" );
			 		return false;
			  }

	      }


	   //-->
	</script>
</head>
<body>
	<div><h1>edit Book</h1></div>
	<form name="editbook" action="<?php echo base_url(); ?>index.php/library/editbookresults" onsubmit="return validateForm()" method="post">
	 isbn:<input type="text" name="isbn"pattern="[0-9]+"title="no letters allowed" value="<?php echo $books->isbn ?>"><br>
	 booktitle: <input type="text" name="book_title" pattern="[A=Za-z\s]{1,15}"title="no numbers allowed"  value="<?php echo $books->book_title ?>"><br>
	 numberofpages: <input type="text" name="numberofpages"  value="<?php echo $books->numberofpages ?>"><br>
	 dateofpublish: <input type="date" name="pubilsheddate"  value="<?php echo $books->pubilsheddate ?>"><br>

	<?php

		 echo '<br><br> authors <br>';
     foreach ($authorslist as $author)
    {
      $isthere = 0;
      foreach($books_has_authour as $selected)
      {
        if($author->idauthor == $selected->authour_id)
        {
          $isthere = 1;
          break;
        }
      }
      if($isthere == 1)
      {
        echo '<input checked type="checkbox" name="author[]" value="'.$author->idauthor.'"> '.$author->name.'<br>';
      }
      else
      {
        echo '<input type="checkbox" name="author[]" value="'.$author->idauthor.'"> '.$author->name.'<br>';
      }
    }

		 echo '<br><br> genre <br>';
     foreach ($genrelist as $genre)
             {
               $isthere = 0;
               foreach($books_has_genre as $selected)
               {
                 if($genre->idgenre == $selected->genre_id)
                 {
                   $isthere = 1;
                   break;
                 }
               }
               if($isthere == 1)
               {
                 echo '<input checked type="checkbox" name="genre[]" value="'.$genre->idgenre.'"> '.$genre->genrename.'<br>';
               }
               else
               {
                 echo '<input type="checkbox" name="genre[]" value="'.$genre->idgenre.'"> '.$genre->genrename.'<br>';
               }
             }
		 echo '<br><br> type <br>';
     foreach ($formatlist as $type)
        {
          $isthere = 0;
          foreach($books_has_type as $selected)
          {
            if($type->idtype == $selected->type_id)
            {
              $isthere = 1;
              break;
            }
          }
          if($isthere == 1)
          {
            echo '<input checked type="checkbox" name="type[]" value="'.$type->idtype.'"> '.$type->typename.'<br>';
          }
          else
          {
            echo '<input type="checkbox" name="type[]" value="'.$type->idtype.'"> '.$type->typename.'<br>';
          }
        }
		  echo' <input type="hidden" name="id" value="'.$books->id.'">
       <input type="submit" value="Submit">
		  </form>';
	?>






</body>
</html>
