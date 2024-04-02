<h2 class="text-center mt-5 mb-3"><?php echo $title;?></h2>
<div class="card">
    <div class="card-header">
        <a class="btn btn-outline-info float-right" href="<?php echo base_url('classes/');?>"> 
            Ver Todas Turmas
        </a>
    </div>
    <div class="card-body">
       <b class="text-muted">Série:</b>
       <p><?php echo $classe->serie;?></p>
       <b class="text-muted">Turma:</b>
       <p><?php echo $classe->shift;?></p>
       <b class="text-muted">Sala:</b>
       <p><?php echo $classe->room;?></p>
       <b class="text-muted">Vagas:</b>
       <p><?php echo $classe->vacancies;?></p>
    </div>
</div>