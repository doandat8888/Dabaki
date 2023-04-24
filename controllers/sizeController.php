<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../models/sizeModel.php');
?>
<?php 
    class SizeController {
        public $model;
        public function __construct() {
            $this->model = new SizeModel();
        }

        public function getAllSizeManageProduct() {
            $data = $this->model->getAllSize();
            include_once "../../views/shop/size-manage-product-view.php";
        }
    }
?>