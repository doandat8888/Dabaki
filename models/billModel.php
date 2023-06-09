<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../modules/db_module.php');
    include_once ($filepath. '/./bill.php');
   
    class billModel{
        
        //Thêm mới
        function setBill($id, $cus_firstName, $cus_lastName, $email, $phoneNumber, $total, $address, $shop_id){
            $link = NULL;
            taoKetNoi($link);
            $query = "INSERT INTO `bill` (`id`, `cus_firstName`, `cus_lastName`, `email`, `phoneNumber`, `total`, `address`, `shop_id`, `status`) VALUES ('$id', '$cus_firstName', '$cus_lastName', '$email', '$phoneNumber', '$total', '$address', '$shop_id', 1)";
            $result = chayTruyVanKhongTraVeDL($link, $query);
            return $result;
        }

        public function getAllBill() {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $resultArr = [];
            //$resultArr[0] = $link;
            $data = array();
            $query = "SELECT * from bill";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $category = new Bill($rows["id"], $rows["cus_firstName"], $rows["cus_lastName"], $rows["email"], $rows['phoneNumber'], $rows['total'], $rows['address'], $rows["shop_id"], $rows['status']);
                    array_push($data, $category);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            //$resultArr[1] = $data;
            return $data;
        }

        public function getBillByLimit($limit, $offset) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from bill ORDER BY `id` ASC limit $limit OFFSET $offset";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $category = new Bill($rows["id"], $rows["cus_firstName"], $rows["cus_lastName"], $rows["email"], $rows['phoneNumber'], $rows['total'], $rows['address'], $rows['shop_id'], $rows['status']);
                    array_push($data, $category);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }

        public function getBillByShopId($shopId) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $resultArr = [];
            //$resultArr[0] = $link;
            $data = array();
            $query = "SELECT * from bill WHERE shop_id = $shopId";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $category = new Bill($rows["id"], $rows["cus_firstName"], $rows["cus_lastName"], $rows["email"], $rows['phoneNumber'], $rows['total'], $rows['address'], $rows["shop_id"], $rows['status']);
                    array_push($data, $category);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            //$resultArr[1] = $data;
            return $data;
        }
    }
?>