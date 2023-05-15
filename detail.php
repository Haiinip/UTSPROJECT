<?php
require_once 'classes/Product.php';
$id = $_GET['id'];
$product = new Product;
$result = $product->getById($id);
$products = $product->getAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="assets/style68b3.css?ver=1">
    <link rel="stylesheet" type="text/css" href="assets/css/flexslider.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link href="assets/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=El+Messiri:400,500,600,700|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="icon" href="favicon.png" type="image/png">
    <title>Detail</title>
</head>

<body>

    <!--header-->
    <!--header desktop-->
    <div class="header">
        <div class="container-fluid">
            <div class="header-desktop ">
                <div class=" header-menu-desktop d-flex justify-content-between">
                    <div>
                        <div class="logo">
                            <a href="index.php"><img src="assets/imager/home/Logo.png" alt=""></a>
                        </div>
                    </div>
                    <div>
                        <div class="menu">
                            <ul>
                                <li>
                                    <a href="index.php" class="menu-active">home</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div class="header-right">
                            <ul class="list-inline">
                                <li><a href="page/auth/login.php">Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end header desktop-->
    <!--header mobile-->
    <div class="header">
        <div class="container-fluid">
            <div class="header-mobile">
                <div class="header-menu-mobile d-flex justify-content-between">
                    <div>
                        <button><span class="lnr lnr-menu click-mobile"></span></button>
                    </div>
                    <div class="logo">
                        <img src="assets/imager/home/Logo.png" alt="">
                    </div>
                    <div>
                        <div class="row header-right">
                            <ul class="list-inline">
                                <li><a href="page/auth/login.php">Login</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            <div class="menu-mobile">
                <ul>
                    <li><a href="index.php" class="menu-active">home</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--end header mobile-->
    <!--end header-->

    <!--title detail-->
    <div class="title-page" style="background-image: url('assets/imager/shop/Shop_3Columns-title.jpg');background-position: center center;background-size: cover;">
        <div class="container">
            <div class="row">
                <div class=" col-md-6 inner-title-page">
                    <h1>Shop</h1>
                    <p><span>Home</span> / Shop / Product Single</p>
                </div>
            </div>
        </div>
    </div>
    <!--end title detail-->
    <!--product detail-->
    <div class="container">
        <div class="product-single-detail">
            <div class="row product_detail">
                <div class="col-md-6 col-sm-12 col-12">
                    <div id="slider" class="flexslider">
                        <ul class="slides">
                            <li>
                                <img src="assets/imager/product-detail/product_detail.jpg" alt="">
                            </li>
                            <li>
                                <img src="assets/imager/product-detail/product_detail.jpg" alt="">
                            </li>
                            <li>
                                <img src="assets/imager/product-detail/product_detail.jpg" alt="">
                            </li>
                            <li>
                                <img src="assets/imager/product-detail/product_detail.jpg" alt="">
                            </li>
                            <!-- items mirrored twice, total of 12 -->
                        </ul>
                    </div>
                    <div id="carousel" class="flexslider">
                        <ul class="slides">
                            <li>
                                <img src="assets/imager/product-detail/product_detail1.jpg" alt="">
                            </li>
                            <li>
                                <img src="assets/imager/product-detail/product_detail2.jpg" alt="">
                            </li>
                            <li>
                                <img src="assets/imager/product-detail/product_detail3.jpg" alt="">
                            </li>
                            <li>
                                <img src="assets/imager/product-detail/product_detail4.jpg" alt="">
                            </li>
                            <!-- items mirrored twice, total of 12 -->
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-12 content-product">
                    <h2><?= $result['name'] ?> | Rp. <?= number_format($result['sell_price'], 0, ',', '.') ?></h2>
                    <p><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> &nbsp; (2 customer review)</p>
                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                        unknown printer took a galley of type and scrambled it to make a type specimen book.
                        It has survived not only five centuries, but also the leap into electronic </p>
                    <div class="infor-product">
                        <p><span>Sku: </span><?= $result['sku'] ?></p>
                        <p><span>Category: </span><?= $result['product_type_name'] ?></p>
                        <p><span>Stock: </span><?= $result['stock'] ?></p>
                        <p><span>Share: </span>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </p>
                    </div>
                    <div class="information">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Additional information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Reviews (2)</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                On the other hand, we denounce with righteous indignation and dislike men
                                who are so beguiled and demoralized by the charms of pleasure of the moment,
                                so blinded by desire, that they cannot foresee the pain and trouble that are
                                bound to ensue; and equal blame belongs to those who fail in their
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                Berry, sweet, fresh strawberries
                                <br>
                                Small capacity is suitable for travel and first time experience
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <div class="woocommerce-Reviews" id="reviews">
                                    <h2>2 review for Reframe Your Viewpoints</h2>
                                    <div id="comments">
                                        <div class="comment-list">
                                            <div class="comment-item">
                                                <div class="comment-content">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img src="assets/imager/blog/item-coment-blog-single1.jpg" alt="customer">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="comment-body">
                                                                <div class="comment-author">
                                                                    <span class="author">Emily Valdez</span>
                                                                    <div class="star-rating">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                    </div>
                                                                </div>
                                                                <span class="comment-time">March 28, 2020</span>
                                                                <p>But I must explain to you how all this mistaken idea of
                                                                    denouncing pleasure and praising pain was.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="comment-item">
                                                <div class="comment-content">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img src="assets/imager/blog/item-coment-blog-single2.jpg" alt="customer">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="comment-body">
                                                                <div class="comment-author">
                                                                    <span class="author">Emma Hayes</span>
                                                                    <div class="star-rating">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                    </div>
                                                                </div>
                                                                <span class="comment-time">March 28, 2020</span>
                                                                <p>Nor again is there anyone who loves or pursues or desires to
                                                                    obtain pain of itself, because it is pain.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="review_form_wrapper">
                                        <div id="review_form">
                                            <div id="respond" class="comment-respond">
                                                <form id="commentform" class="comment-form common-form js-contact-form" action="#" method="POST">
                                                    <p class="comment-notes">
                                                        <span>Add a review</span>
                                                        <span id="email-notes">
                                                            Your email address will not be published. Required fields are marked
                                                            <span class="required">*</span>
                                                        </span>
                                                    </p>
                                                    <div class="comment-form-rating">
                                                        <label>Your rating</label>
                                                        <p class="stars">
                                                            <a href="#" class="star-1"><i class="far fa-star"></i></a>
                                                            <a href="#" class="star-2"><i class="far fa-star"></i></a>
                                                            <a href="#" class="star-3"><i class="far fa-star"></i></a>
                                                            <a href="#" class="star-4"><i class="far fa-star"></i></a>
                                                            <a href="#" class="star-5"><i class="far fa-star"></i></a>
                                                        </p>
                                                    </div>
                                                    <p class="comment-form-author">
                                                        <input id="author" name="author" type="text" required="" placeholder="Your Name">
                                                    </p>
                                                    <p class="comment-form-email">
                                                        <input type="email" required="" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" name="email" id="email" placeholder="Your Email">
                                                    </p>
                                                    <p class="comment-form-comment">
                                                        <textarea id="comment" name="comment" required="" placeholder="Write Your Review..."></textarea>
                                                    </p>
                                                    <p class="form-submit">
                                                        <input name="submit" type="submit" id="submit" class="submit au-btn btn-small" value="Submit">
                                                        <span><i class="zmdi zmdi-arrow-right"></i></span>
                                                    </p>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--end product detail-->
    <!--product related-->
    <div class="container">
        <div class="prodcut-related">
            <div class="title">
                <h3 class="text-center">Related Products</h3>
            </div>
            <div class="row product">
                <?php foreach ($products as $key => $row) : ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-6 col-12">
                        <div class="card">
                            <div class="card-img-top">
                                <a href="product-single.html" class="wp-post-image">
                                    <img class="image-cover" src="assets/imager/product/product.jpg" alt="product">
                                </a>
                            </div>
                            <div class="card-body">
                                <p class="card-title"><a href="detail.php?id=<?= $row['id'] ?>"><?= $row['product_type_name'] ?></a></p>
                                <p class="woocommerce-loop-product__title">
                                    <a href="detail.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a>
                                </p>
                                <span class="price">
                                    <del>
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol">Rp. </span><?= number_format($row['purchase_price'], 0, '', '.') ?>

                                        </span>
                                    </del>
                                    <ins>
                                        <span class="woocommerce-Price-amount amount">
                                            <span class="woocommerce-Price-currencySymbol">Rp. </span><?= number_format($row['sell_price'], 0, '', '.') ?>
                                        </span>
                                    </ins>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
    <!--end product related-->
    <!--footer-->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12 ">

                    <ul class="list-inline">
                        <li>@2019 Uray.Get The Theme</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--end footer-->
    <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.flexslider-min.js"></script>
    <script type="text/javascript" src="assets/js/owl.carousel.js"></script>
    <script type="text/javascript" src="assets/js/custom.js"></script>
</body>

</html>