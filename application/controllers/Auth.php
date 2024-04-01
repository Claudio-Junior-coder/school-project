<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
 
   public function __construct() 
   {
      parent::__construct();  
      $this->load->model('Auth_model', 'auth');
   }
 
   /*
      Display all records in page
   */
  public function index()
  {

    $data['title'] = "Login";
    $this->load->view('layout/header');       
    $this->load->view('auth/login',$data);
    $this->load->view('layout/footer');

  } 

  /* Do authentication of user */
  public function login () 
  {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('email', 'E-mail', 'required');
      $this->form_validation->set_rules('password', 'Senha', 'required');

      if ($this->form_validation->run() == FALSE) {
         $this->session->set_flashdata('errors', 'Dados inválidos, tente novamente.');
         redirect('/auth');

      } else {

         $query = $this->auth->validate();
         if ($query) { 
            $data = array(
                  'data' => $query,
                  'logged' => true
            );
            $this->session->set_userdata($data);
            redirect('/student');
         } else {            
            $this->session->set_flashdata('errors', 'Usuário não encontrado!');
            redirect('/auth');
         }
         
      }
  }

  public function logout () 
  {
      $this->auth->logout();
  }
 
}