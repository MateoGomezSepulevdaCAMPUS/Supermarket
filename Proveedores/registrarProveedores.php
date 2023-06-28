<?php
ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL); 
if(isset($_POST['guardar'])){
    require_once("configProveedores.php");

    $config = new Proveedores();

    $config->setNombre($_POST['nombre']);
    $config->setCelular($_POST['celular']);
    $config->setCiudad($_POST['ciudad']);


    $config-> insertData();

    echo "<script> alert('los datos fueron guardados satisfactoriamente');document.location='Proveedores.php'</script>";

}
?>