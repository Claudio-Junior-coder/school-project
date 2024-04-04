<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);
require_once $rootDir . '/application/libraries/fpdf/fpdf.php';

class Report extends FPDF {


    public function __construct() {

        parent::__construct(); 
     }

    /*
        Report
    */

    // Page header
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Move to the right
        $this->Cell(60);
        // Title
        $this->Cell(70,10,'School Project',1,0,'C');
        // Line break
        $this->Ln(20);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-60);
        
        $this->Image(base_url('/assets/images/footer.jpg'),45, null, 120, 40);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

}
?>