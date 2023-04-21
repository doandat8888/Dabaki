<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../models/productSizeColorModel.php');
?>

<?php 
    class ProductSizeColorController {
        public $model;
        public function __construct() {
            $this->model = new ProductSizeColorModel();
        }
        public function getProductSizeColor($productQuantity, $productId, $sizeId, $colorId, $shopId) {
            $quantityBuy = $productQuantity;
            $data = $this->model->getProductSizeColor($productId, $sizeId, $colorId, $shopId);
            include "../../views/checkout/update-quantity-view.php";
        }

        public function updateQuantity($quantity, $productId, $sizeId, $colorId, $shopId) {
            $result =  $this->model->updateQuantity($quantity, $productId, $sizeId, $colorId, $shopId);
            include_once "../../views/checkout/result-update-quantity.php";
        }

        public function getProductSizeColorByShopIdLimit($shopId, $limit, $offset) {
            $data = $this->model->getProductSizeColorByShopIdLimit($shopId, $limit, $offset);
            include_once "../../views/admin/manage-product-view.php";
        }
    }
?>