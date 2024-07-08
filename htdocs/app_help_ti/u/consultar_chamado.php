<?php
  require_once("../controllers/validador_acesso.php");
?>

<?php

  $chamados = array();

  $arquivo = fopen('../../../app_help_ti/aberturas.txt', 'r');

  while(!feof($arquivo)){

    $registro = fgets($arquivo);

    $registro_detalhes = explode('#', $registro);

    if($_SESSION['perfil_id'] == 2){

      if($_SESSION['id_email'] != $registro_detalhes[0]){

        continue;

      } else {

        $chamados[] = $registro;

      }

    } else {

      $chamados[] = $registro;

    }

  }

  fclose($arquivo);

?>

    <?php require_once("../partials/navegacao.php");
    ?>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">

              <?php 
              
                foreach($chamados as $chamado) {

              ?>

              <?php
              
                $chamado_dados = explode("#", $chamado);

                if(count($chamado_dados) < 3){
                  continue;
                }

              ?>

                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?= $chamado_dados[1] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $chamado_dados[2] ?></h6>
                    <p class="card-text"><?= $chamado_dados[3] ?></p>

                  </div>
                </div>

              <?php } ?>

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <?php require_once("../partials/rodape.php");
    ?>