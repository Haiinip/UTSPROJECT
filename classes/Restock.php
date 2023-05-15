<?php
require_once 'Database.php';
require_once 'Validation.php';
class Restock
{
    private $db;
    private $validation;

    public function __construct()
    {
        $this->db = new Database;
        $this->validation = new Validation;
    }

    public function getAll()
    {
        $this->db->query('SELECT *, supplier.name as supplier_name FROM restock INNER JOIN supplier ON restock.supplier_id = supplier.id');
        return $this->db->fetchAll();
    }
}
