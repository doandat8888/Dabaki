<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./manage-shop.css">
        <link rel="stylesheet" href="./manage-product.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/a76b54ad15.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    </head>
    <body>
        <div class="manage-shop-page">
            <div class="header">
                <div class="row">
                    <div class="header-left col-8">
                        <a href="./index.php" class="header-left-logo-link"><img src="../../src/img/logo.png" class="header-left-logo" alt=""></a>
                        <p class="header-left-content">Kênh người bán</p>
                    </div>
                    <div class="header-right col-4">

                    </div>
                </div>
            </div>
            <div class="manage-shop-body d-flex">
                <div class="menu-list col-6 col-sm-6 col-lg-2">
                    <div class="menu-item">
                        <a href="?page=dashboard" class="menu-item-link">
                            <span class="material-symbols-outlined menu-item-link-icon">
                                dashboard
                            </span>
                            <div class="content">Tổng quan</div>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="?page=manage-product" class="menu-item-link">
                            <span class="material-symbols-outlined menu-item-link-icon">
                                inventory_2
                            </span>
                            <div class="content">Quản Lí Sản Phẩm</div>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="?page=manage-customer" class="menu-item-link">
                            <span class="material-symbols-outlined menu-item-link-icon">
                                person
                            </span>
                            <div class="content">Quản Lí Khách Hàng</div>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="?page=bill" class="menu-item-link">
                            <span class="material-symbols-outlined menu-item-link-icon">
                                receipt_long
                            </span>
                            <div class="content">Quản Lí Đơn Hàng</div>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="?page=setting" class="menu-item-link">
                            <span class="material-symbols-outlined menu-item-link-icon">
                                settings
                            </span>
                            <div class="content">Thiết Lập Shop</div>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="../../index.php?msg=login-out" class="menu-item-link">
                            <span class="material-symbols-outlined menu-item-link-icon">
                                door_open
                            </span>
                            <div class="content">Đăng Xuất</div>
                        </a>
                    </div>
                </div>
                <div class="page-view col-6 col-sm-6 col-lg-10">
                    <?php
                        include_once "pages.php";
                    ?>
                </div>
                
            </div>
        </div>
    </body>
</html>