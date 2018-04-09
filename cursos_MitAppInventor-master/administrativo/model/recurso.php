<?php
header('Content-type: application/json');
if(isset($_GET['modulo']) && !empty($_GET['modulo'])){
  require_once 'Connection.class.php';
if(is_numeric($_GET['modulo'])){
  $resultado = Connection::prepare("SELECT * FROM curso WHERE id = ?");
  $resultado->execute(array($_GET['modulo']));
  echo json_encode($resultado->fetch(), JSON_PRETTY_PRINT);
}else{
  switch ($_GET['modulo']) {
    case 'curso':
      echo json_encode(Connection::query("SELECT * FROM curso ORDER BY nome ASC")->fetchAll(), JSON_PRETTY_PRINT);
      break;
  }
}

}

 ?>
