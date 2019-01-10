<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class add_product extends CI_Model
{
function __construct(){
    parent::__construct();

}
  function addbooks() {
        $data = array(
          'isbn' => $this->input->post("isbn"),
              'book_title' => $this->input->post("book_title"),
              'numberofpages' => $this->input->post("numberofpages"),
              'pubilsheddate' => $this->input->post("pubilsheddate"),
      );

      $this->db->insert('books', $data);
        $lastid =$this->db->insert_id();

      $type = $this->input->post("type");
    foreach($type as $type)
{
      $data = array(
              'id' => $lastid,
              'type_id' => $type,
      );
      $this->db->insert('books_has_type', $data);
    }

    $authors = $this->input->post("author");
  foreach($authors as $author)
  {
    $data = array(
            'id' => $lastid,
            'authour_id' => $author,
    );
    $this->db->insert('books_has_authour', $data);
  }
  $genres = $this->input->post("genre");
  foreach($genres as $genre)
  {
  $data = array(
          'id' => $lastid,
          'genre_id' => $genre,
  );
  $this->db->insert('books_has_genre', $data);
  }
}

  function gettype() {
      $sql = "select * from type";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }
    function getauthors() {
      $sql = "select * from authour";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }
    function getgenres() {
      $sql = "select * from genre";
      $query = $this->db->query($sql);
      $results = array();
      foreach ($query->result() as $result) {
        $results[] = $result;
      }
      return $results;
    }

    function delete($id) {
  $sql = "delete from books where id = $id";
$query = $this->db->query($sql);
  return 1;
  }

  }
