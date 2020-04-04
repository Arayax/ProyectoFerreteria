<?php
require_once 'bootstrap.php';

/** @var Stuff $stuff */
$producto = new producto();
if($producto->deleteById($_REQUEST['id'])) {
    echo "Item deleted";
}
else {
    echo "An issue while deleting the item.";
}