<?php
require_once 'Database.php';
require_once 'Validation.php';

class ProductType
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
        $this->db->query('SELECT * FROM product_type');
        return $this->db->fetchAll();
    }

    public function getById($id)
    {
        $this->db->query('SELECT * FROM product_type WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->fetch();
    }

    public function insert($data)
    {
        $rules = [
            'name' => 'required|min:3|max:20',
        ];
        $errors = $this->validation->validate($data, $rules);
        if (empty($errors)) {
            $this->db->query('INSERT INTO product_type (name) VALUES (:name)');
            $this->db->bind(':name', $data['name']);
            return $this->db->execute();
        } else {
            return $errors;
        }
    }

    public function update($data)
    {
        $rules = [
            'name' => 'required|min:3|max:20',
        ];
        $errors = $this->validation->validate($data, $rules);
        if (empty($errors)) {
            $this->db->query('UPDATE product_type SET name = :name WHERE id = :id');
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':id', $data['id']);
            return $this->db->execute();
        } else {
            return $errors;
        }
    }

    public function delete($id)
    {
        $this->db->query('DELETE FROM product_type WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
