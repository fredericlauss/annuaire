<?php


require_once('./services/connectDb.php');
require_once('./controller/StudentConnectionController.php');



class BaseManager {


    private $table;
    private $object;
    public $resultat;
    public $count;
    public $pages;
    
    public function getById($id)
    {

    }

    public function count() {
        $connectDb = new Database();
        $sqlCount = "SELECT COUNT(id) as count FROM student";
        $req = $connectDb->connection->prepare($sqlCount);
        $req->execute();
        $this->count = (int)$req->fetch()['count'];
        return $this->count;
    }
    
    public function getAll() {
        $connectDb = new Database();
        $sql = "SELECT * FROM student";
        $params =[];


        //filtre
        if (!empty($_GET['q'])) {
            $sql .= " WHERE prenom LIKE :prenom";
            $params['prenom'] = '%' . $_GET['q'] . '%';
        }
        $sql .= " LIMIT " . 20;

        $req = $connectDb->connection->prepare($sql);
        $req->execute($params);
        $this->resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultat;
    }

    public function pages() {
        $this->pages = ceil($this->count / 20);
        return $this->pages;
    }
    
    public function create() {
        $sql ="INSERT INTO `student` (prenom) VALUES ('$input1')";
        $res = $sql;
        $this->connection->exec($sql);
        if ($res) {
             return true;
        }else {
            return false;
        }
    }
    
    public function update($obj)
    {
        
    }
    
    public function delete($obj)
    {
        
    }

}