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
        if ((isset($_POST['input1'])) && (isset($_POST['id'])) && (isset($_POST['input2'])) && (isset($_POST['input3'])) && (isset($_POST['input4']))) {
            $id = $_POST['id'];
            $input1 = $_POST['input1'];
            $input2 = $_POST['input2'];
            $input3 = $_POST['input3'];
            $input4 = $_POST['input4'];
            $students = new BaseManager();
            return $students->update($id, $input1, $input2, $input3, $input4);
        }   
    }
}
