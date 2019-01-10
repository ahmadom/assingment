<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class library extends CI_Controller {

public  function __construct() {
    parent::__construct();

    $this->load->model('item_model');
    $this->load->model('genre');
    $this->load->model('author');
    $this->load->model('add_product');
    $this->load->model('editbook_model');
    $this->load->helper('url');

  }
  function index()
  {
    $this->load->view('homepage');
  }

function dashboard()
{
  $this->load->view('dashboard');
}
function loginrequest()
{
  		//call academy_model.login(username,password)
  		//pass the values from the form via post
  		$result = $this->item_model->login($this->input->post("username"),$this->input->post("password"));
  		//if the result is not zero (if there is a record with the inputted username and password)
  		if($result!=0)
  		{
  			//create session, to make sure a user can't access any page without logging in
  			$this->session->set_userdata('isuserloggedin', 'true');
  			//store the user role for future use (redirecting to different parts of the app)

  			redirect('library/dashboard');
  		}
  		else
  		{
  			//display an error to the user
  			echo "wrong username or password";
  		}

  }


  public function showallbooks()
	{
		$all_books = $this->item_model->get_all_books();
    $data = array();
    $data['books'] = $all_books;
		$this->load->view('view_all_books',$data);
	}

  function search_books()
        	{
        		//if the form was submitted and the student name feild was posted
        		if($this->input->post("booktitle"))
        		{
        			// call student_model.searchStudentByName(studentName) to get search results
        			$result = $this->item_model->searchbooks($this->input->post("booktitle"));
        			//create an empty array called data
        			$data = array();
        			//add the results from the model which are stored in $result to data and give it key "student"
        			//we'll use this key to access the data in the view
        	    $data['books'] = $result;
        			//load view search_student_by_name.php and pass to it the array data
        			$this->load->view('search',$data);
        		}
        		else
        		{
        			//load view search_student_by_name.php and no data passed
        			$this->load->view('search');
        		}
        	}


       function add_genere()
                  {
                  if($this->input->post("idgenre") || $this->input->post("genrename"))
                  {
                    $result = $this->genre->add_genre();
                    $data = array();
                    $data['result'] = $result;
                    $this->load->view('genre',$data);
                  }
                  else
                    {
                      $this->load->view('genre');
                    }


                  }
                  function add_author()
                  {
                  if($this->input->post("idauthor") || $this->input->post("name"))
                  {
                    $result = $this->author->add_author();
                    $data = array();
                    $data['result'] = $result;
                    $this->load->view('author.php',$data);
                  }
                  else
                    {
                      $this->load->view('author.php');
                    }


                  }
                 function add_book(){
        $result = $this->add_product->getauthors();
        $data = array();
        $data['authorslist'] = $result;
        $result = $this->add_product->getgenres();
        $data['genrelist'] = $result;
        $result = $this->add_product->gettype();
        $data['formatlist'] = $result;

        $this->load->view('add_prooduct',$data);
      }
//
       function add_book_result()
        {
          if($this->input->post("isbn") ||$this->input->post("book_title") ||$this->input->post("id")
          || $this->input->post("numberofpages") || $this->input->post("pubilsheddate")
          || $this->input->post("type_id")|| $this->input->post("authour_id")
          || $this->input->post("genre_id"))
          {
            $result = $this->add_product->addbooks();
            $data = array();
            $data['result'] = $result;
            $this->load->view('addbookresults',$data);
          }

        }


  public function editbook($id)
{
  $result = $this->add_product->getauthors();
  $data = array();
  $data['authorslist'] = $result;
  $result = $this->add_product->getgenres();
  $data['genrelist'] = $result;
  $result = $this->add_product->gettype();
  $data['formatlist'] = $result;
  $result = $this->editbook_model->getbookbyID($id);
  $data['books'] = array_pop($result);
  $result = $this->editbook_model->getauthorbyID($id);
  $data['books_has_authour'] = $result;
  $result = $this->editbook_model->gettypebyID($id);
  $data['books_has_type'] = $result;
  $result = $this->editbook_model->getgenrebyID($id);
  $data['books_has_genre'] = $result;
  $this->load->view('editbook',$data);
}

public function editbookresults()
{
  if($this->input->post("isbn") || $this->input->post("book_title")
  || $this->input->post("numberofpages") || $this->input->post("pubilsheddate")
  || $this->input->post("authour_id")|| $this->input->post("genre_id")
  || $this->input->post("type_id")|| $this->input->post("id"))
  {
    $result = $this->editbook_model->updatebook();
    $data = array();
    $data['result'] = $result;
    $this->load->view('edit_results',$data);
  }
}

       function deletebook($id){
      $result = $this->add_product->delete($id);
      redirect('library/showallbooks');
      }
    }
