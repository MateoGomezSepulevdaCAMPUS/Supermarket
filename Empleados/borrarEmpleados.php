<?php

//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL); 

require_once("configEmpleados.php");

$record = new Empleados();

if(isset($_GET['id_empleado']) && isset($_GET['req'])){
    if ($_GET['req'] == "delete"){
        $record -> setId($_GET['id_empleado']);
        $record -> delete();
        echo "<script> alert('los datos fueron Eliminados satisfactoriamente');document.location='Empleados.php'</script>";

    }
}
?>