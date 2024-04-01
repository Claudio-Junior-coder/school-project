<!DOCTYPE html>
<html>
<head>
    <title>School Project</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/js/bootstrap.min.js" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <?php if (isset($this->session->userdata('data')->name)) {?>
        <div class="card">
            <div class="card-body"> 
                <?= $this->session->userdata('data')->name; ?>, se desejar fazer logout clique <a href="<?php echo base_url('logout');?>">aqui.</a>
            </div>
        </div>
    <?php } ?>      