<?php


require_once('./services/connectDb.php');
require_once('./controller/StudentConnectionController.php');
require_once('./model/Student.php');
require_once('JpoStudentManager.php');
require_once('UrlHelper.php');


class BaseManager {


    private $table;
    private $object;
    public $resultat;
    public $count;
    public $pages;
    public $row;
    public $page;
    public $offset;



    public function count() {
        $connectDb = new Database();
        $sqlCount = "SELECT COUNT(id) as count FROM student";
        if (!empty($_GET['q'])) {
            $params['nom'] = '%' . $_GET['q'] . '%';
            $sqlCount .= " WHERE nom LIKE :nom";
            $req = $connectDb->connection->prepare($sqlCount);
            $req->execute($params);
        } else {
            $req = $connectDb->connection->prepare($sqlCount);
            $req->execute();
        }
        
        $this->count = (int)$req->fetch()['count'];
        return $this->count;
    }
    
    public function getAll() {
        $students = [];
        $connectDb = new Database();
        $sql = "SELECT * FROM student";
        $params =[];
        $filtre = ["nom", "prenom", "mail"];
        //filtre par nom
        if (!empty($_GET['q'])) {
            $sql .= " WHERE nom LIKE :nom";
            $params['nom'] = '%' . $_GET['q'] . '%';
        }
        // filtre asc et desc
        if (!empty($_GET['sort']) && in_array($_GET['sort'], $filtre)) {
            $direction = $_GET['dir'] ?? 'asc';
            if (!in_array($direction, ['asc', 'desc'])) {
                $direction = 'asc';
            }
            $sql .= " Order BY " . $_GET['sort'] . " $direction ";
        }
        //filtre jpo
        if (!empty($_GET['f'])) {
            $params['nom'] = $_GET['f'];
            $sql ="SELECT * FROM student INNER JOIN jpostudent ON student.id = jpostudent.id WHERE jpostudent.id_jpo = :nom";
        }
            //pagination
            $this->offset = ($this->page()-1) * 20;
            //suite
            $sql .= " LIMIT " . 20 . " OFFSET $this->offset";
            $req = $connectDb->connection->prepare($sql);
            $req->execute($params);
            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultat as $row) {
                $students[] = new Student($row);
            }
            return $students;
          
    }

    public function page() {
        return $this->page = (int)($_GET['p'] ?? 1);
    }

    public function pages() {
        $this->pages = ceil($this->count() / 20);
        return $this->pages;
    }
    
   
    public function create($input1, $input2, $input3, $input4, $input5) {
        $connectDb = new Database();
        $sql ="INSERT INTO `student` (nom, prenom, mail, number) VALUES ('$input1', '$input2', '$input3', '$input4')";
        $res = $sql;
        $connectDb->connection->exec($sql);
        if ($res) {
            $id = $connectDb->connection->lastInsertId();
            $jpoStudent = new JpoStudentManager;
            $jpoStudent->create($id, $input5);
            return true;
        }else {
            return false;
        }
    }
    
    
    public function update($id, $input1, $input2, $input3, $input4, $input5)
    {
        $connectDb = new Database();
        $sql ="UPDATE `student` SET `nom`='$input1', `prenom`='$input2', `mail`='$input3', `number`='$input4' WHERE `id`='$id'";
        $res = $sql;
        $connectDb->connection->exec($sql);
        $jpoStudent = new JpoStudentManager;
        $jpoStudent->delete($id);
        $jpoStudent->create($id, $input5);
        if ($res) {
             return true;
        }else {
            return false;
        }
    }
    
    
    public function delete($id) {
        $connectDb = new Database();
        $sql ="DELETE FROM student WHERE id='$id'";
        $res = $sql;
        $connectDb->connection->exec($sql);
        if ($res) {
            echo "delete de $id";
             return true;
        }else {
            return false;
        }
    }

}