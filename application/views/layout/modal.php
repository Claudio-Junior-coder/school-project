<form action="<?php echo base_url('in/classes/store');?>" method="POST">
    <div class="modal" tabindex="-1" role="dialog" id="modal-student-in-classes">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Enturmar Aluno</h5>
            <button type="button" class="close close-modal-student-in-classes" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          
                  <div class="mb-3 form-group">
                      <label for="aluno" class="form-label">Buscar Aluno</label>
                      <input type="text" class="form-control" id="searchAluno" placeholder="Digite as 3 primeiras letras do nome para buscar um aluno" required>
                      <div id="alunoList">
                          <!-- Aqui serão exibidos os resultados da busca -->
                      </div>
                  </div>
                  <div class="mb-3 form-group">
                      <label for="classe" class="form-label">Selecione a Turma</label>
                      <select class="form-control" id="classe" name="class_id">
                        
                      </select>
                  </div>
                <input type="hidden" name="student_id" id="studentId">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Concluir</button>
            <button type="button" class="btn btn-secondary close-modal-student-in-classes" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>
</form>


<script type="text/javascript" src="<?php echo base_url('assets/js/modal.js'); ?>"></script>
