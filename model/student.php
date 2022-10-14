<?php

class Student {

    public  $firstname;
    public  $name;
    public  $mail;
    public  $tel;
    public $id;

    public function __construct() {
        $this->firstname = $row["prenom"];
        $this->name = $row["nom"];
        $this->mail = $row["mail"];
        $this->tel = $row["tel"];
        $this->id = $row["id"];
    }
}