<?php
require_once 'Database.php';
require_once 'Validation.php';

class Order
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
        $this->db->query('SELECT orders.*, customer.name as customer_name, product.name as product_name FROM orders INNER JOIN customer ON orders.customer_id = customer.id INNER JOIN product ON orders.product_id = product.id');
        return $this->db->fetchAll();
    }

    public function getById($id)
    {
        $this->db->query('SELECT * FROM orders WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->fetch();
    }

    public function insert($data)
    {
        $rules = [
            'order_number' => 'required',
            'date' => 'required',
            'qty' => 'required|numeric',
            'total_price' => 'required|numeric',
            'customer_id' => 'required',
            'product_id' => 'required'
        ];
        $errors = $this->validation->validate($data, $rules);
        if (empty($errors)) {
            $this->db->query('INSERT INTO orders (order_number, date, qty, total_price, customer_id, product_id) VALUES (:order_number, :date, :qty, :total_price, :customer_id, :product_id)');
            $this->db->bind(':order_number', $data['order_number']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':qty', $data['qty']);
            $this->db->bind(':total_price', $data['total_price']);
            $this->db->bind(':customer_id', $data['customer_id']);
            $this->db->bind(':product_id', $data['product_id']);
            return $this->db->execute();
        } else {
            return $errors;
        }
    }

    public function update($data)
    {
        $rules = [
            'order_number' => 'required',
            'date' => 'required',
            'qty' => 'required|numeric',
            'total_price' => 'required|numeric',
            'customer_id' => 'required',
            'product_id' => 'required'
        ];
        $errors = $this->validation->validate($data, $rules);
        if (empty($errors)) {
            $this->db->query('UPDATE orders SET order_number = :order_number, date = :date, qty = :qty, total_price = :total_price, customer_id = :customer_id, product_id = :product_id WHERE id = :id');
            $this->db->bind(':order_number', $data['order_number']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':qty', $data['qty']);
            $this->db->bind(':total_price', $data['total_price']);
            $this->db->bind(':customer_id', $data['customer_id']);
            $this->db->bind(':product_id', $data['product_id']);
            $this->db->bind(':id', $data['id']);
            return $this->db->execute();
        } else {
            return $errors;
        }
    }

    public function delete($id)
    {
        $this->db->query('DELETE FROM orders WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
