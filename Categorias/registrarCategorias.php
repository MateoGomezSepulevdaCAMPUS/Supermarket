<?php
if(isset($_POST['guardar'])){
    require_once("configCategorias.php");

    $config = new Categorias();
    
    $config->setNombre($_POST['nombres']);
    $config->setDescripccion($_POST['descripcion']);
    $config->setImagen($_POST['imagen']);

    $config-> insertData();

    echo "<script> alert('los datos fueron guardados satisfactoriamente');document.location='Categorias.php'</script>";

}
?>