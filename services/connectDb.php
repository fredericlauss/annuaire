<?php
class Database 
{
    private  $host;
    private  $dbname;
    private  $login;
    private  $pwd;
    private $connection;

    public function __construct()
    {
        $this->host = json_decode(file_get_contents('services\connect.json'), true)["HOST"];
        $this->dbname = json_decode(file_get_contents('services\connect.json'), true)["DBNAME"];
        $this->login = json_decode(file_get_contents('services\connect.json'), true)["LOGIN"];
        $this->pwd = json_decode(file_get_contents('services\connect.json'), true)["PWD"];
    }

    public function DB()
    {
        try{
            $this->connection = new PDO('mysql:host=' . $this->host . ';dbname=' .$this->dbname, $this->login , $this->pwd );
            echo "bien co ";
            return $this->connection;
        } catch (Exeption $e) {
            die('Erreur :' .$e->getMessage());
        }
    }
    public function sanitize($var)
    {
        $return = mysqli_real_escape_string($this->connection, $var);
        return $return;
    }

    public function create($input1) {
        $sql = "INSERT INTO `student` (prenom) VALUES ('$input1')";
        $res = mysqli_query($this->connection, $sql);
        if ($res) {
             return true;
        }else {
            return false;
        }
    }
}
