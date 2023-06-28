<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL); 

require_once("configClientes.php");

$record = new Clientes();

if(isset($_GET['id_cliente']) && isset($_GET['req'])){
    if($_GET['req'] == "delete"){
        $record -> setId($_GET['id_cliente']);
        $record ->delete();
        echo "<script> alert('los datos fueron Eliminados satisfactoriamente');document.location='Clientes.php'</script>";
    }
}
?>