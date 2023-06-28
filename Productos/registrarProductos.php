<?php
if(isset($_POST['guardar'])){
    require_once("configProductos.php");

    $config = new Productos();

    $config->setPrecioUnitario($_POST['precioUnitario']);
    $config->setStock($_POST['stock']);
    $config->setUnidadesPerdidas($_POST['unidadesPerdidas']);
    $config->setDescontinuado($_POST['descontinuado']);

    $config-> insertData();

    echo "<script> alert('los datos fueron guardados satisfactoriamente');document.location='Productos.php'</script>";

}
?>