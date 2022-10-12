<?php

require_once('./services/connectDB.php');
require_once('./model/BaseManager.php');

 if ($studentController) {
    
 }  else {
    $studentController = new StudentController();
 }



class StudentController {


    public function __construct() {
        $connectDb = new Database();
        $connectDb->DB();
    }

    public function creat() {
        if(isset($_POST) && !empty($_POST)){
            $input1 = $_POST['input1'];
            $res = $connectDb->create($input1);
            if($res){
                echo "Successfully inserted data";
            }else{
                echo "failed to insert data";
            }
        } 
    }

    public function read() {
        $students = new BaseManager();
        $students->getAll();
    }
}