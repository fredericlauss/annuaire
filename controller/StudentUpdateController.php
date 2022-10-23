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
        if ((isset($_POST['input1'])) && (isset($_POST['id']))) {
            $id = $_POST['id'];
            $input1 = $_POST['input1'];
            $students = new BaseManager();
            return $students->update($id, $input1);
        }   
    }
}
