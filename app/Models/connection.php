<?php

class Connection{

  
    private $host = 'localhost';
    private $dbname = 'elofy_db';
    private $user = 'root';
    private $pass = '';

    public function connect(){
        try{

            //construtor
            $connection = new PDO("mysql:host=$this->host;dbname=$this->dbname",
                "$this->user","$this->pass"
            );

            return $connection;

        } catch(PDOException $e){
            echo 'Error message: '.$e->getMessage();
        }
    }


}


?>