<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../models/wardModel.php');
?>
<?php 
    class WardController {
        public $model;
        public function __construct() {
            $this->model = new WardModel();
        }

        public function getWardByDistrictIdCheckoutInfo($districtId) {
            $data = $this->model->getWardByDistrictId($districtId);
            include_once "../../views/checkout/ward-checkout-info-view.php";
        }
    }
?>