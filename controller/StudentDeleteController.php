<?php
chdir('../');
require_once('./services/connectDB.php');
require_once('./manager/BaseManager.php');
require_once('./manager/JpoStudentManager.php');
$studentDeleteController = new StudentDeleteController();
$studentDeleteController->deleteJpoStudent();
$studentDeleteController->delete();
header('Location: http://localhost/annuaire/');
exit();


class StudentDeleteController {

    public function deleteJpoStudent() {
        if (isset($_POST['delete'])) {
            $id = $_POST['id'];
            $jpoStudent = new JpoStudentManager;
            return $jpoStudent->delete($id);
        }
    }

    public function delete() {
        if (isset($_POST['delete'])) {
            $id = $_POST['id'];
            $students = new BaseManager();
            return $students->delete($id);
        }        
    }
}