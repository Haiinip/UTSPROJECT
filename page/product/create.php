<?php
session_start();
require_once '../../classes/Database.php';
require_once '../../classes/Product.php';
require_once '../../classes/ProductType.php';
require_once '../../classes/Restock.php';
$db = new Database;
$product = new Product;
$productType = new ProductType;
$restock = new Restock;
$productTypes = $productType->getAll();
$restocks = $restock->getAll();
$errSku = $errName = $errPurchasePrice = $errSellPrice = $errStock = $errMinStock = $errProductTypeId = $errRestockId = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $insert = $product->insert($_POST);
    if ($insert === true) {
        $_SESSION['message'] = [
            'type' => 'success',
            'message' => 'Data berhasil disimpan'
        ];
        header('Location: list.php');
    } else {
        if (!empty($insert['sku'][0])) {
            $errSku = $insert['sku'][0];
        }
        if (!empty($insert['name'][0])) {
            $errName = $insert['name'][0];
        }
        if (!empty($insert['purchase_price'][0])) {
            $errPurchasePrice = $insert['purchase_price'][0];
        }
        if (!empty($insert['sell_price'][0])) {
            $errSellPrice = $insert['sell_price'][0];
        }
        if (!empty($insert['stock'][0])) {
            $errStock = $insert['stock'][0];
        }
        if (!empty($insert['min_stock'][0])) {
            $errMinStock = $insert['min_stock'][0];
        }
        if (!empty($insert['product_type_id'][0])) {
            $errProductTypeId = $insert['product_type_id'][0];
        }
        if (!empty($insert['restock_id'][0])) {
            $errRestockId = $insert['restock_id'][0];
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
                    <h1 class="mt-4">Product</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Create Product</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <div class="title">
                                    <i class="fas fa-table me-1"></i>
                                    Create Product
                                </div>
                                <div class="data-add">
                                    <a href="list.php" class="btn btn-primary">List</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="form" method="POST" action="">
                                <div class="row">
                                    <!-- Form Group (sku)-->
                                    <div class="col-md-12 gx-3 mb-3">
                                        <label class="small mb-1" for="sku">SKU</label>
                                        <input class="form-control <?= $errSku ? 'is-invalid' : '' ?>" id="sku" name="sku" type="text" placeholder="SKU" />
                                        <div class="invalid-feedback"><?= $errSku ?></div>
                                    </div>
                                    <!-- Form Group (nama)-->
                                    <div class="col-md-12 gx-3 mb-3">
                                        <label class="small mb-1" for="name">Nama</label>
                                        <input class="form-control <?= $errName ? 'is-invalid' : '' ?>" id="name" name="name" type="text" placeholder="Nama" />
                                        <div class="invalid-feedback"><?= $errName ?></div>
                                    </div>
                                    <!-- Form Group (purchase_price)-->
                                    <div class="col-md-12 gx-3 mb-3">
                                        <label class="small mb-1" for="purchase_price">Purchase Price</label>
                                        <input class="form-control <?= $errPurchasePrice ? 'is-invalid' : '' ?>" id="purchase_price" name="purchase_price" type="text" placeholder="Purchase Price" />
                                        <div class="invalid-feedback"><?= $errPurchasePrice ?></div>
                                    </div>
                                    <!-- Form Group (sell_price)-->
                                    <div class="col-md-12 gx-3 mb-3">
                                        <label class="small mb-1" for="sell_price">Sell Price</label>
                                        <input class="form-control <?= $errSellPrice ? 'is-invalid' : '' ?>" id="sell_price" name="sell_price" type="text" placeholder="Sell Price" />
                                        <div class="invalid-feedback"><?= $errSellPrice ?></div>
                                    </div>
                                    <!-- Form Group (stock)-->
                                    <div class="col-md-12 gx-3 mb-3">
                                        <label class="small mb-1" for="stock">Stock</label>
                                        <input class="form-control <?= $errStock ? 'is-invalid' : '' ?>" id="stock" name="stock" type="text" placeholder="Stock" />
                                        <div class="invalid-feedback"><?= $errStock ?></div>
                                    </div>
                                    <!-- Form Group (min_stock)-->
                                    <div class="col-md-12 gx-3 mb-3">
                                        <label class="small mb-1" for="min_stock">Min Stock</label>
                                        <input class="form-control <?= $errMinStock ? 'is-invalid' : '' ?>" id="min_stock" name="min_stock" type="text" placeholder="Min Stock" />
                                        <div class="invalid-feedback"><?= $errMinStock ?></div>
                                    </div>
                                    <!-- Form Group (product_type_id)-->
                                    <div class="col-md-12 gx-3 mb-3">
                                        <label class="small mb-1" for="product_type_id">Product Type</label>
                                        <select class="form-control <?= $errProductTypeId ? 'is-invalid' : '' ?>" id="product_type_id" name="product_type_id">
                                            <option value="">-- Pilih --</option>
                                            <?php foreach ($productTypes as $productType) : ?>
                                                <option value="<?= $productType['id'] ?>"><?= $productType['name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback"><?= $errProductTypeId ?></div>
                                    </div>
                                    <!-- Form Group (restock_id)-->
                                    <div class="col-md-12 gx-3 mb-3">
                                        <label class="small mb-1" for="restock_id">Restock</label>
                                        <select class="form-control <?= $errRestockId ? 'is-invalid' : '' ?>" id="restock_id" name="restock_id">
                                            <option value="">-- Pilih --</option>
                                            <?php foreach ($restocks as $restock) : ?>
                                                <option value="<?= $restock['id'] ?>"><?= $restock['restock_number'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback"><?= $errRestockId ?></div>
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