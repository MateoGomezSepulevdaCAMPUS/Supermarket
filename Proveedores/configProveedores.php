<?php

require_once("../Config/db.php");
require_once("../Config/Conectar.php");

class Proveedores extends Conectar{
    private $id;
    private $nombre;
    private $celular;
    private $ciudad;

    public function __construct($id=0, $nombre="", $celular="", $ciudad="", $dbCnx=""){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->celular = $celular;
        $this->ciudad = $ciudad;
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
    public function setCiudad($ciudad){
        $this->ciudad = $ciudad;
    }
    public function getCiudad(){
        return $this->ciudad;
    }

    public function insertData(){
        try {
            $stm = $this-> dbCnx ->prepare("INSERT INTO Proveedores(nombre, celular, ciudad ) VALUES (?,?,?)");
            $stm -> execute([$this->nombre, $this->celular, $this->ciudad]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function obtainAll(){
        try {
            $stm = $this-> dbCnx ->prepare("SELECT * FROM Proveedores");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function delete(){
        try {
            $stm = $this -> dbCnx ->prepare("DELETE FROM Proveedores WHERE id_proveedor=?");
            $stm -> execute([$this->id]);
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
?>