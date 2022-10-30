<?php
require_once('./services/connectDb.php');
require_once('./controller/StudentConnectionController.php');
require_once('./model/Student.php');

class JpoStudentManager {

    public function create($id, $input5) {
        foreach($input5 as $input ) {
        $connectDb = new Database();
        $sql ="INSERT INTO `jpostudent` (id, id_jpo) VALUES ('$id', '$input')";
        $res = $sql;
        $connectDb->connection->exec($sql);
        }
    }

    public function delete($id) {
        $connectDb = new Database();
        $sql ="DELETE FROM jpostudent WHERE id='$id'";
        $res = $sql;
        $connectDb->connection->exec($sql);
        if ($res) {
            echo "delete de $id";
             return true;
        }else {
            return false;
        }
    }

    public function read($id) {
        $connectDb = new Database();
        // $sql2 ="SELECT $id FROM jpostudent INNER JOIN student ON jpostudent.id = student.id";
        $sql2 ="SELECT name FROM jpo INNER JOIN jpostudent ON jpo.id = jpostudent.id_jpo INNER JOIN student On jpostudent.id = student.id WHERE student.id = $id";
        $req2 = $connectDb->connection->prepare($sql2);
        $req2->execute();
        $jpos = $req2->fetchAll(PDO::FETCH_ASSOC);
        return $jpos;
    }
}