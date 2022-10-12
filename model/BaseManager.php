<?php
require_once('./services/connectDb.php');
require_once('./controller/Studentcontroller.php');
class BaseManager {


    private $table;
    private $object;
    

    // public function __construct($table, $object)
    // {
    //     $this->_table = $table;
	// 	$this->_object = $object;
    //     $this->connection = $connectDb->getConnection();
    // }
    
    public function getById($id)
    {

    }
    
    public function getAll()
    {
        $connectDb = new Database();
        $connectDb->DB();
        $sql = "SELECT * FROM " . "student";
        $req = $connectDb->connection->prepare($sql);
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        var_dump($resultat);
        return $resultat;
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