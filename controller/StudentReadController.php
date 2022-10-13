<?php
require_once('./services/connectDB.php');
require_once('./model/BaseManager.php');

$readcontroller = new StudentReadController();
$readcontroller->read();


class StudentReadController {

    public function read() {
        $students = new BaseManager();
        $students->getAll();
    }
}
