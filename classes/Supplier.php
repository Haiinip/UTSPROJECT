<?php

require_once 'Database.php';
require_once 'Validation.php';

class Supplier
{
    public $db;
    public $validation;

    public function __construct()
    {
        $this->db = new Database;
        $this->validation = new Validation;
    }

    public function getAll()
    {
        $this->db->query('SELECT * FROM supplier');
        return $this->db->fetchAll();
    }
}
