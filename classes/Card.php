<?php
require_once 'Database.php';
require_once 'Validation.php';

class Card
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
        $this->db->query('SELECT * FROM card');
        return $this->db->fetchAll();
    }
}
