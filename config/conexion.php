<?php
    //Clases para establecer la conexion de la BD usando PDO
    class Conectar {
        protected $dbhost; // es una variable protegida reconocida en cu clase
        protected function conexion(){
            try{
                $conectar = $this->dbhost = new PDO("mysql:host=localhost; dbname=ferreteria_apirest","root","");
                return $conectar;
            }catch (Exception $e){
                print "!!!ERROR".$e->getMessage()."<br>";
                die();
            }
        }
        public function set_names(){
        return $this->dbhost->query("SET NAMES 'utf8'");
    }
    }
?>