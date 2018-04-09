<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
if(isset($_GET['url'])){

  $params = explode("/", $_GET['url']);
  $num_params = count($params);
  require_once 'Connection.class.php';

  if($params[0] == 'questao'){

    $table_ = $params[0];
    $params[0] = 'questoes';
    $table = $params[0];

  }else{

    $table = strtolower($params[0]).'s';//convenções...
    $table_ = strtolower($params[0]);//convenções...

  }


  function getAll(){
    global $table;
    try {
      $q = "SELECT * FROM ".$table;
      $resultado = Connection::query($q)->fetchAll();
      echo json_encode($resultado);
    } catch (\Exception $e) {
      echo '[]';
    }


  }

  if($num_params == 1){

    if($params[0] == 'questao_alternativas'){
      try {

        $lista_questoes = Connection::query("SELECT * FROM questoes")->fetchAll();
        $arr_questoes = [];

        foreach ($lista_questoes as $qu) {
          $qu->alternativas = Connection::query("SELECT * FROM alternativas WHERE id_questao = ". $qu->id_questao)->fetchAll();
          $arr_questoes[] = $qu;
        }

        echo json_encode($arr_questoes, JSON_PRETTY_PRINT);

      } catch (\Exception $e) {
        echo '[]';
      }

    }else if($params[0] == 'categorias'){
      $list = Connection::query("SELECT * FROM categorias")->fetchAll();
        echo json_encode($list, JSON_PRETTY_PRINT);
    }else{
        getAll();
    }


  }else if($num_params == 2){
    if(!empty($params[1])){
      if($params[0] == 'questao_alternativas'){

        try {

          $lista_questoes = Connection::query("SELECT * FROM questoes AS q
            INNER JOIN categorias AS c ON c.id_categoria = q.id_categoria
            WHERE c.nome_categoria = '".$params[1]."'")->fetchAll();

          $arr_questoes = [];

          foreach ($lista_questoes as $qu) {
            $qu->alternativas = Connection::query("SELECT * FROM alternativas WHERE id_questao = ". $qu->id_questao)->fetchAll();
            $arr_questoes[] = $qu;
          }

          echo json_encode($arr_questoes, JSON_PRETTY_PRINT);

        } catch (\Exception $e) {
          echo '[]';
        }

      }else{

        try {
          $q = "SELECT * FROM ".$table. " WHERE id_".$table_." = ".$params[1];
          $resultado = Connection::query($q)->fetchAll();
          echo json_encode($resultado);
        } catch (\Exception $e) {
          echo '{}';
        }

      }


    }else{
      getAll();
    }

  }

}
?>
