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
}