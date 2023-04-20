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
    }
?>