<?php
require_once 'bootstrap.php';

$producto = new producto();

if(!empty($_GET['id'])) {

  $producto = new producto($_REQUEST);
  $item = $producto->findById();
}

$user = new Users();
if($user->isAnonymous()) {
    header('Location: /IndexOnlyReadProductos.php');


  
}
if($user->login()) {

  header('Location: /indexProductos.php');


}
?>
<!DOCTYPE html>

<html lang="en">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Index - Productos</title>
</head>

<br>
<br>
<br>
<br>
<div class="form-group">
<a href="/FormularioProductos.php" class ="btn btn-large btn-success">Nuevo</a>

</div >
<body>
<?php include("Funciones/menu.php")?>

<table id="tablaproductos" class="table">
<thead>
<tr>
      <th scope="col">Nombre</th>
      <th scope="col">Precio</th>
      <th scope="col">Stock</th>
      <th scope="col">Categoria</th>
      <th scope="col">Accion</th>
     
    </tr>
</thead>
<?php foreach ($producto->findAll() as $item): ?>
<tr>
    <th><?php echo $item->descripcion_Prod?></th>
    <th><?php echo $item->Precio?></th>
    <th><?php echo $item->cant_Producto ?></th>
    <th><?php echo $item->categoria?></th>
    <th>
    <a href="deleteProd.php?id=<?php echo $item->Id_Producto?>" class ="btn btn-large btn-danger">Eliminar</a> 
    <a href="FormularioProductos.php?id=<?php echo $item->Id_Producto?>" class ="btn btn-large btn-warning">Editar</a>
    </th>
   
  </tr>
<?php endforeach; ?>

</table>
 
</body>
<Script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"></script>
<script src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>
 <script src="bootbox.locales.min.js"></script>
 <script>
 $(document).ready(function() {
    $('#tablaproductos').DataTable();
} );
</script>

<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->

</html>