<?php

class Jpo {

    public $date;
    public $name;
    public $id;

    public function __construct($row) {
        $this->date = $row["date"];
        $this->name = $row["name"];
        $this->id = $row["id"];
    }

    public function get_date() {
        return $this->date;
    }

    public function get_name() {
        return $this->name;
    }

    public function get_id() {
        return $this->id;
    }
}