<?php
session_start();
require_once '../../classes/Database.php';
require_once '../../classes/Order.php';
require_once '../../classes/Product.php';
require_once '../../classes/Customer.php';
$db = new Database;
$order = new Order;
$product = new Product;
$customer = new Customer;
$products = $product->getAll();
$customers = $customer->getAll();
$errOrderNumber = $errDate = $errQty = $errTotalPrice = $errCustomerId = $errProductId = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        'order_number' => $_POST['order_number'],
        'date' => date('Y-m-d'),
        'qty' => $_POST['qty'],
        'total_price' => $product->getById($_POST['product_id'])['sell_price'] * $_POST['qty'],
        'customer_id' => $_POST['customer_id'],
        'product_id' => $_POST['product_id']
    ];
    $insert = $order->insert($data);
    if ($insert === true) {
        $_SESSION['message'] = [
            'type' => 'success',
            'message' => 'Data berhasil disimpan'
        ];
        header('Location: list.php');
    } else {
        if (!empty($insert['order_number'][0])) {
            $errOrderNumber = $insert['order_number'][0];
        }
        if (!empty($insert['qty'][0])) {
            $errQty = $insert['qty'][0];
        }
        if (!empty($insert['customer_id'][0])) {
            $errCustomerId = $insert['customer_id'][0];
        }
        if (!empty($insert['product_id'][0])) {
            $errProductId = $insert['product_id'][0];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../../assets/css/styles.css" rel="stylesheet" />
    <link href="../../assets/css/sweetalert.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php require_once '../../templates/header.php'; ?>
    <div id="layoutSidenav">
        <?php require_once '../../templates/navbar.php'; ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Order</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Create Order</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <div class="title">
                                    <i class="fas fa-table me-1"></i>
                                    Create Order
                                </div>
                                <div class="data-add">
                                    <a href="list.php" class="btn btn-primary">List</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="form" method="POST" action="">
                                <div class="row">
                                    <!-- Form Group (order_number)-->
                                    <div class="col-md-12 gx-3 mb-3">
                                        <label class="small mb-1" for="order_number">Order Number</label>
                                        <input class="form-control <?= $errOrderNumber ? 'is-invalid' : '' ?>" id="order_number" name="order_number" type="text" placeholder="Order Number" />
                                        <div class="invalid-feedback"><?= $errOrderNumber ?></div>
                                    </div>
                                    <!-- Form Group (qty)-->
                                    <div class="col-md-12 gx-3 mb-3">
                                        <label class="small mb-1" for="qty">Quantity</label>
                                        <input class="form-control <?= $errQty ? 'is-invalid' : '' ?>" id="qty" name="qty" type="number" placeholder="Quantity" />
                                        <div class="invalid-feedback"><?= $errQty ?></div>
                                    </div>
                                    <!-- Form Group (customer_id)-->
                                    <div class="col-md-12 gx-3 mb-3">
                                        <label class="small mb-1" for="customer_id">Customer</label>
                                        <select class="form-control <?= $errCustomerId ? 'is-invalid' : '' ?>" id="customer_id" name="customer_id">
                                            <option value="">-- Pilih --</option>
                                            <?php foreach ($customers as $customer) : ?>
                                                <option value="<?= $customer['id'] ?>"><?= $customer['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback"><?= $errCustomerId ?></div>
                                    </div>
                                    <!-- Form Group (product_id)-->
                                    <div class="col-md-12 gx-3 mb-3">
                                        <label class="small mb-1" for="product_id">Product</label>
                                        <select class="form-control <?= $errProductId ? 'is-invalid' : '' ?>" id="product_id" name="product_id">
                                            <option value="">-- Pilih --</option>
                                            <?php foreach ($products as $product) : ?>
                                                <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback"><?= $errProductId ?></div>
                                    </div>

                                </div>
                                <button class="btn btn-primary" type="submit" id="tombol_submit">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <?php require_once '../../templates/footer.php'; ?>
        </div>
    </div>
    <?php require_once '../../templates/script.php'; ?>

</body>

</html>