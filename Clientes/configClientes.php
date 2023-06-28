<?php

require_once("../Config/db.php");
require_once("../Config/Conectar.php");

class Clientes extends Conectar{
    private $id;
    private $nombre;
    private $celular;
    private $compañia;

    public function __construct($id=0, $nombre="", $celular="", $compañia="", $dbCnx=""){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->celular = $celular;
        $this->compañia = $compañia;
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
    public function setCelular($celular){
        $this->celular = $celular;
    }
    public function getCelular(){
        return $this->celular;
    }
    public function setCompañia($compañia){
        $this->compañia = $compañia;
    }
    public function getCompañia(){
        return $this->compañia;
    }

    public function insertData(){
        try {
            $stm = $this-> dbCnx ->prepare("INSERT INTO Clientes (nombre, celular, compañia) VALUES (?,?,?)");
            $stm -> execute([$this->nombre, $this->celular, $this->compañia]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtainAll(){
        try {
            $stm = $this-> dbCnx -> prepare("SELECT * FROM Clientes");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function delete(){
        try {
            $stm = $this-> dbCnx -> prepare("DELETE FROM Clientes WHERE id_cliente=?");
            $stm -> execute([$this->id]);
            return $stm -> fetchAll();
            echo "<script> alert('Registro Eliminado');document.location='Clientes.php'</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
?>