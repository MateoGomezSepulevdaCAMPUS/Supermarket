<?php
if(isset($_POST['guardar'])){
    require_once("configFacturas.php");

    $config = new Facturas();

    $config->setPrecioUnitario($_POST['fecha']);

    $config-> insertData();

    echo "<script> alert('los datos fueron guardados satisfactoriamente');document.location='Facturas.php'</script>";

}
?>