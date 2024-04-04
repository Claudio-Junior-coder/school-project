<h2 class="text-center mt-5 mb-3"><?php echo $title;?></h2>
<div class="card">
    <div class="card-header">
        <a class="btn btn-outline-info float-right" href="<?php echo base_url('classes/');?>"> 
            Ver Todas Turmas
        </a>
    </div>
    <div class="card-body">
        <?php if ($this->session->flashdata('successUnclass')) {?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('successUnclass'); ?>
            </div>
        <?php } ?>
        <?php if ($this->session->flashdata('errorsUnclass')) {?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('errorsUnclass'); ?>
            </div>
        <?php } ?>
       <b class="text-muted">Série:</b>
       <p><?php echo $classe->serie;?></p>
       <b class="text-muted">Turma:</b>
       <p><?php echo $classe->shift;?></p>
       <b class="text-muted">Sala:</b>
       <p><?php echo $classe->room;?></p>
       <b class="text-muted">Vagas:</b>
       <p>Total: <?php echo $classe->vacancies;?> | Ocupadas: <?php echo $students_in_class;?></p>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h4>Alunos nessa turma</h4>
    </div>
    <div class="card-body">        
        <?php if(isset($students)) { ?>            
            <table class="table table-bordered">
                <tr>
                    <th>Nome</th>
                    <th>Contato</th>
                    <th width="240px">Ações</th>
                </tr>
    
                <?php foreach ($students as $student) { ?>      
                <tr>
                    <td><?php echo $student->name; ?></td>
                    <td><?php echo $student->contact; ?></td>          
                    <td>
                        <a
                            class="btn btn-outline-info"
                            href="<?php echo base_url('student/show/'. $student->id) ?>"> 
                            Ver
                        </a>
                        <a
                            class="btn btn-outline-danger"
                            href="<?php echo base_url('in/classes/unclass/'.$student->id) ?>"> 
                            Desenturmar
                        </a>
                    </td>     
                </tr>
                <?php } ?>
            </table>
        <?php } else {
            echo '<p> Nenhum aluno está nessa turma.</p>';
        } ?>
    </div>
</div>
