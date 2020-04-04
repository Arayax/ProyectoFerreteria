<?php
require_once 'bootstrap.php';  

$Producto = new producto($_GET);


if(!empty($_GET['descripcion_Prod']) && !empty($_GET['Precio']) && !empty($_GET['cant_Producto']) && !empty($_GET['categoria_Id']) && !isset($_GET['id'])) {

  $id = $Producto->create();

} elseif (!empty($_GET['id'])) {

$updated = $Producto->updateItem();

$item = $Producto->findById();

}
$user = new Users();
if($user->isAnonymous()) {
    header('Location: /login.php');
}

?>
<html>


<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<title>Nuevo Producto</title>
</head>

<body>
<?php if(!empty($updated)): ?>
    <h3>Guardado!</h3>
<?php endif; ?>

<?php include("Funciones/menu.php")?>
<br>
<br>
<br>
<h2>Nuevo producto<h2>
<form action="FormularioProductos.php" method="get">

  <div class="form-group col-md-4 col-sm-4">

    <label for="DescripcionProd">Descripcion del Producto:</label>
    <input type="text" class="form-control" id="descripcion_Prod" name="descripcion_Prod" placeholder="Descripcion del Producto" autocomplete="off" value="<?php echo isset($item) ? $item->descripcion_Prod : null ?>" >

</div>
  <div class="form-group col-md-4 col-sm-4">
  
    <label for="Precio">Precio:</label>
    <input type="text" class="form-control" id="Precio" name="Precio" placeholder="Precio" autocomplete="off"  value="<?php echo isset($item) ? $item->Precio : null ?>"  >
   

  </div>

  <div class="form-group col-md-4 col-sm-4">
  
  <label for="cant_Producto">Stock:</label>
  <input type="text" class="form-control" id="cant_Producto" name="cant_Producto" placeholder="Stock" autocomplete="off"  value="<?php echo isset($item) ? $item->cant_Producto : null ?>">

</div>

<div class="form-group col-md-4 col-sm-4">
  
  <label for="categoria_Id">Categoria:</label>
  <input type="text" class="form-control" id="categoria_Id" name="categoria_Id" placeholder="Categoria del producto" autocomplete="off"   value="<?php echo isset($item) ? $item->categoria_Id : null ?>">

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

