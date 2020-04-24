<?php

class guardar{

protected $request;


function __construct($request) {
 $this-> request = $request;
}

 public function GuardarImagen(){  
$uploaded = __DIR__ . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . $_FILES['attached']['name'];

if (move_uploaded_file($_FILES['attached']['tmp_name'], $uploaded)) {

    echo "File attached properly.\n";
} else {
    echo "Something went wrong!\n";
}



echo "<h1>{$uploaded}</h1><hr/>";
echo '<pre>' . print_r($_FILES, TRUE);
}
}