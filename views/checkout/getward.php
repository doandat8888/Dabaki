<?php 
    include_once "../../controllers/wardController.php";
    echo "<option value='-1'>Xã / phường / thị trấn</option>";
    if(isset($_GET['districtId']) && isset($_GET['provinceId'])) {
        $districtId = $_GET['districtId'];
        $wardController = new WardController();
        $wardController->getWardByDistrictIdCheckoutInfo($districtId);
    }
?>