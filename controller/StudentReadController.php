<?php
require_once('./services/connectDB.php');
require_once('./manager/BaseManager.php');
$readcontroller = new StudentReadController();
$readcontroller->count();
$pages = $readcontroller->pages();
$page = $readcontroller->page();
$students = $readcontroller->read();
require_once('./view/home.php');



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

    public function page() {
        $students = new BaseManager();
        return  $students->page();
    }
}
