<?php
require_once("../Config/Conectar.php");
require_once("../Config/db.php");

class RegistroUser extends Conectar{
    private $id_usuario;
    private $id_empleado;
    private $email;
    private $username;
    private $password;

    public function __construct($id_usuario=0, $id_empleado=0, $email="", $username="", $password="", $dbCnx=""){
        $this->id_usuario = $id_usuario;
        $this->id_empleado = $id_empleado;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        parent::__construct($dbCnx);
    }
    public function setIdusuario($id_usuario){
        $this->id_usuario = $id_usuario;
    }
    public function getIdusuario(){
        return $this->id_usuario;
    }
    public function setIdempleado($id_empleado){
        $this->id_empleado = $id_empleado;
    }
    public function getIdempleado(){
        return $this->id_empleado;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function getUsername(){
        return $this->username;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function getPassword(){
        return $this->password;
    }

    public function checkUser($email){
        try {
            $stm = $this -> dbCnx -> prepare("SELECT * FROM users WHERE email = '$email'");
            $stm-> execute();
            if($stm->fetchColumn()){
                return true;
            }else{
                return false;
            }
        } catch (Exception $e) {
            return $e->getMessage();    
        }
    }

    public function insertData(){
        try {
            $stm = $this->dbCnx->prepare("INSERT INTO users(id_empleado, email, username, password) VALUES(?,?,?,?)");
            $stm -> execute([$this->id_empleado, $this->email, $this->username, md5($this->password)]);
        } catch (Exception $e) {
        return $e->getMessage();    
        }
    }
}
?>