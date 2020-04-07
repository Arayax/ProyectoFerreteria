<?php
require_once 'bootstrap.php';


$categoria = new categoria();
if($categoria->deleteById($_REQUEST['id'])) {
    header('Location: /indexCategoria.php');
}
else {
    echo "An issue while deleting the item.";

}