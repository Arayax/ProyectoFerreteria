<?php
require_once 'bootstrap.php';

$user = new Users();


?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">Ferreteria Siquirres</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Inicio <span class="sr-only">(current)</span></a>
      </li>
  <?php   if ($user->isAnonymous()):  ?>
   
  
      <li class="nav-item">
        <a class="nav-link"  id="login" display ="true" href="../login.php">Log in</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"   id="logout" display ="false" href="../logout.php">Log out</a>
      </li>
      <?php else:?> 

        <li class="nav-item">
        <a class="nav-link"  id="login" display ="false" href="../login.php">Log in</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"   id="logout" display ="true" href="../logout.php">Log out</a>
      </li>

      <?php endif;?> 
      <li class="nav-item">
        <a class="nav-link"   id="logout" href="../FormularioContactos.php">Contactanos</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administracion</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">

          <a href="../indexProductos.php" class="dropdown-item" href="#">Productos</a>
          <a href="../indexCategoria.php" class="dropdown-item" href="#">Categorias</a>
          <a href="../indexContactos.php" class="dropdown-item" href="#">Mensajes</a>
         
        </div>
      </li>
    </ul>
    
  </div>
</nav>