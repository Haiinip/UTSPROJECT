<?php
require_once 'Database.php';
require_once 'Validation.php';

class Customer
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
        $this->db->query('SELECT customer.*, card.name as card_name FROM customer INNER JOIN card ON customer.card_id = card.id');
        return $this->db->fetchAll();
    }

    public function getById($id)
    {
        $this->db->query('SELECT * FROM customer WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->fetch();
    }

    public function insert($data)
    {
        $rules = [
            'name' => 'required|min:3|max:20',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'gender' => 'required',
            'address' => 'required|min:3|max:20',
            'card_id' => 'required',
        ];
        $errors = $this->validation->validate($data, $rules);
        if (empty($errors)) {
            $this->db->query('INSERT INTO customer (name, email, phone, gender, address, card_id) VALUES (:name, :email, :phone, :gender, :address, :card_id)');
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':phone', $data['phone']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':card_id', $data['card_id']);
            return $this->db->execute();
        } else {
            return $errors;
        }
    }

    public function update($data)
    {
        $rules = [
            'name' => 'required|min:3|max:20',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'gender' => 'required',
            'address' => 'required|min:3|max:20',
            'card_id' => 'required',
        ];
        $errors = $this->validation->validate($data, $rules);
        if (empty($errors)) {
            $this->db->query('UPDATE customer SET name = :name, email = :email, phone = :phone, gender = :gender, address = :address, card_id = :card_id WHERE id = :id');
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':phone', $data['phone']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':card_id', $data['card_id']);
            $this->db->bind(':id', $data['id']);
            return $this->db->execute();
        } else {
            return $errors;
        }
    }

    public function delete($id)
    {
        $this->db->query('DELETE FROM customer WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
