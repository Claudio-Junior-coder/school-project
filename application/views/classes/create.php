<h2 class="text-center mt-5 mb-3"><?php echo $title; ?></h2>
<div class="card">
    <div class="card-header">
        <a class="btn btn-outline-info float-right" href="<?php echo base_url('classes');?>"> 
            Ver Todas Turmas
        </a>
    </div>
    <div class="card-body">
        <?php if ($this->session->flashdata('errors')) {?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('errors'); ?>
            </div>
        <?php } ?>
        <form action="<?php echo base_url('classes/store');?>" method="POST">
            <div class="form-group">
                <label for="serie">Série</label>
                <input type="text" class="form-control" id="serie" name="serie">
            </div>
            <div class="form-group">
                <label for="shift">Turma</label>
                <input type="text" class="form-control" id="shift" name="shift">
            </div>
            <div class="form-group">
                <label for="room">Sala</label>
                <input type="text" class="form-control" id="room" name="room">
            </div>
            <div class="form-group">
                <label for="vacancies">Vagas</label>
                <input type="number" class="form-control" id="vacancies" name="vacancies">
            </div>
            <button type="submit" class="btn btn-outline-primary">Salvar</button>
        </form>
       
    </div>
</div>