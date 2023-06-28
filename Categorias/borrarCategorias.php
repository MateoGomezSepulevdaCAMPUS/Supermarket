<?php

//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL); 

require_once("configCategorias.php");

$record = new Categorias();

if(isset($_GET['id_categoria']) && isset($_GET['req'])){
    if ($_GET['req'] == "delete"){
        $record -> setId($_GET['id_categoria']);
        $record -> delete();
        echo "<script> alert('los datos fueron Eliminados satisfactoriamente');document.location='Categorias.php'</script>";

    }
}
?>