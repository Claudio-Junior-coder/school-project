<h2 class="text-center mt-5 mb-3"><?php echo $title;?></h2>
<div class="card">
    <div class="card-header">
        <h4 class="text-center mt-3 mb-3">Inciar sessão</h4>
    </div>
    <div class="card-body"> 
        <?php if ($this->session->flashdata('errors')) {?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('errors'); ?>
            </div>
        <?php } ?>
        <form action="<?php echo base_url('login/auth');?>" method="POST">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Insira seu e-mail" required />
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Insira sua senha" required />
            </div>
          
            <button type="submit" class="btn btn-outline-primary">Entrar</button>
        </form>
       
    </div>
</div>