<?php
class Database 
{
    public  $host;

    public function json()
    {
        $this->host = json_decode(file_get_contents('services\connect.json'));
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
