<?php
chdir('../');
require_once('./services/connectDB.php');
require_once('./manager/JpoManager.php');
$studentCreatController = new JpoCreatController();
$studentCreatController->creat();
header('Location: http://localhost/annuaire/jpo.php');
exit();

class JpoCreatController {

    public function creat() {
        $jpo = new JpoManager();
        if(isset($_POST) && !empty($_POST)){
            $input1 = htmlspecialchars(stripslashes(trim($_POST['input1'])));
            $input2 = htmlspecialchars(stripslashes(trim($_POST['input2'])));
            if($input1 && $input2){
                echo "Successfully inserted data";
            }else{
                echo "failed to insert data";
            }
            return  $jpo->create($input1, $input2);
        }
         
    }
}