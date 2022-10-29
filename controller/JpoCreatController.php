<?php
chdir('../');
require_once('./services/connectDB.php');
require_once('./manager/JpoManager.php');
$studentCreatController = new JpoCreatController();
$studentCreatController->creat();
header('Location: http://localhost/annuaire/');
exit();

class JpoCreatController {

    public function creat() {
        $jpo = new JpoManager();
        if(isset($_POST) && !empty($_POST)){
            $input1 = $_POST['input1'];
            $input2 = $_POST['input2'];
            if($input1 && $input2){
                echo "Successfully inserted data";
            }else{
                echo "failed to insert data";
            }
            return  $jpo->create($input1, $input2);
        }
         
    }
}