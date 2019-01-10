<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class item_model extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  function login($username, $password)
  {
    $sql = "select * from user where username ='$username' AND password='$password'";
    $query = $this->db->query($sql);
    if(count($query->result()) == 1)
    {
      return 1;
    }
    else {
      return 0;
    }
  }



  function get_all_books() {

   $sql = "SELECT * FROM (((((books INNER JOIN books_has_type ON books.id=books_has_type.id)
   INNER JOIN type ON books_has_type.type_id=type.idtype) INNER JOIN books_has_authour ON books.id=books_has_authour.id)
    INNER JOIN authour ON books_has_authour.authour_id=authour.idauthor)
   INNER JOIN books_has_genre ON books.id=books_has_genre.id)
    INNER JOIN genre ON books_has_genre.genre_id=genre.idgenre";
    $query = $this->db->query($sql);
    $results = array();
    foreach ($query->result() as $result) {
      $results[] = $result;
    }
    return $results;
  }




  function searchbooks($booktitle) {
      $sql = "SELECT * FROM books  where book_title LIKE '%{$booktitle}%'";
      $query = $this->db->query($sql);

      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;

    }
  }
    ?>
