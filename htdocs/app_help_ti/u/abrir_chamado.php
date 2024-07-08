<?php
  require_once("../controllers/validador_acesso.php");
?>

      <?php require_once("../partials/navegacao.php");
      ?>

      <div class="container">    
        <div class="row">

          <div class="card-abrir-chamado">
            <div class="card">
              <div class="card-header">
                Abertura de chamado
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    
                    <form method="POST" action="../controllers/registra_chamado.php">
                      <div class="form-group">
                        <label>Título</label>
                        <input name="titulo" type="text" class="form-control" placeholder="Título" required>
                      </div>
                      
                      <div class="form-group">
                        <label>Categoria</label>
                        <select name="categoria" class="form-control">
                          <option>Criação Usuário</option>
                          <option>Impressora</option>
                          <option>Hardware</option>
                          <option>Software</option>
                          <option>Rede</option>
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label>Descrição</label>
                        <textarea name="descricao" class="form-control" rows="3" required></textarea>
                      </div>

                      <div class="row mt-5">
                        <div class="col-6">
                          <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                        </div>

                        <div class="col-6">
                          <button class="btn btn-lg btn-info btn-block" type="submit">Abrir</button>
                        </div>
                      </div>
                    </form>

                  <div id="status" class=""></div>

                  <?php
                    if(isset($_GET['status']) && $_GET['status'] == 'sucesso'){
                  ?>
                  <script>
                      let sucesso = "Chamado aberto com sucesso!"
                      document.getElementById("status").innerHTML = 
                      `${sucesso}`
                      document.getElementById("status").classList = 'p-3 text-center bg-success text-white m-4'
                  </script>
                  <?php
                    }
                  ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>

      <?php require_once("../partials/rodape.php");
      ?>
