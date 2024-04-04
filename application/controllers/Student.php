<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
 
   public function __construct() {
      parent::__construct(); 
      $this->load->model('Auth_model', 'auth');
      $this->auth->logged();
      $this->load->library('form_validation');
      $this->load->library('session');
      $this->load->model('Student_model', 'student');
 
   }
 
   /*
      Display all records in page
   */
  public function index()
  {
    $data['students'] = $this->student->get_all();
    $data['title'] = "Gerenciador de Alunos";
    $this->load->view('layout/header');       
    $this->load->view('student/index',$data);
    $this->load->view('layout/footer');
  }

  /* Search by a record */
  public function search() {

      if ($this->input->is_ajax_request()) {

          $search = $this->input->get('search');

          $students = $this->student->search($search);
         
          echo json_encode($students);

      } else {
          show_404(); 
      }
  }
 
  /*
 
    Display a record
  */
  public function show($id)
  {
    $data['student'] = $this->student->get($id);
    $data['title'] = "Exibindo Aluno";
    $data['class'] = $this->studentInClass($id);
    $this->load->view('layout/header');
    $this->load->view('student/show', $data);
    $this->load->view('layout/footer'); 
  }
 
  /*
    Create a record page
  */
  public function create()
  {
    $data['title'] = "Criar Aluno";
    $this->load->view('layout/header');
    $this->load->view('student/create',$data);
    $this->load->view('layout/footer');     
  }
 
  /*
    Save the submitted record
  */
  public function store()
  {
    $this->validateForm();
 
    if (!$this->form_validation->run())
    {
        $this->session->set_flashdata('errors', 'Preencha todos os campos.');
        redirect(base_url('student/create'));
        return false;
    }
      $this->student->store();
      $this->session->set_flashdata('success', "Criado com Sucesso!");
      redirect(base_url('student'));
 
  }
 
  /*
    Edit a record page
  */
  public function edit($id)
  {
    $data['student'] = $this->student->get($id);
    $data['title'] = "Editar Aluno";
    $this->load->view('layout/header');
    $this->load->view('student/edit', $data);
    $this->load->view('layout/footer');     
  }
 
  /*
    Update the submitted record
  */
  public function update($id)
  {
    
    $this->validateForm();
 
    if (!$this->form_validation->run())
    {
        $this->session->set_flashdata('errors', 'Preencha todos os campos.');
        redirect(base_url('student/edit/' . $id));
        return false;
    }
    
    $this->student->update($id);
    $this->session->set_flashdata('success', "Atualizado com Sucesso!");
    redirect(base_url('student'));
 
  }
 
  /*
    Delete a record
  */
  public function delete($id)
  {
    $item = $this->student->delete($id);
    if($item) {
        $this->load->model('Student_in_class_model', 'inclasses');
        $this->inclasses->deleteByStudentId($id);
        $this->session->set_flashdata('success', "Excluído com sucesso!");
    } else {
        $this->session->set_flashdata('errors', 'Erro ao excluir.');
    }
    redirect(base_url('student'));
  }

  /* 
    Validate From
  */
  public function validateForm () 
  {
    $this->form_validation->set_rules('name', 'Nome', 'required');
    $this->form_validation->set_rules('date', 'Data de Nascimento', 'required');
    $this->form_validation->set_rules('address', 'Endereço', 'required');
    $this->form_validation->set_rules('responsible', 'Responsável', 'required');
    $this->form_validation->set_rules('contact', 'Contato', 'required');
  }
 
  /* Check if stundent is in class */
  public function studentInClass ($id) 
  {
    $this->load->model('Student_in_class_model', 'inclasses');
    $this->load->model('Classes_model', 'classes');

    $inClass = $this->inclasses->getByStudentId($id);

    $data = [];    
    $inClass ? $data['inclass'] = 'Sim' : $data['inclass'] = 'Não';

    if($inClass) {
      $data['class'] = $this->classes->get($inClass->class_id);
    }
    
    return $data;
  }
 
}