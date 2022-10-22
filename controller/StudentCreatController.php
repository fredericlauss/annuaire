<?php
chdir('../');
require_once('./services/connectDB.php');
require_once('./manager/BaseManager.php');
$studentCreatController = new StudentCreatController();
$studentCreatController->creat();


class StudentCreatController {

    public function creat() {
        $students = new BaseManager();
        if(isset($_POST) && !empty($_POST)){
            $input1 = $_POST['input1'];
            if($input1){
                echo "Successfully inserted data";
            }else{
                echo "failed to insert data";
            }
            return  $students->create($input1);
        }
         
    }
}