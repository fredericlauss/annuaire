<?php

require_once('./services/connectDB.php');

$connectDb = new Database();
$connectDb->json();
$connectDb->DB();
var_dump($connectDb->host);
var_dump($connectDb->dbname);
var_dump($connectDb->login);
var_dump($connectDb->pwd);
