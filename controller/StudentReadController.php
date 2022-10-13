<?php
require_once('./services/connectDB.php');
require_once('./model/BaseManager.php');

$readcontroller = new StudentReadController();
$readcontroller->count();
$readcontroller->pages();
$readcontroller->read();



class StudentReadController {

    public function read() {
        $students = new BaseManager();
        return  $students->getAll();
    }

    public function count() {
        $students = new BaseManager();
        return  $students->count();
    }

    public function pages() {
        $students = new BaseManager();
        return  $students->pages();
    }
}
