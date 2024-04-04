<!DOCTYPE html>
<html>
<head>
    <title>School Project</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
    <?php if (isset($this->session->userdata('data')->name)) {?>
        <div class="card">
            <div class="card-body d-flex justify-content-between"> 
                <div>
                    <?= $this->session->userdata('data')->name; ?>, se desejar fazer logout clique <a href="<?php echo base_url('logout');?>">aqui.</a>
                </div>
                <div>
                    <a
                        class="btn btn-outline-info"
                        href="<?php echo base_url('/student') ?>"> 
                        Alunos
                    </a>
                    <a
                        class="btn btn-outline-info"
                        href="<?php echo base_url('/classes') ?>"> 
                        Turmas
                    </a>
                    <a  id="student_in_classes"
                        class="btn btn-outline-info"
                        href="javascript:void(0);"> 
                        Enturmar
                    </a>
                    <a  id="generate-pdf"
                        class="btn btn-outline-info"
                        href="<?php echo base_url('/in/classes/report') ?>" target="_blank"> 
                        Baixar Relatório
                    </a>
                </div>
            </div>
        </div>
    <?php } ?>      
    <div class="mt-3 mb-3">
        <?php if ($this->session->flashdata('inclassError')) {?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('inclassError'); ?>
            </div>
        <?php } ?>
        
        <?php if ($this->session->flashdata('inclassSuccess')) {?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('inclassSuccess'); ?>
            </div>
        <?php } ?>
    </div>
    <?php $this->load->view('layout/modal.php');?>