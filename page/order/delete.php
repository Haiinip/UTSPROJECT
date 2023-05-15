<?php
session_start();
require_once '../../classes/Database.php';
require_once '../../classes/Order.php';
$db = new Database;
$order = new Order;
$order->delete($_POST['id']);
$_SESSION['message'] = [
    'type' => 'success',
    'message' => 'Data berhasil dihapus'
];
header('Location: list.php');
