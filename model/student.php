<?php

class Student {
    private  $name;
    private $id;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }
    public function __destruct($id) {
        // sql pour delet dans la base de donné avec id
    }

    public function update($id) {
        
    }
}