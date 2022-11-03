<?php
chdir('../');
require_once('./services/connectDB.php');
require_once('./manager/BaseManager.php');
require_once('./manager/JpoStudentManager.php');
require_once('./manager/JpoManager.php');
$jpoReadOneController = new JpoUpdateRedirectController();
$jpo = $jpoReadOneController->ReadOneJpo();
require_once('./view/jpoUpdate.php');

class JpoUpdateRedirectController {

    public function ReadOneJpo() {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $jpo = new JpoManager();
            return $jpo->readOne($id);
        }
    }
}