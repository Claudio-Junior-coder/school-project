<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inclasses extends CI_Controller {

    public function __construct() {

        parent::__construct(); 
        $this->load->model('Auth_model', 'auth');
        $this->auth->logged();
        $this->load->library('form_validation');
        $this->load->library('user_agent');
        $this->load->model('Student_in_class_model', 'inclasses');
   
     }

     /*
        Save the student in class
    */
    public function store()
    {
        $this->validateForm();
    
        if (!$this->form_validation->run())
        {
            $this->session->set_flashdata('inclassError', 'Preencha todos os campos.');
            redirect($this->agent->referrer());
            return false;
        }
        

        $studentId = $this->input->post('student_id');
        $classId = $this->input->post('class_id');

        $alreadyExistsStudent = $this->inclasses->getByStudentId($studentId);

        $this->load->model('Classes_model', 'classes');
        $classVacancies = $this->classes->getByClassIdVacancies($classId);
        $studentsInClass = $this->inclasses->getByClassId($classId);

        if($alreadyExistsStudent) {
            $this->session->set_flashdata('inclassError', 'Este aluno já pertence à uma turma.');
            redirect($this->agent->referrer());
            return false;
        }

        if($classVacancies) {

            if($studentsInClass->count >= $classVacancies->vacancies) {
                $this->session->set_flashdata('inclassError', 'Não tem mais vagas nessa turma.');
                redirect($this->agent->referrer());
                return false;
            }

            $this->inclasses->store();
            $this->session->set_flashdata('inclassSuccess', "Aluno enturmado com sucesso!");
            redirect($this->agent->referrer());

        }
    
    }

    /* 
        Validate From
    */
    public function validateForm () 
    {
        $this->form_validation->set_rules('student_id', 'Aluno', 'required');
        $this->form_validation->set_rules('class_id', 'Turno', 'required');
    }
}

?>