<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../modules/db_module.php');
    include_once ($filepath. '/./size.php');
    include_once ($filepath. '/../validate_module.php');
    
    class SizeModel {
        public function getAllSize() {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from sizes";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $size = new Size($rows["id"], $rows["name"]);
                    array_push($data, $size);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }

        public function getSizeById($sizeId) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from sizes WHERE id = $sizeId";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $size = new Size($rows["id"], $rows["name"]);
                    array_push($data, $size);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }

        public function getSizeByName($sizeName) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from sizes WHERE name = '$sizeName'";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $size = new Size($rows["id"], $rows["name"]);
                    array_push($data, $size);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }
    }
?>