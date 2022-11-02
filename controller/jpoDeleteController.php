<?php
chdir('../');
require_once('./services/connectDB.php');
require_once('./manager/BaseManager.php');
require_once('./manager/JpoStudentManager.php');
require_once('./manager/JpoManager.php');
$jpoDeleteController = new StudentDeleteController();
$jpoDeleteController->deleteJpoStudent();
$jpoDeleteController->delete();
header('Location: http://localhost/annuaire/jpo.php');
exit();


class StudentDeleteController {

    public function deleteJpoStudent() {
        if (isset($_POST['delete'])) {
            $id = $_POST['id'];
            $jpoStudent = new JpoStudentManager;
            return $jpoStudent->deletejpo($id);
        }
    }

    public function delete() {
        if (isset($_POST['delete'])) {
            $id = $_POST['id'];
            $jpo = new JpoManager();
            return $jpo->delete($id);
        }        
    }
}