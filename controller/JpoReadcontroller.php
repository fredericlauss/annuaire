<?php
require_once('./services/connectDB.php');
require_once('./manager/BaseManager.php');
require_once('./manager/JpoManager.php');
$readcontroller = new StudentReadController();
$jpo = $readcontroller->readJpo();
require_once('./view/jpo.php');


class StudentReadController {
    public function readJpo() {
        $jpo = new JpoManager();
        return $jpo->getAll();
    }
}
