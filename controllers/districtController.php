<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../models/districtModel.php');
?>
<?php 
    class DistrictController {
        public $model;
        public function __construct() {
            $this->model = new DistrictModel();
        }

        public function getDistrictByProvinceIdCheckoutInfo($provinceId) {
            $data = $this->model->getDistrictByProvinceId($provinceId);
            include_once "../../views/checkout/district-checkout-info-view.php";
        }
    }
?>