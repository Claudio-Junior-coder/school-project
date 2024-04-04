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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>


  $("#student_in_classes").click(function(){
    getClasses();
    $('#modal-student-in-classes').show();
  });

  $( "body" ).off( "click", ".close-modal-student-in-classes");
  $( "body" ).on( "click", ".close-modal-student-in-classes", function(){
    $('#modal-student-in-classes').hide();
  } );
  
  $( "body" ).off( "click", ".student-selected");
  $( "body" ).on( "click", ".student-selected", function(){
    $('#alunoList').empty();
    let studentName = $(this).text();
    let studentId = $(this).attr('id');
    $('#searchAluno').val(studentName);
    $('#studentId').val(studentId);
  });

    $(document).ready(function() {
        $('#searchAluno').on('input', function() {
            var searchTerm = $(this).val();
            if (searchTerm.length > 2) {
                searchAlunos(searchTerm);
            } else {
                $('#alunoList').empty();
            }
        });

        function searchAlunos(searchTerm) {
            $.ajax({
                url: '/student/search',
                method: 'GET',
                data: { search: searchTerm },
                dataType: 'json',
                success: function(response) {
                    renderAlunoList(response);
                },
                error: function(xhr, status, error) {
                    console.error('Erro ao buscar alunos:', error);
                }
            });
        }

        function renderAlunoList(alunos) {
            var $alunoListContainer = $('#alunoList');
            $alunoListContainer.empty();

            if (alunos.length === 0) {
                $alunoListContainer.append('<p>Nenhum aluno encontrado.</p>');
                return;
            }

            var $ul = $('<ul class="list-group"></ul>');
            $.each(alunos, function(index, aluno) {
                var $li = $('<li class="list-group-item student-selected" id="' + aluno.id + '" style="cursor: pointer">' + aluno.name + '</li>');
                $ul.append($li);
            });
            $alunoListContainer.append($ul);
        }
    });

    function getClasses() {
            $.ajax({
                url: '/classes/get',
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    renderClassesList(response);
                },
                error: function(xhr, status, error) {
                    console.error('Erro ao buscar turmas:', error);
                }
            });
        }

      function renderClassesList(classes) {
          var $classeListContainer = $('#classe');
          $classeListContainer.empty();

          if (classes.length === 0) {
              $classeListContainer.append('<option value="0" selected>Nenhuma turma encontrada.</option>');
              return;
          }


          $.each(classes, function(index, classe) {
              $classeListContainer.append('<option value="' + classe.id + '">' + classe.serie + ' | ' + classe.room + ' | ' + classe.shift + '</option>');
          });
          
      }
</script>