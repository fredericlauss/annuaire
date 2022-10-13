<?php


require_once('./services/connectDb.php');
require_once('./controller/StudentConnectionController.php');



class BaseManager {


    private $table;
    private $object;
    public $resultat;
    
    public function getById($id)
    {

    }
    
    public function getAll()
    {
        $connectDb = new Database();
        $sql = "SELECT * FROM " . "student";
        $req = $connectDb->connection->prepare($sql);
        $req->execute();
        $this->resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        
        return $this->resultat;
    }
    
    public function create($obj)
    {
        
    }
    
    public function update($obj)
    {
        
    }
    
    public function delete($obj)
    {
        
    }

}