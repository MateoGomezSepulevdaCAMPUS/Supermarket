<?php
require_once("../Config/db.php");
require_once("../Config/Conectar.php");

class Productos extends Conectar{
    private $id_producto;
    private $id_categoria;
    private $precioUnitario;
    private $stock;
    private $unidadesPerdidas;
    private $descontinuado;

    public function __construct($id_producto=0, $id_categoria=0, $precioUnitario="", $stock="", $unidadesPerdidas="", $descontinuado="", $dbCnx=""){
        $this->precioUnitario = $precioUnitario;
        $this->stock = $stock;
        $this->unidadesPerdidas = $unidadesPerdidas;
        $this->descontinuado = $descontinuado;
        parent:: __construct($dbCnx);
    }

    public function setIdProducto($id_producto){
        $this->id_producto = $id_producto;
    }
    public function getIdProducto(){
        return $this->id_producto;
    }
    public function setIdCategoria($id_categoria){
        $this->id_categoria = $id_categoria;
    }
    public function getIdCategoria(){
        return $this->id_categoria;
    }
    public function setPrecioUnitario($precioUnitario){
        $this->precioUnitario = $precioUnitario;
    }
    public function getPrecioUnitario(){
        return $this->precioUnitario;
    }
    public function setStock($stock){
        $this->stock = $stock;
    }
    public function getStock(){
        return $this->stock;
    }
    public function setUnidadesPerdidas($unidadesPerdidas){
        $this->unidadesPerdidas = $unidadesPerdidas;
    }
    public function getUnidadesPerdidas(){
        return $this->$unidadesPerdidas;
    }
    public function setDescontinuado($descontinuado){
        $this->descontinuado = $descontinuado;
    }
    public function getDescontinuado(){
        return $this->descontinuado;
    }

    public function insertData(){
        try {
            $stm = $this-> dbCnx -> prepare("INSERT INTO Productos(precioUnitario, stock, unidadesPerdidas, descontinuado) VALUES (?,?,?,?)");
            $stm -> execute([$this->precioUnitario, $this->stock, $this->unidadesPerdidas, $this->descontinuado]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function obtainAll(){
        try {
            $stm = $this-> dbCnx -> prepare("SELECT * FROM Productos");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function delete(){
        try {
            $stm = $this-> dbCnx ->prepare("DELETE FROM Productos WHERE id_producto=?");
            $stm -> execute([$this->id_producto]);
            return $stm -> fetchAll();
            echo "<script> alert('Registro Eliminado');document.location='Productos.php'</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
?>