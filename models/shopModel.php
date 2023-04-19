<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../modules/db_module.php');
    include_once ($filepath. '/./shop.php');
    include_once ($filepath. '/../validate_module.php');
    
    class ShopModel {
        public function getAllShop() {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from shops WHERE `status` = 1";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $shop = new Shop($rows["id"], $rows["name"], 
                    $rows["img"], $rows["address"], $rows["status"]); 
                    array_push($data, $shop);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }

        public function getShopById($shopId) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from shops WHERE `status` = 1 AND `id` = '$shopId'";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $shop = new Shop($rows["id"], $rows["name"], 
                    $rows["img"], $rows["address"], $rows["status"]); 
                    array_push($data, $shop);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }
    }
?>