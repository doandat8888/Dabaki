<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../models/productSizeColorModel.php');
    include_once ($filepath. '/../models/productModel.php');
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

        public function getAllProductSizeColorPage($shopId) {
            $data = $this->model->getAllProductSizeColor($shopId);
            if($data != NULL) {
                $totalProducts = count($data);
            }
            include_once "../../views/admin/page-list-view.php";
        }

        public function getProductSizeColorByProId($productId, $shopId) {
            $data = $this->model->getProductSizeColorByProId($productId, $shopId);
            return $data;
        }

        public function getProductSizeColorByProIdLimit($productId, $shopId, $limit, $offset) {
            $data = $this->model->getProductSizeColorByProIdLimit($productId, $shopId, $limit, $offset);
            return $data;
        }

        public function showPageList($count) {
            if($count > 0) {
                $totalProducts = $count;
                include_once "../../views/admin/page-list-view.php";
            }
        }

        public function viewProduct($dataProductSizeColor) {
            $data = $dataProductSizeColor;
            include_once "../../views/admin/manage-product-view.php";
        }

        public function setProductSizeColor($productId, $sizeId, $colorId, $quantity, $shopId) {
            $count = 0;
            $result = NULL;
            $productSizeColorInfo = ['pro-size', 'pro-color', 'pro-quantity'];
            for($i = 0; $i < count($productSizeColorInfo); $i++) {
                if($_POST[$productSizeColorInfo[$i]] == '') {
                    $result = -1;
                    break;
                }else {
                    $count++;
                }
            }
            if($count == count($productSizeColorInfo)) {
                $resultInsert = $this->model->setProductSizeColor($productId, $sizeId, $colorId, $quantity, $shopId);
                if($resultInsert == true) {
                    $result = 0;
                }else if($resultInsert == false) {
                    $result = 1;
                }
            }
            include_once "../../views/admin/resultAdd.php";
        }

        public function viewProductSizeColorInfo($productSizeColorData, $productData, $sizeData, $colorData) {
            $productInfo = $productData;
            $sizeInfo = $sizeData;
            $colorInfo = $colorData;
            $productSizeColorInfo = $productSizeColorData;
            include_once "../../views/shop/update-product-size-color-view.php";
        }

        public function updateProductSizeColor($productSizeColorId, $productId, $sizeId, $colorId, $quantity, $shopId) {
            $count = 0;
            $result = NULL;
            $productSizeColorInfo = ['pro-size', 'pro-color', 'pro-quantity'];
            for($i = 0; $i < count($productSizeColorInfo); $i++) {
                if($_POST[$productSizeColorInfo[$i]] == '') {
                    $result = -1;
                    break;
                }else {
                    $count++;
                }
            }
            if($count == count($productSizeColorInfo)) {
                $resultUpdate = $this->model->updateProductSizeColor($productSizeColorId, $productId, $sizeId, $colorId, $quantity, $shopId);
                if($resultUpdate == true) {
                    $result = 0;
                }else if($resultUpdate == false) {
                    $result = 1;
                }
            }
            include_once "../../views/admin/resultEdit.php";
        }

        public function deleteProductSizeColor($idProSizeColor) {
            $result = $this->model->deleteProductSizeColor($idProSizeColor);
            include_once "../../views/admin/resultDelete.php";
        }

        public function getProductSizeColorByTypeLimitHome($type, $limit, $offset) {
            $data = $this->model->getProductSizeColorByTypeLimitHome($type, $limit, $offset);
            return $data;
        }
    }
?>