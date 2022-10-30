<?php
require_once('./manager/JpoStudentManager.php');
class Student {
    public $name;
    public $firstname;
    public $mail;
    public $tel;
    public $id;
    public $jpo;

    public function __construct($row) {
        $this->name = $row["nom"];
        $this->firstname = $row["prenom"];
        $this->mail = $row["mail"];
        $this->tel = $row["number"];
        $this->id = $row["id"];
        $this->set_jpos();
        echo $row["id"];
    }

    public function set_jpos() {
        $jpoStudent = new JpoStudentManager;
        $this->jpo = $jpoStudent->read($this->id);
    }

    public function get_jpos() {
        $this->set_jpos();
        return $this->jpo;
    }

    public function get_name() {
        return $this->name;
    }

    public function get_prenom() {
        return $this->firstname;
    }

    public function get_mail() {
        return $this->mail;
    }

    public function get_tel() {
        return $this->tel;
    }

    public function get_id() {
        return $this->id;
    }
}