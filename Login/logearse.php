<?php

//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

session_start();

if(isset($_POST['logearse'])){

    require_once("LoginUsers.php");

    $credenciales = new LoginUsers();

    $credenciales -> setEmail($_POST['email']);
    $credenciales -> setPassword($_POST['password']);

    $login = $credenciales -> login();

    if($login){
        header('Location: ../Categorias/Categorias.php');
    }else{
        echo "<script> alert('password/email invalidos');document.location='loginRegister.php'</script>";
    }
}
?>