<?php
require_once 'bootstrap.php';  

$contacto = new contacto($_GET);

if(!empty($_GET['email']) && !empty($_GET['mensaje']) && !isset($_GET['id'])) 
{

$id = $contacto->create();

} elseif (!empty($_GET['id'])) {

$updated = $contacto->updateItem();

$item = $contacto->findById();

}


$user = new Users();
if($user->isAnonymous()) {
   
}
?>
<html>


<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<title>Nuevo Mensaje</title>
</head>

<body>

<?php if(!empty($updated)): ?>
    <h3>Guardado!</h3>
<?php endif; ?>
<?php include("Funciones/menu.php")?>
<br>
<br>
<br>
<h2>Nueva mensaje<h2>
<form action="FormularioContactos.php" method="get">

  <div class="form-group col-md-4 col-sm-4">

    <label for="email">Correo</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="email" autocomplete="off" value="<?php echo isset($item) ? $item->email : null ?>">

  </div>
  <div class="form-group col-md-4 col-sm-4">

    <label for="mensaje">mensaje</label>
    <input type="text" class="form-control" id="mensaje" name="mensaje" placeholder="mensaje" autocomplete="off" value="<?php echo isset($item) ? $item->mensaje : null ?>">

  </div>


<div class="form-group col-md-4 col-sm-4">
<input type="submit" class="btn btn-outline-success" value="enviar">


</div>
</form>

</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
