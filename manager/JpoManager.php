<?php
require_once('./services/connectDb.php');
require_once('./controller/StudentConnectionController.php');
require_once('./model/Jpo.php');

class JpoManager {

    public function create($input1, $input2) {
        $connectDb = new Database();
        $sql ="INSERT INTO `jpo` (name, date) VALUES ('$input1', '$input2')";
        $res = $sql;
        $connectDb->connection->exec($sql);
        if ($res) {
             return true;
        }else {
            return false;
        }
    }
    public function readOne($id) {
        $jpo = [];
        $connectDb = new Database();
        $sql = "SELECT * FROM jpo WHERE id = $id";
        $req = $connectDb->connection->prepare($sql);
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
            foreach($resultat as $row) {
                $jpo[] = new Jpo($row);
            }
        return $jpo;
    }

    public function getAll() {
        $jpo = [];
        $connectDb = new Database();
        $sql = "SELECT * FROM jpo";
        $req = $connectDb->connection->prepare($sql);
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
         
            foreach($resultat as $row) {
                $jpo[] = new Jpo($row);
            }
        return $jpo;
    }

    public function delete($id) {
        $connectDb = new Database();
        $sql ="DELETE FROM jpo WHERE id='$id'";
        $res = $sql;
        $connectDb->connection->exec($sql);
        if ($res) {
            echo "delete de $id";
             return true;
        }else {
            return false;
        }
    }

    public function update($id, $input1, $input2)
    {
        $connectDb = new Database();
        $sql ="UPDATE `jpo` SET `name`='$input1', `date`='$input2' WHERE `id`='$id'";
        $res = $sql;
        $connectDb->connection->exec($sql);
        if ($res) {
             return true;
        }else {
            return false;
        }
    }
}