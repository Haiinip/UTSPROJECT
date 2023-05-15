<?php
session_start();
require_once '../../classes/Database.php';
require_once '../../classes/Product.php';
$db = new Database;
$product = new Product;
$product->delete($_POST['id']);
$_SESSION['message'] = [
    'type' => 'success',
    'message' => 'Data berhasil dihapus'
];
header('Location: list.php');
