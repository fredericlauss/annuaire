<?php
require_once('./services/connectDb.php');
require_once('./model/connection.php');
class BaseManager extends Database {


    private $table;
    private $object;
    protected $connection;

    public function __construct($table,$object)
    {
        $this->_table = $table;
		$this->_object = $object;
        $this->connection = $connectDb->getConnection();
    }
    
    public function getById($id)
    {
        
    }
    
    public function getAll()
    {
        $req = $connection->prepare("SELECT * FROM " . $this->_table);
		$req->execute();
		$resultat = $req->fetchAll();
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