<?php
if(isset($_POST['usuario']) && isset($_POST['senha'])){
  if(!empty($_POST['usuario']) && !empty($_POST['senha'])){
    require 'Connection.class.php';
    $check = Connection::prepare("SELECT * FROM usuarios WHERE login = ? AND senha = ?");
    $check->bindParam(1, $_POST['usuario']);
    $check->bindParam(2, $_POST['senha']);
    $check->execute();
    if($check->rowCount()){
      $user = $check->fetch();
      session_start();
      $_SESSION['id'] = $user->id;
      $_SESSION['nivel'] = $user->nivel;
      $_SESSION['nome'] = $user->nome;
      echo '{"status":"autenticado", "nivel": "'.$user->nivel.'"}';
    }else{
      echo '{"status":"falha ao autenticar"}';
    }
  }
}

 ?>
