<?php
require_once 'bootstrap.php';  

$categoria = new Categoria($_GET);

if(!empty($_GET['categoria']) && !isset($_GET['id'])) 
{

$id = $categoria->create();

} elseif (!empty($_GET['id'])) {

$updated = $categoria->updateItem();

$item = $categoria->findById();

}


$user = new Users();
if($user->isAnonymous()) {
    header('Location: /login.php');
}
?>
<html>


<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<title>Nueva Categoria</title>
</head>

<body>

<?php if(!empty($updated)): ?>
    <h3>Guardado!</h3>
<?php endif; ?>
<?php include("Funciones/menu.php")?>
<br>
<br>
<br>
<h2>Nueva Categoria<h2>
<form action="FormularioCategorias.php" method="get">
<?php if(isset($item)): ?>
        <input type="hidden" name="id" value="<?php echo $item->Id_categoria?>">
    <?php endif; ?>
  <div class="form-group col-md-4 col-sm-4">

    <label for="descripcion_Prod">Categoria del producto</label>
    <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Categoria" autocomplete="off" value=""<?php echo isset($item) ? $item->categoria : null ?>">

  </div>

<div class="form-group col-md-4 col-sm-4">
<input type="submit" class="btn btn-outline-success" value="Guardar">


</div>
</form>

</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>

