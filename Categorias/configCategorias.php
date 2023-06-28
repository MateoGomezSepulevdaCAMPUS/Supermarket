<?php
//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("../Config/db.php");
require_once("../Config/Conectar.php");

class Categorias extends Conectar{
    private $id;
    private $nombre;
    private $descripccion;
    private $imagen;

    public function __construct($id=0, $nombre="", $descripccion="", $imagen="", $dbCnx=""){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripccion = $descripccion;
        $this->imagen = $imagen;
        parent:: __construct($dbCnx);
    }

    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setDescripccion($descripccion){
        $this->descripccion = $descripccion;
    }
    public function getDescripccion(){
        return $this->descripccion;
    }
    public function setImagen($imagen){
        $this->imagen = $imagen;
    }
    public function getImagen(){
        return $this->imagen;
    }


    public function insertData(){
        try {
            $stm = $this-> dbCnx -> prepare("INSERT INTO Categorias (nombre, descripccion, imagen) VALUES (?,?,?)");
            $stm -> execute([$this->nombre, $this->descripccion, $this->imagen]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtainAll(){
        try {
            $stm = $this-> dbCnx ->prepare("SELECT * FROM Categorias");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(){
        try {
            $stm = $this-> dbCnx ->prepare("DELETE FROM Categorias WHERE id_categoria=?");
            $stm -> execute([$this->id]);
            return $stm -> fetchAll();
            echo "<script> alert('Registro Eliminado');document.location='Categorias.php'</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

?>