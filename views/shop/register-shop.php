<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="register-shop-page">
            <div class="header">
                <div class="row">
                    <div class="header-left col-8">
                        <a href="../../index.php" class="header-left-logo-link"><img src="../../src/img/logo.png" class="header-left-logo" alt=""></a>
                        <p class="header-left-content">Đăng kí trở thành Người bán IvyModa</p>
                    </div>
                    <div class="header-right col-4">

                    </div>
                </div>
                
            </div>

            <?php 
                include_once "../../models/shopModel.php";
                include_once "../../controllers/shopController.php";
                $shopModel = new ShopModel();
                $shopData = $shopModel->getAllShop();
                $idShop = count($shopData) + 1;
                if(isset($_POST['submit'])) {
                    $shopName = $_POST['shop-name'];
                    $shopImg = $_POST['shop-img'];
                    $shopAddress = $_POST['shop-address'];
                    $shopPhone = $_POST['shop-phone'];
                    $shopController = new ShopController();
                    $shopController->setShop($idShop, $shopName, $shopImg, $shopAddress, $shopPhone);

                }
            ?>

            <div class="body">
                <form method="post" action="#">
                    <div class="shop-info-list row">
                        <div class="shop-info-item col-12 col-sm-12 col-lg-12">
                            <p class="shop-info-item-title">Tên shop</p>
                            <input type="text" placeholder="Nhập tên shop" class="shop-info-item-input" name="shop-name" required>
                        </div>
                        <div class="shop-info-item col-12 col-sm-12 col-lg-12">
                            <p class="shop-info-item-title">Link ảnh shop</p>
                            <input type="text" placeholder="Nhập link ảnh shop" class="shop-info-item-input" name="shop-img" required>
                        </div>
                        <div class="shop-info-item col-12 col-sm-12 col-lg-12">
                            <p class="shop-info-item-title">Địa chỉ</p>
                            <input type="text" placeholder="Nhập địa chỉ shop" class="shop-info-item-input" name="shop-address" required>
                        </div>
                        <div class="shop-info-item col-12 col-sm-12 col-lg-12">
                            <p class="shop-info-item-title">Số điện thoại</p>
                            <input type="text" placeholder="Nhập số điện thoại" class="shop-info-item-input" name="shop-phone" required>
                        </div>
                    </div>
                    <div class="save-info">
                        <button class="btn-save-info-shop" type="submit" name="submit">
                            Lưu thông tin
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
