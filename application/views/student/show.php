<h2 class="text-center mt-5 mb-3"><?php echo $title;?></h2>
<div class="card">
    <div class="card-header">
        <a class="btn btn-outline-info float-right" href="<?php echo base_url('student/');?>"> 
            Ver Todos Alunos
        </a>
    </div>
    <div class="card-body">
       <b class="text-muted">Nome:</b>
       <p><?php echo $student->name;?></p>
       <b class="text-muted">Nascimento:</b>
       <p><?php echo $student->date;?></p>
       <b class="text-muted">Endereço:</b>
       <p><?php echo $student->address;?></p>
       <b class="text-muted">Responsável:</b>
       <p><?php echo $student->responsible;?></p>
       <b class="text-muted">Contato:</b>
       <p><?php echo $student->contact;?></p>
       <b class="text-muted">Enturmado:</b>
       <p>
        <?php if(!isset($class['class'])) {
            echo $class['inclass'];
        } else {
            echo $class['class']->serie . ' | ' . $class['class']->room . ' | ' . $class['class']->shift;
        } ?>
       </p>
    </div>
</div>