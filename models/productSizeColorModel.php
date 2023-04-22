<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../modules/db_module.php');
    include_once ($filepath. '/./productSizeColor.php');
    include_once ($filepath. '/./sizeModel.php');
    include_once ($filepath. '/./colorModel.php');
    include_once ($filepath. '/../validate_module.php');
    
    class ProductSizeColorModel {
        public function getAllSizeProduct($productId) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT DISTINCT size_id FROM productsizecolor WHERE product_id = $productId";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $sizeId = $rows['size_id'];
                    $sizeModel = new SizeModel();
                    $sizeData = $sizeModel->getSizeById($sizeId);
                    array_push($data, $sizeData[0]);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }

        public function getAllColorProduct($productId) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT DISTINCT color_id FROM productsizecolor WHERE product_id = $productId";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $colorId = $rows['color_id'];
                    $colorModel = new ColorModel();
                    $colorData = $colorModel->getColorById($colorId);
                    array_push($data, $colorData[0]);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }

        public function getProductSizeColor($productId, $sizeId, $colorId, $shopId) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * FROM productsizecolor WHERE product_id = $productId AND size_id = $sizeId AND color_id = $colorId AND shop_id = $shopId";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $productSizeColor = new ProductSizeColor($rows["product_id"], $rows["size_id"], $rows["color_id"], $rows["quantity"], $rows["shop_id"]);
                    array_push($data, $productSizeColor);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }

        public function updateQuantity($quantity, $productId, $sizeId, $colorId, $shopId) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $query = "UPDATE productsizecolor SET `quantity` = $quantity WHERE product_id = $productId AND size_id = $sizeId AND color_id = $colorId AND shop_id = $shopId";
            $updateResult = chayTruyVanKhongTraVeDL($link, $query);
            if($updateResult) {
                $result = true;
            }
            return $result;
        }

        public function getProductSizeColorByShopIdLimit($shopId, $limit, $offset) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from productsizecolor WHERE shop_id = $shopId limit $limit OFFSET $offset";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $productSizeColor = new ProductSizeColor($rows["product_id"], $rows["size_id"], $rows["color_id"], $rows["quantity"], $rows["shop_id"]);
                    array_push($data, $productSizeColor);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }

        public function getAllProductSizeColor($shopId) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from productsizecolor WHERE shop_id = $shopId";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $productSizeColor = new ProductSizeColor($rows["product_id"], $rows["size_id"], $rows["color_id"], $rows["quantity"], $rows["shop_id"]);
                    array_push($data, $productSizeColor);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }

        public function getProductSizeColorByProId($productId, $shopId) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * FROM productsizecolor WHERE product_id = $productId AND shop_id = $shopId";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $productSizeColor = new ProductSizeColor($rows["product_id"], $rows["size_id"], $rows["color_id"], $rows["quantity"], $rows["shop_id"]);
                    array_push($data, $productSizeColor);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }

        public function getProductSizeColorByProIdLimit($productId, $shopId, $limit, $offset) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * FROM productsizecolor WHERE product_id = $productId AND shop_id = $shopId limit $limit OFFSET $offset";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $productSizeColor = new ProductSizeColor($rows["product_id"], $rows["size_id"], $rows["color_id"], $rows["quantity"], $rows["shop_id"]);
                    array_push($data, $productSizeColor);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }
    }
?>