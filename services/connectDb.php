<?php
class Database 
{
    private  $host;
    private  $dbname;
    private  $login;
    private  $pwd;
    public $connection;

    public function __construct()
    {
        $this->host = json_decode(file_get_contents('services\connect.json'), true)["HOST"];
        $this->dbname = json_decode(file_get_contents('services\connect.json'), true)["DBNAME"];
        $this->login = json_decode(file_get_contents('services\connect.json'), true)["LOGIN"];
        $this->pwd = json_decode(file_get_contents('services\connect.json'), true)["PWD"];
        $this->Db();
    }

    public function DB()
    {
        try{
            $this->connection = new PDO('mysql:host=' . $this->host . ';dbname=' .$this->dbname, $this->login , $this->pwd );
            return $this->connection;
        } catch (Exeption $e) {
            die('Erreur :' .$e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
