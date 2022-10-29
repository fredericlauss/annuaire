<?php
chdir('../');
require_once('./services/connectDB.php');
require_once('./manager/BaseManager.php');
$studentCreatController = new StudentCreatController();
$studentCreatController->creat();
header('Location: http://localhost/annuaire/');
exit();

class StudentCreatController {

    public function creat() {
        $students = new BaseManager();
        if(isset($_POST) && !empty($_POST)){
            $input1 = $_POST['input1'];
            $input2 = $_POST['input2'];
            $input3 = $_POST['input3'];
            $input4 = $_POST['input4'];
            $input4 = $_POST['input5'];
            if($input1 && $input2 && $input3 && $input4 && $input5){
                echo "Successfully inserted data";
            }else{
                echo "failed to insert data";
            }
            return  $students->create($input1, $input2, $input3, $input4, $input5);
        }
         
    }

    public function creatRelation() {
        $relation = new JpoStudentManager();
        if(isset($_POST) && !empty($_POST)){
            $input1 = $_POST['input5'];
            if($input5){
                echo "Successfully inserted data";
            }else{
                echo "failed to insert data";
            }
            return  $relation->create($input5);
        }
    }
}