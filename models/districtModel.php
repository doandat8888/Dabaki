<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../modules/db_module.php');
    include_once ($filepath. '/./district.php');
    include_once ($filepath. '/../validate_module.php');
    
    class DistrictModel {
        public function getDistrictByProvinceId($provinceId) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from quanhuyen WHERE matp = $provinceId";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $district = new District($rows["maqh"], $rows["name"], $rows["type"], $rows["matp"]);
                    array_push($data, $district);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }
    }
?>