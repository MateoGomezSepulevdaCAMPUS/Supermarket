<?php
//para imprimir errores en ejecucion;

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);


require_once("../Config/Conectar.php");
require_once("../Config/db.php");

class LoginUsers extends Conectar{

    private $id_empleado;
    private $email;
    private $password;

    public function __construct($id_empleado=0, $email="", $password="", $dbCnx=""){
        $this->id_empleado = $id_empleado;
        $this->email = $email;
        $this->password = $password;
        parent::__construct($dbCnx);
    }
    public function setIdEmpleado($id_empleado){
        $this->id_empleado = $id_empleado;
    }
    public function getIdEmpleado(){
        return $this->id_empleado;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function getPassword(){
        return $this->password;
    }

    public function fetchAll(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM users");
            $stm->execute();
            return $stm->fetchAll(); 
        } catch (Exception $e) {
            return $e->getMessage();    
        }
    }

    public function login(){
        try {
            $stm = $this->dbCnx->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
            $stm -> execute([$this->email, md5($this->password)]);
            $user = $stm->fetchAll();
            if(count($user)>0){
                session_start();
                $_SESSION['id_empleado'] = $user[0]['id_empleado'];
                $_SESSION['email'] = $user[0]['email'];
                $_SESSION['password'] = $user[0]['password'];
                return true;
            }else{
                false;
            }
        } catch (Exception $e) {
            return $e->getMessage();    
        }
    }
}
?>