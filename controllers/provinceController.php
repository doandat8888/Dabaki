<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../models/provinceModel.php');
?>
<?php 
    class ProvinceController {
        public $model;
        public function __construct() {
            $this->model = new ProvinceModel();
        }

        public function getAllProvinceCheckoutInfo() {
            $data = $this->model->getAllProvince();
            include_once "../../views/checkout/province-checkout-info-view.php";
        }
    }
?>