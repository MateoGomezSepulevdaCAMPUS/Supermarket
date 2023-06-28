<?php

//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL); 

require_once("configProductos.php");

$record = new Productos();

if(isset($_GET['id_producto']) && isset($_GET['req'])){
    if ($_GET['req'] == "delete"){
        $record -> setIdProducto($_GET['id_producto']);
        $record -> delete();
        echo "<script> alert('los datos fueron Eliminados satisfactoriamente');document.location='Productos.php'</script>";

    }
}
?>