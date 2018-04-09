<?php
session_start();
if(!isset($_SESSION['nivel']) || $_SESSION['nivel'] != 1){
  header('Location: ../index.php');
}
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <script src="assets/js/jquery.min.js" charset="utf-8"></script>
  <script src="assets/js/bootstrap.min.js" charset="utf-8"></script>
  <title>Admin</title>
</head>
<body>

  <div class="container">
    <div class="card card-header">
      <?php
        var_dump($_SESSION);
       ?>
    </div>
    <hr>
    <a href="../logout.php">Logout</a>
    <hr>
    <ul>
      <li>manter cursos</li>
      <li>manter usuários</li>
    </ul>

  </div>

</body>
</html>
