<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class genre extends CI_Model {


  function __construct() {
    parent::__construct();
  }
  function allgenere(){
     $sql = "select * genre";
     $query = $this->db->query($sql);
     $results = array();
     foreach ($query->result() as $result) {
       $results[] = $result;
     }
     return $results;
   }

   function add_genre() {
       $data = array(
             'idgenre' => $this->input->post("idgenre"),
             'genrename' => $this->input->post("genrename"),

     );

     $this->db->insert('genre', $data);
     return 1;
     }




}
?>
