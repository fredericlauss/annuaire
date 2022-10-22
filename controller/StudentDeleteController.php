<?php
chdir('../');
require_once('./services/connectDB.php');
require_once('./manager/BaseManager.php');
$studentDeleteController = new StudentDeleteController();
$studentDeleteController->delete();
header('Location: http://localhost/annuaire/');
exit();


class StudentDeleteController {

    public function delete() {
        if (isset($_POST['delete'])) {
            $id = $_POST['id'];
            $students = new BaseManager();
            return $students->delete($id);
        }        
    }
}