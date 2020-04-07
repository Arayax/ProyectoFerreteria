<?php
require_once 'bootstrap.php';

/** @var Stuff $stuff */
$producto = new producto();
if($producto->deleteById($_REQUEST['id'])) {
    header('Location: /indexProductos.php');
}
else {
    header('Location: /error/errorDeleteProducto.php');
}