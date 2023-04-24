<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../models/colorModel.php');
?>
<?php 
    class ColorController {
        public $model;
        public function __construct() {
            $this->model = new ColorModel();
        }

        public function getAllColorManageProduct() {
            $data = $this->model->getAllColor();
            include_once "../../views/shop/color-manage-product-view.php";
        }
    }
?>