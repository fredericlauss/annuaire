<?php
require_once('./services/connectDB.php');
require_once('./manager/BaseManager.php');
$studentCreatController = new StudentCreatController();
$studentCreatController->creat();

class StudentCreatController {

    public function creat() {
        $students = new BaseManager();
        return  $students->create();

        if(isset($_POST) && !empty($_POST)){
            $input1 = $_POST['input1'];
            $res = $students->connectDb->create($input1);
            if($res){
                echo "Successfully inserted data";
            }else{
                echo "failed to insert data";
            }
        } 
    }
}