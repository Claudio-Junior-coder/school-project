<h2 class="text-center mt-5 mb-3"><?php echo $title; ?></h2>
<div class="card">
    <div class="card-header">
        <a class="btn btn-outline-primary" href="<?php echo base_url('classes/create/');?>"> 
            Criar Nova Turma
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
                <th>Série</th>
                <th>Vagas</th>
                <th width="240px">Ações</th>
            </tr>
 
            <?php foreach ($classes as $classe) { ?>      
            <tr>
                <td><?php echo $classe->serie; ?></td>
                <td><?php echo $classe->vacancies; ?></td>          
                <td>
                    <a
                        class="btn btn-outline-info"
                        href="<?php echo base_url('classes/show/'. $classe->id) ?>"> 
                        Ver
                    </a>
                    <a
                        class="btn btn-outline-success"
                        href="<?php echo base_url('classes/edit/'.$classe->id) ?>"> 
                        Editar
                    </a>
                    <a
                        class="btn btn-outline-danger"
                        href="<?php echo base_url('classes/delete/'.$classe->id) ?>"> 
                        Deletar
                    </a>
                </td>     
            </tr>
            <?php } ?>
        </table>
    </div>
</div>