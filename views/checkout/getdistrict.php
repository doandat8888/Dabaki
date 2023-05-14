<?php 
    include_once "../../controllers/districtController.php";
    echo "<option value='-1'>Quận / huyện</option>";
    if(isset($_GET['provinceId'])) {
        $provinceId = $_GET['provinceId'];
        $districtController = new DistrictController();
        $districtController->getDistrictByProvinceIdCheckoutInfo($provinceId);
        
    }
?>