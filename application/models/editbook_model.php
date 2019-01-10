<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class editbook_model extends CI_Model {
  function __construct() {
    parent::__construct();
  }

  function getbookbyID($id)
    {
      $sql = "select * from books where id=$id";
      $query = $this->db->query($sql);
      return $query->result();
    }


    function getauthorbyID($id)
      {
        $sql = "select * from books_has_authour where id=$id";
          $query = $this->db->query($sql);
            $results = array();
            foreach ($query->result() as $result) {
              $results[] = $result;
            }
            return $results;
          }
          function gettypebyID($id)
            {
              $sql = "select * from books_has_type where id=$id";
                $query = $this->db->query($sql);
                  $results = array();
                  foreach ($query->result() as $result) {
                    $results[] = $result;
                  }
                  return $results;
                }
                function getgenrebyID($id)
                  {
                    $sql = "select * from books_has_genre where id=$id";
                      $query = $this->db->query($sql);
                        $results = array();
                        foreach ($query->result() as $result) {
                          $results[] = $result;
                        }
                        return $results;
                      }

                      function updatebook() {
                        $id = $this->input->post("id");
                        $isbn = $this->input->post("isbn");
                        $book_title = $this->input->post("book_title");
                        $numberofpages = $this->input->post("numberofpages");
                        $pubilsheddate = $this->input->post("pubilsheddate");



                        $sql = "update books
                        set isbn=$isbn,
                        book_title='$book_title',
                        pubilsheddate='$pubilsheddate',
                        numberofpages=$numberofpages
                        where id=$id";
                        $query = $this->db->query($sql);





                        $sql = "delete from books_has_authour where id = $id";
                        $query = $this->db->query($sql);

                        $authors = $this->input->post("author");
                        if(!isset($authors))
                        {
                          return 1;
                        }
                        foreach($authors as $author)
                        {

                          $data = array(
                                  'id' => $id,
                                  'authour_id' => $author,
                          );
                          $this->db->insert('books_has_authour', $data);
                        }

                        $sql = "delete from books_has_genre where id = $id";
                        $query = $this->db->query($sql);

                        $genres = $this->input->post("genre");
                        if(!isset($genres))
                        {
                          return 1;
                        }
                        foreach($genres as $genre)
                        {
                          $data = array(
                                  'id' => $id,
                                  'genre_id' => $genre,
                          );
                          $this->db->insert('books_has_genre', $data);
                        }


                        $sql = "delete from books_has_type where id = $id";
                        $query = $this->db->query($sql);

                        $types = $this->input->post("type");
                        if(!isset($types))
                        {
                          return 1;
                        }
                        foreach($types as $type)
                        {
                          $data = array(
                                  'id' => $id,
                                  'type_id' => $type,
                          );
                          $this->db->insert('books_has_type', $data);
                        }


                        return 1;
                      }

}
