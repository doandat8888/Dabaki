<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../modules/db_module.php');
    include_once ($filepath. '/./product.php');
    include_once ($filepath. '/../validate_module.php');
    
    class ProductModel {
        public function getAllProduct() {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from products WHERE `status` = 1";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $product = new Product($rows["id"], $rows["name"], $rows["price"], 
                    $rows["type"], $rows["description"], $rows["category_id"], $rows["image01"], 
                    $rows["image02"], $rows["status"], $rows["shop_id"]);
                    array_push($data, $product);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }

        public function getProductByShopId($shopId) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from products WHERE `status` = 1 AND `shop_id` = $shopId";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $product = new Product($rows["id"], $rows["name"], $rows["price"], 
                    $rows["type"], $rows["description"], $rows["category_id"], $rows["image01"], 
                    $rows["image02"], $rows["status"], $rows["shop_id"]);
                    array_push($data, $product);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }

        public function getAllProductByLimit($limit, $offset) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from products ORDER BY `id` ASC limit $limit OFFSET $offset";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $product = new Product($rows["id"], $rows["name"], $rows["price"], $rows["type"], $rows["description"], $rows["category_id"], $rows["image01"], $rows["image02"], $rows["status"], $rows["shop_id"]);
                    array_push($data, $product);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }

        public function getAllProductByShopIdLimit($shopId, $limit, $offset) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from products  WHERE `shop_id` = $shopId ORDER BY `id` ASC limit $limit OFFSET $offset";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $product = new Product($rows["id"], $rows["name"], $rows["price"], $rows["type"], $rows["description"], $rows["category_id"], $rows["image01"], $rows["image02"], $rows["status"], $rows["shop_id"]);
                    array_push($data, $product);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }

        public function setProduct($id, $name, $price, $type, $description, $categoryId, $image01, $image02, $shopId) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            if(existsNameProduct($link, $name)) {
                giaiPhongBoNho($link, true);
                $result = false;
            }else {
                $query = "INSERT INTO `products` (`id`, `name`, `price`, `type`, `description`, `category_id`, `image01`, `image02`, `shop_id`, `status`) VALUES ('$id', '$name', '$price', '$type', '$description', '$categoryId', '$image01', '$image02', '$shopId', 1)";
                $setProduct = chayTruyVanKhongTraVeDL($link, $query);
                if($setProduct) {
                    $result = true;
                }
            }
            return $result;
        }  

        public function getProductByType($type) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from products WHERE `type` = $type";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $product = new Product($rows["id"], $rows["name"], $rows["price"], $rows["type"], $rows["description"], $rows["category_id"], $rows["image01"], $rows["image02"], $rows["status"], $rows["shop_id"]);
                    array_push($data, $product);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        } 

        public function getProductByTypeLimit($type, $limit, $offset) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from products WHERE `type` = '$type' ORDER BY `id` ASC limit $limit OFFSET $offset";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $product = new Product($rows["id"], $rows["name"], $rows["price"], $rows["type"], $rows["description"], $rows["category_id"], $rows["image01"], $rows["image02"], $rows["status"], $rows["shop_id"]);
                    array_push($data, $product);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        } 

        public function getProductByName($shopId, $searchstr){
            $result = null;
            $link = null;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * FROM products WHERE `name` LIKE '%$searchstr%' AND `shop_id` = $shopId";
            $result = chayTruyVanTraVeDL($link, $query);
            if (mysqli_num_rows($result) > 0){
                while ($rows = mysqli_fetch_assoc($result)){
                    $product = new Product($rows["id"], $rows["name"], $rows["price"], $rows["type"], 
                    $rows["description"], $rows["category_id"], $rows["image01"], 
                    $rows["image02"], $rows["status"], $rows["shop_id"]);
                    array_push($data, $product);
                }
                giaiPhongBoNho($link, $result);
            }
            else {
                $data = null;
            }
            return $data;
        }

        public function getProductByNameSearch($searchstr){
            $result = null;
            $link = null;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * FROM products WHERE `name` LIKE '%$searchstr%'";
            $result = chayTruyVanTraVeDL($link, $query);
            if (mysqli_num_rows($result) > 0){
                while ($rows = mysqli_fetch_assoc($result)){
                    $product = new Product($rows["id"], $rows["name"], $rows["price"], $rows["type"], 
                    $rows["description"], $rows["category_id"], $rows["image01"], 
                    $rows["image02"], $rows["status"], $rows["shop_id"]);
                    array_push($data, $product);
                }
                giaiPhongBoNho($link, $result);
            }
            else {
                $data = null;
            }
            return $data;
        }

        public function getProductByNameProduct($name){
            $result = null;
            $link = null;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * FROM products WHERE `name` = '$name' ORDER BY `id` ASC";
            $result = chayTruyVanTraVeDL($link, $query);
            if (mysqli_num_rows($result) > 0){
                while ($rows = mysqli_fetch_assoc($result)){
                    $product = new Product($rows["id"], $rows["name"], $rows["price"], $rows["type"], 
                    $rows["description"], $rows["category_id"], $rows["image01"], 
                    $rows["image02"], $rows["status"], $rows["shop_id"]);
                    array_push($data, $product);
                }
                giaiPhongBoNho($link, $result);
            }
            else {
                $data = null;
            }
            return $data;
        }

        public function updateQuantity($quantity, $name) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $query = "UPDATE products SET `quantity` = $quantity WHERE `name` = '$name'";
            $updateResult = chayTruyVanKhongTraVeDL($link, $query);
            if($updateResult) {
                $result = true;
            }
            return $result;
        }


        public function getProductByNameLimit($name, $limit, $offset) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from products WHERE `name` LIKE '%$name%' ORDER BY `id` ASC limit $limit OFFSET $offset";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $product = new Product($rows["id"], $rows["name"], $rows["price"], $rows["type"], $rows["description"], $rows["category_id"], $rows["image01"], $rows["image02"], $rows["status"], $rows["shop_id"]);
                    array_push($data, $product);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        } 

        public function getProductById($id) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from products WHERE `id` = $id";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $product = new Product($rows["id"], $rows["name"], $rows["price"], $rows["type"], $rows["description"], $rows["category_id"], $rows["image01"], $rows["image02"], $rows["status"], $rows["shop_id"]);
                    array_push($data, $product);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }

        public function getProductByIdAndShopId($id, $shopId) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from products WHERE `id` = $id AND `shop_id` = $shopId";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $product = new Product($rows["id"], $rows["name"], $rows["price"], $rows["type"], $rows["description"], $rows["category_id"], $rows["image01"], $rows["image02"], $rows["status"], $rows["shop_id"]);
                    array_push($data, $product);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }

        public function deleteProduct($id) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $query = "UPDATE products SET `status`= 0 WHERE `id` = $id";
            $deleteuser = chayTruyVanKhongTraVeDL($link, $query);
            if($deleteuser) {
                $result = true;
            }else {
                $result = false;
            }
            include "../../views/admin/resultDelete.php";
        }

        public function updateProduct($id, $name, $price, $type, $description, $categoryId, $image01, $image02, $shopId) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $query = "UPDATE products SET `name`= '$name', `price` = '$price', `type` = $type, 
            `description` = '$description', category_id = $categoryId, 
            image01 = '$image01', image02 = '$image02' WHERE `id` = $id AND `shop_id` = $shopId";
            $updateProduct = chayTruyVanKhongTraVeDL($link, $query);
            if($updateProduct) {
                $result = true;
            }else {
                $result = false;
            }
            return $result;
        }

        public function filterProduct() {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from products WHERE `status` = 1 ";
            if(isset($_GET['input-min']) && isset($_GET['input-max'])) {
                $minimumPrice = $_GET['input-min'];
                $maximumPrice = $_GET['input-max'];
                $query .= "AND price BETWEEN $minimumPrice AND $maximumPrice ";
            }
            if(isset($_GET['category'])) {
                $categoryId = $_GET['category'];
                $category_filter = implode(",", $categoryId);
                $query .= "AND category_id IN ($category_filter)";
            }

            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $product = new Product($rows["id"], $rows["name"], $rows["price"], $rows["type"], $rows["description"], $rows["category_id"], $rows["image01"], $rows["image02"], $rows["status"], $rows["shop_id"]);
                    array_push($data, $product);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }

        public function filterProductByType($type) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from products WHERE `type` = $type ";
            if(isset($_GET['input-min']) && isset($_GET['input-max'])) {
                $minimumPrice = $_GET['input-min'];
                $maximumPrice = $_GET['input-max'];
                $query .= "AND price BETWEEN $minimumPrice AND $maximumPrice ";
            }
            if(isset($_POST['size'])) {
                $size = $_POST['size'];
                $size_filter = implode(", ", $size);
                $query .= "AND size LIKE '%$size_filter%' ";
            }

            if(isset($_POST['color'])) {
                $color = $_POST['color'];
                $color_filter = implode(", ", $color);
                $query .= "AND color LIKE '%$color_filter%' ";
            }

            if(isset($_GET['category'])) {
                $categoryId = $_GET['category'];
                $category_filter = implode(",", $categoryId);
                $query .= "AND category_id IN ($category_filter)";
            }

            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $product = new Product($rows["id"], $rows["name"], $rows["price"], $rows["type"], $rows["description"], $rows["category_id"], $rows["image01"], $rows["image02"], $rows["status"], $rows["shop_id"]);
                    array_push($data, $product);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }

        public function filterProductByLimit($limit, $offset) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from products  WHERE `status` = 1 ";
            if(isset($_GET['input-min']) && isset($_GET['input-max'])) {
                $minimumPrice = $_GET['input-min'];
                $maximumPrice = $_GET['input-max'];
                $query .= "AND price BETWEEN $minimumPrice AND $maximumPrice ";
            }
            if(isset($_POST['size'])) {
                $size = $_POST['size'];
                $size_filter = implode(", ", $size);
                $query .= "AND size LIKE '%$size_filter%' ";
            }

            if(isset($_POST['color'])) {
                $color = $_POST['color'];
                $color_filter = implode(", ", $color);
                $query .= "AND color LIKE '%$color_filter%' ";
            }

            if(isset($_GET['category'])) {
                $categoryId = $_GET['category'];
                $category_filter = implode(",", $categoryId);
                $query .= "AND category_id IN ($category_filter)";
            }

            $query .= "ORDER BY `id` ASC limit $limit OFFSET $offset";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $product = new Product($rows["id"], $rows["name"], $rows["price"], $rows["type"], $rows["description"], $rows["category_id"], $rows["image01"], $rows["image02"], $rows["status"], $rows["shop_id"]);
                    array_push($data, $product);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }

        public function filterProductByTypeLimit($type, $limit, $offset) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from products WHERE `type` = $type ";
            if(isset($_GET['input-min']) && isset($_GET['input-max'])) {
                $minimumPrice = $_GET['input-min'];
                $maximumPrice = $_GET['input-max'];
                $query .= "AND price BETWEEN $minimumPrice AND $maximumPrice ";
            }
            if(isset($_POST['size'])) {
                $size = $_POST['size'];
                $size_filter = implode(", ", $size);
                $query .= "AND size LIKE '%$size_filter%' ";
            }

            if(isset($_POST['color'])) {
                $color = $_POST['color'];
                $color_filter = implode(", ", $color);
                $query .= "AND color LIKE '%$color_filter%' ";
            }

            if(isset($_GET['category'])) {
                $categoryId = $_GET['category'];
                $category_filter = implode(",", $categoryId);
                $query .= "AND category_id IN ($category_filter)";
            }

            $query .= "ORDER BY `id` ASC limit $limit OFFSET $offset";

            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $product = new Product($rows["id"], $rows["name"], $rows["price"], $rows["type"], $rows["description"], $rows["category_id"], $rows["image01"], $rows["image02"], $rows["status"], $rows["shop_id"]);
                    array_push($data, $product);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }

        public function filterProductByLimitShop($limit, $offset, $shopId) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from products  WHERE `status` = 1 AND shop_id = $shopId ";
            if(isset($_GET['input-min']) && isset($_GET['input-max'])) {
                $minimumPrice = $_GET['input-min'];
                $maximumPrice = $_GET['input-max'];
                $query .= "AND price BETWEEN $minimumPrice AND $maximumPrice ";
            }
            if(isset($_POST['size'])) {
                $size = $_POST['size'];
                $size_filter = implode(", ", $size);
                $query .= "AND size LIKE '%$size_filter%' ";
            }

            if(isset($_POST['color'])) {
                $color = $_POST['color'];
                $color_filter = implode(", ", $color);
                $query .= "AND color LIKE '%$color_filter%' ";
            }

            if(isset($_GET['category'])) {
                $categoryId = $_GET['category'];
                $category_filter = implode(",", $categoryId);
                $query .= "AND category_id IN ($category_filter)";
            }

            $query .= " ORDER BY `id` ASC limit $limit OFFSET $offset";
            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $product = new Product($rows["id"], $rows["name"], $rows["price"], $rows["type"], $rows["description"], $rows["category_id"], $rows["image01"], $rows["image02"], $rows["status"], $rows["shop_id"]);
                    array_push($data, $product);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }

        public function filterProductByTypeLimitShop($type, $limit, $offset, $shopId) {
            $result = NULL;
            $link = NULL;
            taoKetNoi($link);
            $data = array();
            $query = "SELECT * from products WHERE `type` = $type AND `status` = 1 AND shop_id = $shopId";
            if(isset($_GET['input-min']) && isset($_GET['input-max'])) {
                $minimumPrice = $_GET['input-min'];
                $maximumPrice = $_GET['input-max'];
                $query .= "AND price BETWEEN $minimumPrice AND $maximumPrice ";
            }
            if(isset($_POST['size'])) {
                $size = $_POST['size'];
                $size_filter = implode(", ", $size);
                $query .= "AND size LIKE '%$size_filter%' ";
            }

            if(isset($_POST['color'])) {
                $color = $_POST['color'];
                $color_filter = implode(", ", $color);
                $query .= "AND color LIKE '%$color_filter%' ";
            }

            if(isset($_GET['category'])) {
                $categoryId = $_GET['category'];
                $category_filter = implode(",", $categoryId);
                $query .= "AND category_id IN ($category_filter)";
            }

            $query .= "ORDER BY `id` ASC limit $limit OFFSET $offset";

            $result = chayTruyVanTraVeDL($link, $query);
            if(mysqli_num_rows($result) > 0) {
                while($rows = mysqli_fetch_assoc($result)) {
                    $product = new Product($rows["id"], $rows["name"], $rows["price"], $rows["type"], $rows["description"], $rows["category_id"], $rows["image01"], $rows["image02"], $rows["status"], $rows["shop_id"]);
                    array_push($data, $product);
                }
                giaiPhongBoNho($link, $result);
            }else{
                $data = NULL;
            }
            return $data;
        }
    }    
?>

