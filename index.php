<?php

require_once('./services/connectDB.php');

$connectDb = new Database();
$connectDb->json();
$connectDb->DB();
var_dump($connectDb->host);
