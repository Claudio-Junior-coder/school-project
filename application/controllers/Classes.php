<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends CI_Controller {

    public function __construct() {

        parent::__construct(); 
        $this->load->model('Auth_model', 'auth');
        $this->auth->logged();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Classes_model', 'classes');
   
    }
 
     /*
        Display all records in page
    */
    public function index()
    {
        $data['classes'] = $this->classes->get_all();
        $data['title'] = "Gerenciador de Turmas";
        $this->load->view('layout/header');       
        $this->load->view('classes/index',$data);
        $this->load->view('layout/footer');
    }

    /* get all record */
    public function get() {

        if ($this->input->is_ajax_request()) {

            $classes = $this->classes->get_all();
        
            echo json_encode($classes);

        } else {
            show_404(); 
        }
    }

    /*
        Display a record
    */
    public function show($id)
    {
        $data['classe'] = $this->classes->get($id);
        $data['title'] = "Exibindo Turma";

        $this->load->model('Student_in_class_model', 'inclasses');
        $classes = $this->inclasses->getAllByClassId($id);
        $data['students_in_class'] = $classes ? count($classes) : 0;
        foreach($classes as $class) {
            $this->load->model('Student_model', 'students');
            $data['students'][] = $this->students->get($class->student_id);
        }

        $this->load->view('layout/header');
        $this->load->view('classes/show', $data);
        $this->load->view('layout/footer'); 
    }

    /*
        Create a record page
    */
    public function create()
    {
        $data['title'] = "Criar Turma";
        $this->load->view('layout/header');
        $this->load->view('classes/create',$data);
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
            redirect(base_url('classes/create'));

            return false;
        }
        
        $this->classes->store();
        $this->session->set_flashdata('success', "Criado com Sucesso!");
        redirect(base_url('classes'));
    }

    /*
        Edit a record page
    */
    public function edit($id)
    {
        $data['classe'] = $this->classes->get($id);
        $data['title'] = "Editar Turma";
        $this->load->view('layout/header');
        $this->load->view('classes/edit', $data);
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
            redirect(base_url('classes/edit/' . $id));
            return false;
        }

        $this->classes->update($id);
        $this->session->set_flashdata('success', "Atualizado com Sucesso!");
        redirect(base_url('classes'));
    
    }
    
    /*
        Delete a record
    */
    public function delete($id)
    {
        $item = $this->classes->delete($id);

        if($item) {
            $this->load->model('Student_in_class_model', 'inclasses');
            $this->inclasses->deleteAllByClassId($id);
            $this->session->set_flashdata('success', "Excluído com sucesso!");
        } else {
            $this->session->set_flashdata('errors', 'Erro ao excluir.');
        }
        redirect(base_url('classes'));
    }

    /* 
        Validate From
    */
    public function validateForm () 
    {
        $this->form_validation->set_rules('serie', 'Série', 'required');
        $this->form_validation->set_rules('shift', 'Turno', 'required');
        $this->form_validation->set_rules('room', 'Sala', 'required');
        $this->form_validation->set_rules('vacancies', 'Vagas', 'required');
    }
}

?>