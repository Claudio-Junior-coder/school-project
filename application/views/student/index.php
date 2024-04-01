<h2 class="text-center mt-5 mb-3"><?php echo $title; ?></h2>
<div class="card">
    <div class="card-header">
        <a class="btn btn-outline-primary" href="<?php echo base_url('student/create/');?>"> 
            Criar Novo Aluno
        </a>
    </div>
    <div class="card-body">
        <?php if ($this->session->flashdata('success')) {?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php } ?>
 
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
                        class="btn btn-outline-success"
                        href="<?php echo base_url('student/edit/'.$student->id) ?>"> 
                        Editar
                    </a>
                    <a
                        class="btn btn-outline-danger"
                        href="<?php echo base_url('student/delete/'.$student->id) ?>"> 
                        Deletar
                    </a>
                </td>     
            </tr>
            <?php } ?>
        </table>
    </div>
</div>