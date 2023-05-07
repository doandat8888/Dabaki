<?php 
    if(isset($_SESSION["shop_id"])) {
        $shopId = $_SESSION["shop_id"];
    }
    include_once "../../controllers/billController.php";
    include_once "../../controllers/billDetailController.php";
    $billController = new BillController();
    $billController->getDashboardDataByShopId($shopId);
?>