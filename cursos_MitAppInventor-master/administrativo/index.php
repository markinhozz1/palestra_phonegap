<!DOCTYPE html>
<html lang="pt-br">
<link rel="stylesheet" href="view/assets/css/bootstrap.min.css">
<script src="view/assets/js/jquery.min.js"></script>
<script src="view/assets/js/bootstrap.min.js"></script>
<head>
  <meta charset="UTF-8">
  <title>Login</title>
</head>
<body>
  <div class="container">
    <div class="row" style="margin-top: 25px;">
      <h4>Área Restrita</h4>
    </div>


    <hr>
    <form class="col-4 offset-2" id="login_form">
      <div class="form-group">
        <label for="">Usuário</label>
        <input type="text" name="login" class="form-control" required autofocus>
      </div>
      <div class="form-group">
        <label for="">Senha</label>
        <input type="password" name="senha" class="form-control" required>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-info">Logar</button>
      </div>
    </form>
  </div>

  <script type="text/javascript">
    $(function(){
      $("#login_form").submit(function(ev){
        ev.preventDefault();
        var formData = $(this).serializeArray();
        console.log(formData);
      });
    });
  </script>
</body>

</html>
