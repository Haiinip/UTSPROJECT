<?php
session_start();
require_once '../../classes/Database.php';
require_once '../../classes/Product.php';
$db = new Database;
$product = new Product;
$data = $product->getAll();
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
                    <h1 class="mt-4">Product</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">List Product</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <div class="title">
                                    <i class="fas fa-table me-1"></i>
                                    List of Product
                                </div>
                                <div class="data-add">
                                    <a href="create.php" class="btn btn-primary">Create</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- message -->
                            <?php if (isset($_SESSION['message'])) : ?>
                                <div class="alert alert-<?= $_SESSION['message']['type'] ?>" role="alert">
                                    <?= $_SESSION['message']['message'] ?>
                                </div>
                            <?php
                                unset($_SESSION['message']);
                            endif; ?>
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>SKU</th>
                                        <th>Name</th>
                                        <th>Purchase Price</th>
                                        <th>Sell Price</th>
                                        <th>Stock</th>
                                        <th>Min Stock</th>
                                        <th>Product Type</th>
                                        <th>Restock</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data as $item) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $item['sku'] ?></td>
                                            <td><?= $item['name'] ?></td>
                                            <td><?= $item['purchase_price'] ?></td>
                                            <td><?= $item['sell_price'] ?></td>
                                            <td><?= $item['stock'] ?></td>
                                            <td><?= $item['min_stock'] ?></td>
                                            <td><?= $item['product_type_name'] ?></td>
                                            <td><?= $item['restock_number'] ?></td>
                                            <td>
                                                <a href="edit.php?id=<?= $item['id'] ?>" class="btn btn-warning">Edit</a>
                                                <form action="delete.php" method="post" style="display: inline-block;">
                                                    <input type="hidden" name="id" value="<?= $item['id']; ?>">
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
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