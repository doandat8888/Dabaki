<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    </head>
    <body>
        <?php
            foreach ($data as $shop) {
                echo '
                    <div class="shop-view">
                        <div class="shop-view-header">
                            <span class="material-symbols-outlined shop-view-header-icon">
                                info
                            </span>
                            <p class="shop-view-header-title">Thông tin cửa hàng</p>
                        </div>
                        <div class="shop-view-body">
                            <div class="shop-view-body-left">
                                <img src="'.$shop->getImg().'" alt="" class="shop-img" />
                            </div>
                            <div class="shop-view-body-right">
                                <p class="shop-name">'.$shop->getName().'</p>
                                <p class="shop-address">'.$shop->getAddress().'</p>
                                <a href="../../views/detailShop/index.php?shopId=' . $shop->getId() . '">
                                    <button class="btn-view-shop">
                                        <span class="material-symbols-outlined btn-view-shop-icon">
                                            inventory_2
                                        </span>
                                        <p class="btn-view-shop-content">Sản phẩm</p>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                ';
                
            }
        ?>
        <div class="row products">
            <!--Filter-->    
            <div class="col-lg-3">
                <div class="d-lg-none filter-heading" id="filter-control">
                    Bộ lọc sản phẩm
                    <i class="fas fa-angle-down" id="filter-arrow" style="margin-left: 0.5rem;"></i>
                </div>

                <div class="filter container" style="text-align: center;">
                    <form action="#" method="get">
                        <!-- <select title="Size" class="selectpicker" name="size" id="size" multiple required>
                            <option value="s">S</option>
                            <option value="m">M</option>
                            <option value="l">L</option>
                            <option value="xl">XL</option>
                            <option value="xxl">XXL</option>
                        </select> -->

                        <!-- <div class="size-container filter">
                            <div class="filter-title">Size</div>
                            <div class="filter-item">
                                <input type="checkbox" class="filter-item-check pro-size" value="s" />  S
                            </div>
                            <div class="filter-item">
                                <input type="checkbox" class="filter-item-check pro-size" value="m" />  M
                            </div>
                            <div class="filter-item">
                                <input type="checkbox" class="filter-item-check pro-size" value="l" />  L
                            </div>
                            <div class="filter-item">
                                <input type="checkbox" class="filter-item-check pro-size" value="xl" />  XL
                            </div>
                            <div class="filter-item">
                                <input type="checkbox" class="filter-item-check pro-size" value="xxl" />  XXL
                            </div>
                        </div>-->
                        <!-- <select title="Màu sắc" class="selectpicker" name="color" id="color" multiple required>
                            <option value="yellow" style="color: var(--yellow);">Vàng</option>
                            <option value="green" style="color: var(--green);">Xanh lá</option>
                            <option value="pink" style="color: var(--pink);">Hồng</option>
                            <option value="red" style="color: var(--red);">Đỏ</option>
                            <option value="white" style="color: var(--white);">Trắng</option>
                            <option value="brown" style="color: var(--brown);">Nâu</option>
                            <option value="black" style="color: var(--black);">Đen</option>
                            <option value="orange" style="color: var(--orange);">Cam</option>
                            <option value="violet" style="color: var(--violet);">Tím</option>
                        </select> -->

                        <!-- <div class="color-container filter">
                            <div class="filter-title">Màu sắc</div>
                            <div class="filter-item">
                                <input type="checkbox" class="filter-item-check pro-color" value="yellow" />  Vàng
                            </div>
                            <div class="filter-item">
                                <input type="checkbox" class="filter-item-check pro-color" value="green" />  Xanh lá
                            </div>
                            <div class="filter-item">
                                <input type="checkbox" class="filter-item-check pro-color" value="pink" />  Hồng
                            </div>
                            <div class="filter-item">
                                <input type="checkbox" class="filter-item-check pro-color" value="red" />  Đỏ
                            </div>
                            <div class="filter-item">
                                <input type="checkbox" class="filter-item-check pro-color" value="white" />  Trắng
                            </div>
                            <div class="filter-item">
                                <input type="checkbox" class="filter-item-check pro-color" value="brown" />  Nâu
                            </div>
                            <div class="filter-item">
                                <input type="checkbox" class="filter-item-check pro-color" value="black" />  Đen
                            </div>
                            <div class="filter-item">
                                <input type="checkbox" class="filter-item-check pro-color" value="orange" />  Cam
                            </div>
                            <div class="filter-item">
                                <input type="checkbox" class="filter-item-check pro-color" value="gray" />  Xám
                            </div>
                        </div> -->

                        <?php 
                            if(isset($_GET['type'])){
                                echo "<input type='hidden' name='type' value='".$_GET['type']."'>";
                            }
                        ?>

                        <div class="category-container filter-content-first">
                            <div class="filter-title">Danh mục</div>
                            <input type="hidden" value=<?php echo $idShop?> name="shopId"/>
                            <?php 
                                include_once "../../controllers/categoryProductController.php";
                                $controller = new CategoryProductController();
                                $controller->getCategoryListFilter();
                            ?>
                        </div>

                        <!-- <select title="Mức giá" class="selectpicker" name="price" id="price" required>
                            <option value="less_1m">Dưới đ1.000.000</option>
                            <option value="1m-2m">đ1.000.000 - đ2.000.000</option>
                            <option value="2m-3.5m">đ2.000.000 - đ3.500.000</option>
                            <option value="3.5m-5m">đ3.500.000 - đ5.000.000</option>
                            <option value="more_5m">Trên đ5.000.000</option>
                        </select> -->
                        
                        <div class="price filter-content">
                            <!-- <div class="price-title">Khoảng giá</div>
                            <input type="hidden" name="hidden-minimum-price" value="0"></input>
                            <input type="hidden" name="hidden-maximum-price" value="10000000"></input>
                            <div id="price-show"></div>
                            <div id="price-range"></div> -->
                            <div class="price-title">Khoảng giá</div>
                            <p style="font-size: 12px; margin-top:1rem;">Dùng slider hoặc nhập giá trị vào</p>
                            <div class="price-input">
                                <div class="field">
                                    <input type="number" name="input-min" class="input-min" value="0">
                                </div>
                                <div class="separator"> đến </div>
                                <div class="field">
                                    <input type="number" name="input-max" class="input-max" value="10000000">
                                </div>
                            </div>
                            <div class="slider">
                                <div class="progress"></div>
                            </div>
                            <div class="range-input">
                                <input type="range" class="range-min" min="0" max="10000000" value="0" step="500000">
                                <input type="range" class="range-max" min="0" max="10000000" value="10000000" step="500000">
                            </div>
                            
                        </div>

                        <!-- <select title="Mức chiết khấu" class="selectpicker" name="discount" id="discount" required>
                            <-value="less_30">Dưới 30%</->
                            <option value="30-50">30% - 50%</option>
                            <option value="50-70">50% - 70%</option>
                            <option value="more_70">Trên 70%</option>
                            <option value="special">Giá đặc biệt</option>
                        </select> -->

                        <button type="submit" class="btn btn-black btnFilter" id="filterbutton">Lọc</button>
                        <!-- <?php 
                            // if (isset($_GET["type"])){
                            //     $type = $_GET["type"];
                            //     echo "<input type='hidden' name='type' value='".$type."'></input>";
                            // }else {
                            //     echo "<input type='hidden' name='type' value='-1'></input>";
                            // }
            
                            // if(isset($_GET["current-page"])) {
                            //     $currentPage = $_GET["current-page"];
                            //     echo "<input type='hidden' name='current-page' value='".$currentPage."'></input>";
                            // }else {
                            //     echo "<input type='hidden' name='current-page' value='1'></input>";
                            // }
            
                            // if(isset($_GET["size"])) {
                            //     $size = $_GET["size"];
                            //     if($size != '') {
                            //         echo "<input type='hidden' name='size' value='".$size."'></input>";
                            //     }else {
                            //         echo "<input type='hidden' name='size' value=''></input>";
                            //     }
                            // }
            
                            // if(isset($_GET["color"])) {
                            //     $color = $_GET["color"];
                            //     if($color != '') {
                            //         echo "<input type='hidden' name='color' value='".$color."'></input>";
                            //     }else {
                            //         echo "<input type='hidden' name='color' value=''></input>";
                            //     }
                            // }
            
                            // if(isset($_POST["category"])) {
                            //     $category = $_POST["category"];
                            //     if($category != '') {
                            //         echo "<input type='hidden' name='category' value='".$category."'></input>";
                            //     }else {
                            //         echo "<input type='hidden' name='category' value='-1'></input>";
                            //     }
                            // }else {
                            //     echo "<input type='hidden' name='category' value='-1'></input>";
                            // }
            
                            // if(isset($_GET["min-price"]) && $_GET["max-price"]) {
                            //     $minPrice = $_GET["min-price"]
                            //     $maxPrice = $_GET["max-price"];
                            //     if($minPrice != -1 && $maxPrice != -1) {
                            //         echo "<input type='hidden' name='minimum-price' value='".$minPrice."'></input>";
                            //         echo "<input type='hidden' name='maximum-price' value='".$maxPrice."'></input>";
                            //     }else {
                            //         echo "<input type='hidden' name='minimum-price' value='-1'></input>";
                            //         echo "<input type='hidden' name='maximum-price' value='-1'></input>";
                            //     }
                            // }else {
                            //     echo "<input type='hidden' name='minimum-price' value='-1'></input>";
                            //     echo "<input type='hidden' name='maximum-price' value='-1'></input>";
                            // }
                        ?> -->
                    </form>
                </div>
            </div>

            <!--NƠI HIỆN SẢN PHẨM + PHÂN TRANG-->
            <div class="col-12 col-lg-9">
                <div class='products' id='product-body'>          
                    <?php
                        require_once "../../controllers/productController.php";
                        $controller = new ProductController();
                        $controller->Display();
                    ?>
                </div>
            </div>

        </div>
        
    </body>
</html>

