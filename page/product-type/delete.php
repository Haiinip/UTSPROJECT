<?php
session_start();
require_once '../../classes/Database.php';
require_once '../../classes/ProductType.php';
$db = new Database;
$productType = new ProductType;
$productType->delete($_POST['id']);
$_SESSION['message'] = [
    'type' => 'success',
    'message' => 'Data berhasil dihapus'
];
header('Location: list.php');
