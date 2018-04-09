<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <script src="assets/js/jquery.min.js" charset="utf-8"></script>
  <script src="assets/js/bootstrap.min.js" charset="utf-8"></script>
  <title>---</title>
</head>
<body>
  <div class="container">
    <div class="" id="resumo" style="margin-top: 50px;">
      <h4></h4>
      <hr>
      <div class="row">
        <div class="col-6">
          <p></p>
        </div>
        <div class="col-6">
          <img src="" alt="">
        </div>
      </div>



    </div>
  </div>



</body>
<script type="text/javascript">
$(function(){
  $.get('../../administrativo/model/recurso.php'+ window.location.search, function(data){
    $("#resumo").find('h4').html(data.nome);
    $("#resumo").find('p').html(data.resumo);
    if(data.img){
      $("#resumo").find('img').prop('src', 'img/'+data.img);
    }
  }, 'json');
});
</script>
</html>
