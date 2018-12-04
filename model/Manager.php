<?php

namespace ClementPatigny\Model;

class Manager {
    protected function connectDb() {
        $db = new \PDO('mysql:host=localhost;dbname=P4;charset=utf8', 'root', '');
        return $db;
    }
}
