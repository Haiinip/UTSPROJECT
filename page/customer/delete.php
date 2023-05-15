<?php
session_start();
require_once '../../classes/Database.php';
require_once '../../classes/Customer.php';
$db = new Database;
$customer = new Customer;
$customer->delete($_POST['id']);
$_SESSION['message'] = [
    'type' => 'success',
    'message' => 'Data berhasil dihapus'
];
header('Location: list.php');
