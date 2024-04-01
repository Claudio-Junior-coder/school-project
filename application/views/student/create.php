<h2 class="text-center mt-5 mb-3"><?php echo $title; ?></h2>
<div class="card">
    <div class="card-header">
        <a class="btn btn-outline-info float-right" href="<?php echo base_url('student');?>"> 
            Ver Todos Alunos
        </a>
    </div>
    <div class="card-body">
        <?php if ($this->session->flashdata('errors')) {?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('errors'); ?>
            </div>
        <?php } ?>
        <form action="<?php echo base_url('student/store');?>" method="POST">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="date">Data de Nascimento</label>
                <input type="date" class="form-control" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="address">Endereço</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="form-group">
                <label for="responsible">Responsável</label>
                <input type="text" class="form-control" id="responsible" name="responsible">
            </div>
            <div class="form-group">
                <label for="contact">Contato</label>
                <input type="text" class="form-control" id="contact" name="contact">
            </div>
            <button type="submit" class="btn btn-outline-primary">Salvar</button>
        </form>
       
    </div>
</div>