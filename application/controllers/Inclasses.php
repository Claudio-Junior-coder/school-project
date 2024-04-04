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
        $this->load->model('Classes_model', 'classes');
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
        Report
    */

    // Page header
    function Header()
    {
        // Logo
        $this->Image(base_url('/assets/images/footer.jpg'),10,6,30);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(80);
        // Title
        $this->Cell(30,10,'Title',1,0,'C');
        // Line break
        $this->Ln(20);
    }

    // Page footer
    function Footer()
    {
        $this->Image(base_url('/assets/images/footer.jpg'),10,6,30);
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

    /* Generate report */
    public function report()
    {
        $allClasses = $this->classes->get_all();
        $data = $this->prepareData($allClasses);
        $rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
        require_once $rootDir . '/application/controllers/Report.php';
        $pdf = new Report();
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);
        foreach($data as $item) {
         
            $pdf->Cell(190,7,'Turma: '. $item['class']->serie . ' | ' . $item['class']->shift . ' | ' . $item['class']->room, 1);
            $pdf->Ln();
         
            if(isset($item['students'])) {
                foreach($item['students'] as $row)
                {
                    $pdf->Cell(190,6,$row->name, 1);
                    $pdf->Ln();
                }
            } else {
                $pdf->Cell(190,6,'Nenhum aluno nesta turma.', 1);
                $pdf->Ln();
            }           
            
            $pdf->Ln();
        }
        $pdf->Output();
    
    }

    public function prepareData($allClasses) 
    {
        $data = [];
        $this->load->model('Student_model', 'students');
        foreach($allClasses as $k => $currentClass) {
            $classes = $this->inclasses->getAllByClassId($currentClass->id);
            $data[$k]['class'] = $currentClass;
            $data[$k]['students_in_class'] = $classes ? count($classes) : 0;
            foreach($classes as $class) {                    
                $data[$k]['students'][] = $this->students->get($class->student_id);
            }
        }

        return $data;
    }

    /*
        Delete a student from class
    */
    public function delete($id)
    {
        $item = $this->inclasses->deleteByStudentId($id);
        if($item) {
            $this->session->set_flashdata('successUnclass', "Aluno desenturmado com sucesso!");
        } else {
            $this->session->set_flashdata('errorsUnclass', 'Erro ao desenturmar aluno.');
        }
        redirect($this->agent->referrer());
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