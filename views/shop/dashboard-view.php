<?php
    if(isset($_SESSION["shop_id"])) {
        $shopId = $_SESSION["shop_id"];
    }
    include_once "../../controllers/billDetailController.php";
    //Lấy tổng doanh thu
    $revenueValue = 0;
    $totalBill = 0;
    $totalSoldProduct = 0;
    if($data && count($data) > 0) {
        foreach($data as $bill) {
            $totalBill++;
            $totalStr = $bill->getTotal();
            $totalStr = str_replace("đ", "", $totalStr);
            $totalStr = str_replace(".", "", $totalStr);
            $totalValue = intval($totalStr);
            $revenueValue += $totalValue;
        }
        $revenueStr = strval(round($revenueValue / 1000000, 2));
        
    
        //Lấy số sản phẩm đã bán
        $billDetailController = new BillDetailController();
        $listBillDetail = $billDetailController->getBillDetailByShopId($shopId);
        foreach($listBillDetail as $billDetail) {
            $productQuantity = $billDetail->getProductQuantity();
            $totalSoldProduct += $productQuantity;
        }
    }
    
?>
<div class="dashboard-page">
    <div class="title">
        Tổng quan
    </div>
    <div class="row dashboard-body">
        <div class="col-12 col-sm-6 col-lg-4 dashboard-body-item">
            <div class="dashboard-item-content">
                <p class="dashboard-item-content-value"><?php  echo $revenueValue > 0 ? "$revenueStr triệu" : 0?></p>
                <p class="dashboard-item-content-title">Doanh thu</p>
                
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-4 dashboard-body-item">
            <div class="dashboard-item-content">
                <p class="dashboard-item-content-value"><?php echo $totalSoldProduct > 0 ? $totalSoldProduct : 0?></p>
                <p class="dashboard-item-content-title">Sản phẩm đã bán</p>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-4 dashboard-body-item">
            <div class="dashboard-item-content">
                <p class="dashboard-item-content-value"><?php echo $totalBill > 0 ? $totalBill : 0?></p>
                <p class="dashboard-item-content-title">Đơn hàng</p>
            </div>
        </div>
    </div>
</div>