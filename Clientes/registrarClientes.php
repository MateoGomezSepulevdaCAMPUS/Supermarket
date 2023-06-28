<?php
if(isset($_POST['guardar'])){
    require_once("configClientes.php");

    $config = new Clientes();

    $config->setNombre($_POST['nombre']);
    $config->setCelular($_POST['celular']);
    $config->setCompañia($_POST['compañia']);

    $config-> insertData();

    echo "<script> alert('los datos fueron guardados satisfactoriamente');document.location='Clientes.php'</script>";

}
?>