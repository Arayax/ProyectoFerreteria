<?php
require_once 'bootstrap.php';

/** @var Stuff $stuff */
$categoria = new categoria();
if($categoria->deleteById($_REQUEST['id'])) {
    echo "Item deleted";
}
else {
    echo "An issue while deleting the item.";
}