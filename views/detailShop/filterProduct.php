<div class="product-filter d-flex">
    <?php 
        include_once "../../controllers/productController.php";
        $controller = new ProductController();
        $currentPage = isset($_GET['current-page'])?$_GET['current-page'] : 1;
        $limit = 4;
        $offset = ($currentPage - 1) * $limit;
        $totalPages = 0;
        if (isset($type)){
            if(isset($_GET["shopId"])) {
                $shopId = $_GET["shopId"];
                if($type != -1) {
                    $controller->filterProductByTypeLimitShop($type, $limit, $offset, $shopId);
                }
            }else {
                if($type != -1) {
                    $controller->filterProductByTypeLimit($type, $limit, $offset);
                }
            }
            
        }
        else{
            if(isset($_GET["shopId"])) {
                $shopId = $_GET["shopId"];
                $controller->filterProductByLimitShop($limit, $offset, $shopId);
            }else {
                $controller->filterProductByLimit($limit, $offset);
            }
        }
    ?>
</div>

<div class="page-list">
    <?php
        //$limit = 4;
        $size_filter = '';
        $color_filter = '';
        $querystring = '';
        //$currentPage = isset($_GET['current-page'])?$_GET['current-page']:1;
        if(isset($_POST['size'])) {
            $size = $_POST['size'];
            $size_filter = implode("','", $size);
            //array_push($arrInfo, $size);
        }
        if(isset($_POST['color'])) {
            $color = $_POST['color'];
            $color_filter = implode("','", $color);
        }


        if(isset($_GET['category'])) {
            if(isset($_GET["shopId"])) {
                $shopId = $_GET["shopId"];
                $category = $_GET['category'];
                $category_filter = implode("", $category);
                for($i = 0; $i < strlen($category_filter); $i++){
                    $querystring .= "&shopId=$shopId&category%5B%5D=".$category_filter[$i];
                    
                }
            }else {
                $category = $_GET['category'];
                $category_filter = implode("", $category);
                for($i = 0; $i < strlen($category_filter); $i++){
                    $querystring .= "category%5B%5D=".$category_filter[$i];
                }
            }
           
        }

        if(isset($_GET['input-min']) && isset($_GET['input-max'])) {
            $minPrice = $_GET['input-min'];
            $maxPrice = $_GET['input-max'];
            $querystring .= "&input-min=$minPrice&input-max=$maxPrice";
        }

        $_SESSION['querystring'] = $querystring;

        if(isset($type)){ 
            if($type != -1) { // Page list nếu có type
                if(isset($_GET['category']) || isset($_GET['input-min']) || isset($_GET['input-max'])){
                    $controller->filterProductByTypePage($querystring, $type);
                }else {
                    $controller->getProductByTypePage($querystring, $type);
                }
            }
        }
        else { // Page list nếu ko có type
            if(isset($_GET["shopId"])) {
                $shopId = $_GET["shopId"];
                if(isset($_GET['category']) || isset($_GET['input-min']) || isset($_GET['input-max'])){
                    $controller->filterProduct($querystring);
                }else {
                    $controller->getProductByShopIdFilterPage($querystring, $shopId);
                }
            }else {
                if(isset($_GET['category']) || isset($_GET['input-min']) || isset($_GET['input-max'])){
                    $controller->filterProduct($querystring);
                }else {
                    $controller->getAllProductFilterPage($querystring);
                }
            }
        }
    ?>
</div> 