<?php
require_once 'bootstrap.php';

$contacto = new contacto();
$user = new Users();

if($user->isAnonymous()) {
    header('Location: /FormularioContactos.php');


  
}
if($user->login()) {

  header('Location: /indexContactos.php');


}

?>


<!DOCTYPE html>

<html lang="en">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Index - contacto</title>
</head>

<br>
<br>
<br>
<br>
<div class="form-group">

</div >
<body>

<?php include("Funciones/menu.php")?>
<table id="contactos" class="table table-bordered table-hover">
<thead>
<tr>
      <th scope="col">Correo</th>
      <th scope="col">Mensaje</th>
     
    </tr>
</thead>
<?php foreach ($contacto->findAll() as $item): ?>
<tr>
    <th><?php echo $item->email?></th>
   <th><?php echo $item->mensaje?></th>
  
  </tr>
<?php endforeach; ?>

</table>
  
</body>

< <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"></script>
<script src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>
 <script src="bootbox.locales.min.js"></script>
 <script>
 $(document).ready(function() {
    $('#contactos').DataTable();
} );
</script>

<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->

</html>