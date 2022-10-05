<?php
require_once('./model/connection.php');
require_once('./services/connectDB.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
    <?php require_once( __DIR__ . './view/form.php') ?>
    </main>
</body>
</html>

<?php
if(isset($_POST) & !empty($_POST)){
	$input1 = $connectDb->sanitize($_POST['input1']);
}
$res = $connectDb->create($input1);
if($res){
	echo "Successfully inserted data";
}else{
	echo "failed to insert data";
}
?>