<?php
require_once('./controller/connection.php');
require_once('./services/connectDB.php');

if(isset($_POST) && !empty($_POST)){
    $input1 = $_POST['input1'];
    $res = $connectDb->create($input1);
    if($res){
        echo "Successfully inserted data";
    }else{
        echo "failed to insert data";
    }
}


?>