<?php

class Student {
    public $name;
    public $firstname;
    public $mail;
    public $tel;
    public $id;
    public array $jpos;

    public function __construct($row) {
        $this->name = $row["nom"];
        $this->firstname = $row["prenom"];
        $this->mail = $row["mail"];
        $this->tel = $row["number"];
        $this->id = $row["id"];
    }

    public function set_jpos() {

    }

    public function get_jpos() {
        return $this->jpos;
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