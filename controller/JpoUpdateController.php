<?php
chdir('../');
require_once('./services/connectDB.php');
require_once('./manager/BaseManager.php');
require_once('./manager/JpoStudentManager.php');
require_once('./manager/JpoManager.php');
$jpoDeleteController = new JpoUpdateController();
$jpoDeleteController->update();
header('Location: /annuaire/jpo.php');
exit();


class JpoUpdateController {

    public function update() {
        if(isset($_POST) && !empty($_POST)){
            $id = $_POST['id'];
            $input1 = htmlspecialchars(stripslashes(trim($_POST['input1'])));
            $input2 = htmlspecialchars(stripslashes(trim($_POST['input2'])));
            $jpo = new jpoManager();
            return $jpo->update($id, $input1, $input2);
        }   
    }
}
