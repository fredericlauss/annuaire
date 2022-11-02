<?php
chdir('../');
require_once('./services/connectDB.php');
require_once('./manager/BaseManager.php');
$updatecontroller = new StudentUpdateController();
$updatecontroller->update();
header('Location: http://localhost/annuaire/');
exit();


class StudentUpdateController {

    public function update() {
        if(isset($_POST) && !empty($_POST)){
            $id = $_POST['id'];
            $input1 = htmlspecialchars(stripslashes(trim($_POST['input1'])));
            $input2 = htmlspecialchars(stripslashes(trim($_POST['input2'])));
            $input3 = htmlspecialchars(stripslashes(trim($_POST['input3'])));
            $input4 = htmlspecialchars(stripslashes(trim($_POST['input4'])));
            $input5 = $_POST['input5'];
            $students = new BaseManager();
            return $students->update($id, $input1, $input2, $input3, $input4, $input5);
        }   
    }
}
