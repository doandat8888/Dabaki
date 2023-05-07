<?php 
    include_once "../../controllers/shopController.php";
    if(isset($_SESSION['shop_id'])) {
        $shopId = $_SESSION['shop_id'];
        $shopController = new ShopController();
        if(isset($_POST['update-shop-submit'])) {
            $shopName = $_POST['shop-name'];
            $shopImg = $_POST['shop-img'];
            $shopAddress = $_POST['shop-address'];
            $shopPhone = $_POST['shop-phone'];
            $shopController->updateShop($shopId, $shopName, $shopImg, $shopAddress, $shopPhone);
        }
    }
?>

<div class="setting-shop-page">
    <div class="title">Thiết lập shop</div>
    <div class="setting-shop-body">
        <?php 
            $shopController->getShopByIdSetting($shopId);
        ?>
    </div>
</div>