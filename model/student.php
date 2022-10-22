<?php

class Student {

    public $firstname;
    public $name;
    public $mail;
    public $tel;
    public $id;

    public function __construct($row) {
        $this->firstname = $row["prenom"];
        $this->name = $row["nom"];
        $this->mail = $row["mail"];
        $this->tel = $row["tel"];
        $this->id = $row["id"];
    }

    public function get_prenom() {
        return $this->firstname;
    }

    public function get_name() {
        return $this->name;
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