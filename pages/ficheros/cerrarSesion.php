<?php
$imagenes = glob('galeria/*');
foreach($imagenes as $imagen){
    if(is_file($imagen))
    unlink($imagen);
}
session_start();
session_unset($_SESSION);
session_destroy();
header("Location: index.php?page=galeria");
?>