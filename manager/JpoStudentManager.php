<?php
require_once('./services/connectDb.php');
require_once('./controller/StudentConnectionController.php');
require_once('./model/Student.php');

class JpoStudentManager {

    public function create($id, $input5) {
        $connectDb = new Database();
        $sql ="INSERT INTO `jpostudent` (id, id_jpo) VALUES ('$input1', '$input2')";
        $res = $sql;
        $connectDb->connection->exec($sql);
        if ($res) {
             return true;
        }else {
            return false;
        }
    }
}