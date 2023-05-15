<?php
require_once 'Database.php';
require_once 'Validation.php';

class Product
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
        $this->db->query('SELECT product.*, product_type.name AS product_type_name, restock.restock_number AS restock_number FROM product INNER JOIN product_type ON product.product_type_id = product_type.id INNER JOIN restock ON product.restock_id = restock.id');
        return $this->db->fetchAll();
    }

    public function getById($id)
    {
        $this->db->query('SELECT product.*, product_type.name AS product_type_name, restock.restock_number AS restock_number FROM product INNER JOIN product_type ON product.product_type_id = product_type.id INNER JOIN restock ON product.restock_id = restock.id WHERE product.id = :id');
        $this->db->bind(':id', $id);
        return $this->db->fetch();
    }

    public function insert($data)
    {
        $rules = [
            'sku' => 'required|min:3|max:20|unique:product,sku',
            'name' => 'required|min:3|max:20',
            'purchase_price' => 'required|numeric',
            'sell_price' => 'required|numeric',
            'stock' => 'required|numeric',
            'min_stock' => 'required|numeric',
            'product_type_id' => 'required',
            'restock_id' => 'required'
        ];
        $errors = $this->validation->validate($data, $rules);
        if (empty($errors)) {
            $this->db->query('INSERT INTO product (sku, name, purchase_price, sell_price, stock, min_stock, product_type_id, restock_id) VALUES (:sku, :name, :purchase_price, :sell_price, :stock, :min_stock, :product_type_id, :restock_id)');
            $this->db->bind(':sku', $data['sku']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':purchase_price', $data['purchase_price']);
            $this->db->bind(':sell_price', $data['sell_price']);
            $this->db->bind(':stock', $data['stock']);
            $this->db->bind(':min_stock', $data['min_stock']);
            $this->db->bind(':product_type_id', $data['product_type_id']);
            $this->db->bind(':restock_id', $data['restock_id']);
            return $this->db->execute();
        } else {
            return $errors;
        }
    }

    public function update($data)
    {
        $rules = [
            'sku' => 'required|min:3|max:20',
            'name' => 'required|min:3|max:20',
            'purchase_price' => 'required|numeric',
            'sell_price' => 'required|numeric',
            'stock' => 'required|numeric',
            'min_stock' => 'required|numeric',
            'product_type_id' => 'required',
            'restock_id' => 'required'
        ];
        $errors = $this->validation->validate($data, $rules);
        if (empty($errors)) {
            $this->db->query('UPDATE product SET sku = :sku, name = :name, purchase_price = :purchase_price, sell_price = :sell_price, stock = :stock, min_stock = :min_stock, product_type_id = :product_type_id, restock_id = :restock_id WHERE id = :id');
            $this->db->bind(':sku', $data['sku']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':purchase_price', $data['purchase_price']);
            $this->db->bind(':sell_price', $data['sell_price']);
            $this->db->bind(':stock', $data['stock']);
            $this->db->bind(':min_stock', $data['min_stock']);
            $this->db->bind(':product_type_id', $data['product_type_id']);
            $this->db->bind(':restock_id', $data['restock_id']);
            $this->db->bind(':id', $data['id']);
            return $this->db->execute();
        } else {
            return $errors;
        }
    }

    public function delete($id)
    {
        $this->db->query('DELETE FROM product WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
