<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../models/shopModel.php');
?>

<?php 
    class ShopController {
        public $model;
        public function __construct() {
            $this->model = new ShopModel();
        }
        public function getShopByIdDetailProduct($shopId) {
            $data = $this->model->getShopById($shopId);
            include_once "../../views/detailProduct/shop-view.php";
        }
        public function setShop($id, $name, $img, $address, $phoneNumber) {
            $result = $this->model->setShop($id, $name, $img, $address, $phoneNumber);
            include_once "../../views/shop/result-add-shop.php";
        }
    }
?>