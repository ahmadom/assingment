<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class author extends CI_Model {


  function __construct() {
    parent::__construct();
  }
  function allauthor(){
     $sql = "select * authour";
     $query = $this->db->query($sql);
     $results = array();
     foreach ($query->result() as $result) {
       $results[] = $result;
     }
     return $results;
   }

   function add_author() {
       $data = array(
             'idauthor' => $this->input->post("idauthor"),
             'name' => $this->input->post("name"),

     );

     $this->db->insert('authour', $data);
     return 1;
     }




}
?>
