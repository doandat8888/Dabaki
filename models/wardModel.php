<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../modules/db_module.php');
    include_once ($filepath. '/./ward.php');
    include_once ($filepath. '/../validate_module.php');
    
    class WardModel {
        public function getWardByDistrictId($districtId) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from xaphuongthitran WHERE maqh = $districtId";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $ward = new Ward($rows["xaid"], $rows["name"], $rows["type"], $rows["maqh"]);
                    array_push($data, $ward);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }
    }
?>