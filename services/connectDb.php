<?php
class Database 
{
    public  $host;
    public  $dbname;
    public  $login;
    public  $pwd;

    public function json()
    {
        $this->host = json_decode(file_get_contents('services\connect.json'), true)["HOST"];
        $this->dbname = json_decode(file_get_contents('services\connect.json'), true)["DBNAME"];
        $this->login = json_decode(file_get_contents('services\connect.json'), true)["LOGIN"];
        $this->pwd = json_decode(file_get_contents('services\connect.json'), true)["PWD"];
    }

    public static function DB()
    {

        try{
            $db = new PDO('mysql:host=localhost;dbname=test', 'root', '');
            return $db;
        } catch (Exeption $e) {
            die('Erreur :' .$e->getMessage());
        }
    }
}
