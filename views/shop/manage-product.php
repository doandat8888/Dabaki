<!-- <div class="manage-product-page">
    <div class="title">Quản lí sản phẩm</div>
    <div class="body">
        
    </div>
</div> -->
<?php 
    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = 'đ') {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }

    if(isset($_SESSION['shop_id'])) {
        $shopId = $_SESSION['shop_id'];
    }
?>


<div class="manage-product-page">
    <!-- Modal -->
    <form method="post" action="./index.php?page=manage-product">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog col-12" role="document">
                <div class="modal-content col-12 col-sm-12 col-lg-12">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="product-info-list col-12 d-flex">
                            <div class="name-checkbox col-6 d-flex">
                                <input type="radio" id="not_have_product" name="name_product_checkbox" value="0" checked/>
                                <p class="name-checkbox-txt">Chưa có sản phẩm cùng tên</p>
                            </div>
                            <div class="name-checkbox col-6 d-flex">
                                <input type="radio" id="have_product" name="name_product_checkbox" value="1"/>
                                <p class="name-checkbox-txt">Đã có sản phẩm cùng tên</p>
                            </div>
                            <div class="product-info-item col-12 col-sm-12 col-lg-12" id="not_have_product_name">
                                <div class="product-info-item-title">Tên sản phẩm</div>
                                <input type="text" placeholder="Nhập tên sản phẩm" class="product-info-item-input" name="pro-name">
                            </div>
                            <div class="product-info-item col-12 col-sm-12 col-lg-12" style="display:none" id="have_product_name">
                                <div class="product-info-item-title">Tên sản phẩm</div>
                                <!-- <input type="text" placeholder="Nhập màu sắc" class="product-info-item-input" name="pro-color"> -->
                                <select class="product-info-item-input" name="pro-name-have">
                                    <option value="-1">Chọn sản phẩm</option>
                                    <?php 
                                        include_once "../../controllers/productController.php";
                                        $controller = new ProductController();
                                        $controller->getAllProductManageProductShop($shopId);
                                    ?>
                                </select>
                            </div>
                            <div class="product-info-item col-12 col-sm-12 col-lg-6" id="product_color">
                                <div class="product-info-item-title">Màu sắc</div>
                                <!-- <input type="text" placeholder="Nhập màu sắc" class="product-info-item-input" name="pro-color"> -->
                                <select class="product-info-item-input" name="pro-color">
                                    <option value="-1">Chọn màu sắc</option>
                                    <?php 
                                        include_once "../../controllers/colorController.php";
                                        $controller = new ColorController();
                                        $controller->getAllColorManageProduct();
                                    ?>
                                </select>
                            </div>
                            <div class="product-info-item col-12 col-sm-12 col-lg-6" id="product_size">
                                <div class="product-info-item-title">Kích thước</div>
                                <select class="product-info-item-input" name="pro-size">
                                    <option value="-1">Chọn kích thước</option>
                                    <?php 
                                        include_once "../../controllers/sizeController.php";
                                        $controller = new SizeController();
                                        $controller->getAllSizeManageProduct();
                                    ?>
                                </select>
                            </div>
                            <div class="product-info-item col-12 col-sm-12 col-lg-6" id="product_price">
                                <div class="product-info-item-title">Nhập giá</div>
                                <input type="text" placeholder="Nhập giá" class="product-info-item-input" name="pro-price">
                            </div>
                            <div class="product-info-item col-12 col-sm-12 col-lg-6" id="product_quantity">
                                <div class="product-info-item-title">Nhập số lượng</div>
                                <input type="text" placeholder="Nhập số lượng" class="product-info-item-input" name="pro-quantity">
                            </div>
                            <div class="product-info-item col-12 col-sm-12 col-lg-12" id="product_description">
                                <div class="product-info-item-title">Mô tả</div>
                                <textarea type="text" placeholder="Nhập mô tả" class="product-info-item-input" name="pro-description"></textarea>
                            </div>
                            <div class="product-info-item col-12 col-sm-12 col-lg-6" id="product_type">
                                <div class="product-info-item-title">Loại</div>
                                <select class="product-info-item-input" name="pro-type">
                                    <option value="-1">Chọn loại</option>
                                    <?php 
                                        include "../../controllers/typeController.php";
                                        $controller = new TypeController();
                                        $controller->getTypeListManageProduct();
                                    ?>
                                </select>
                            </div>
                            <div class="product-info-item col-12 col-sm-12 col-lg-6" id="product_category">
                                <div class="product-info-item-title">Danh mục</div>
                                <select class="product-info-item-input" name="pro-category">
                                    <option value="-1">Chọn danh mục</option>
                                    <?php 
                                        include "../../controllers/categoryProductController.php";
                                        $controller = new CategoryProductController();
                                        $controller->getCategoryListManageProduct();
                                    ?>
                                    
                                </select>
                            </div>
                            <div class="product-info-item col-12" id="product_img_01">
                                <div class="product-info-item-title">Link ảnh 1</div>
                                <input type="text" placeholder="Nhập link ảnh 1" class="product-info-item-input" name="pro-img-01">
                            </div>
                            <div class="product-info-item col-12" id="product_img_02">
                                <div class="product-info-item-title">Link ảnh 2</div>
                                <input type="text" placeholder="Nhập link ảnh 2" class="product-info-item-input" name="pro-img-02">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" name="add-submit">Thêm</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <div class="title">Quản lí sản phẩm</div>
    <div class="search-add col-12 d-flex">
        <form class="search col-8" method="post" action="./index.php?page=manage-product">
            <input type="text" class="search-input" placeholder="Nhập từ khóa..." name="keyword" onchange="searchProduct(this.value)"/>
            <!-- <a href="../../views/admin/index.php?page=manage-product"> -->
            <button type="submit" class="search-btn" name="search-submit">
                <span class="material-symbols-outlined search-icon">
                    search
                </span>
            </button>
            <!-- </a> -->
        </form>
        <button class="add-btn col-2" data-toggle="modal" data-target="#addModal">
            <span class="material-symbols-outlined add-icon">
                add
            </span>
            Thêm
        </button>
    </div>
    <div class="manage-product-body">
        <table class="manage-product-table table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col-1">ID sản phẩm</th>
                    <th scope="col-2">Hình ảnh</th>
                    <th scope="col-2">Tên sản phẩm</th>
                    <th scope="col-2">Giá</th>
                    <th scope="col-1">Màu sắc</th>
                    <th scope="col-1">Kích thước</th>
                    <th scope="col-1">Số lượng</th>
                    <th scope="col-2">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include_once "../../controllers/productController.php";
                    include_once "../../controllers/productSizeColorController.php";
                    include_once "../../models/productModel.php";
                    include_once "../../models/productSizeColorModel.php";
                    $controller = new ProductController();
                    $productSizeColorController = new ProductSizeColorController();
                    $productModel = new ProductModel();
                    $productData = $productModel->getAllProduct();
                    
                    $productSizeColorModel = new ProductSizeColorModel();
                    //$controller->getAllProduct();
                    
                    
                    if(isset($_POST['add-submit'])) {
                        $nameProductChxBoxValue = $_POST['name_product_checkbox'];
                        if($nameProductChxBoxValue == 0) {
                            $productId = count($productData) + 1;
                            $name = $_POST['pro-name'];
                            $color = $_POST['pro-color'];
                            $size = $_POST['pro-size'];
                            $price = $_POST['pro-price'];
                            $quantity = $_POST['pro-quantity'];
                            $type = $_POST['pro-type'];
                            $description = $_POST['pro-description'];
                            $categoryId = $_POST['pro-category'];
                            $image01 = $_POST['pro-img-01'];
                            $image02 = $_POST['pro-img-02'];
                            $controller->setProduct($productId, $name, $price, $type, $description, $categoryId, $image01, $image02, $shopId);
                            $productSizeColorController->setProductSizeColor($productId, $size, $color, $quantity, $shopId);
                        }else {
                            $productId = $_POST['pro-name-have'];
                            $productData = $productModel->getProductByIdAndShopId($productId, $shopId);
                            $name = $productData[0]->getName();
                            $color = $_POST['pro-color'];
                            $size = $_POST['pro-size'];
                            //$price = $_POST['pro-price'];
                            $quantity = $_POST['pro-quantity'];
                            // $type = $_POST['pro-type'];
                            // $description = $_POST['pro-description'];
                            // $categoryId = $_POST['pro-category'];
                            // $image01 = $_POST['pro-img-01'];
                            // $image02 = $_POST['pro-img-02'];
                            $productSizeColorController->setProductSizeColor($productId, $size, $color, $quantity, $shopId);
                        }
                    }
                    
                    if(isset($_POST['edit-submit'])) {
                        if(isset($_GET['id']) && isset($_GET['idProductSizeColor'])) {
                            $id = $_GET['id'];
                            $idProductSizeColor = $_GET['idProductSizeColor'];
                            $name = $_POST['pro-name'];
                            $color = $_POST['pro-color'];
                            $size = $_POST['pro-size'];
                            $price = $_POST['pro-price'];
                            $quantity = $_POST['pro-quantity'];
                            $type = $_POST['pro-type'];
                            $description = $_POST['pro-description'];
                            $categoryId = $_POST['pro-category'];
                            $image01 = $_POST['pro-img-01'];
                            $image02 = $_POST['pro-img-02'];
                            $controller->updateProduct($id, $name, $price, $type, $description, $categoryId, $image01, $image02, $shopId);
                            $productSizeColorController->updateProductSizeColor($idProductSizeColor, $id, $size, $color, $quantity, $shopId);
                        }
                    }
                    

                    if(isset($_GET['action'])) {
                        if($_GET['action'] == 'delete') {
                            if(isset($_GET['id']) && isset($_GET['idProSizeColor'])) {
                                $id = $_GET['id'];
                                $idProSizeColor = $_GET['idProSizeColor'];
                                $controller = new ProductController();
                                $productSizeColorController->deleteProductSizeColor($idProSizeColor);
                                $dataProductSizeColor = $productSizeColorModel->getProductSizeColorByProId($id, $shopId);
                                if($dataProductSizeColor == NULL) {
                                    $controller->deleteProduct($id);
                                }
                            }
                        }
                    }

                    $currentPage = 0;
                    if(isset($_POST['page-submit'])) {
                        $currentPage = $_POST['page-submit'];
                    }else {
                        $currentPage = 1;
                    }
                    $limit = 4;
                    $offset = ($currentPage - 1) * $limit;
                    $keyword = "";
                    $data = [];
                    if(isset($_POST['search-submit'])) {
                        if(isset($_SESSION['keyword'])) {
                            if(isset($_POST['keyword'])) {
                                $keyword = $_POST['keyword'];
                                unset($_SESSION['keyword']);
                                $_SESSION['keyword'] = $keyword;
                            }else {
                                $keyword = $_SESSION['keyword'];
                            }
                        }else {
                            if(isset($_POST['keyword'])) {
                                $keyword = $_POST['keyword'];
                                $_SESSION['keyword'] = $keyword;
                            }
                        }
                        $productData = $productModel->getProductByName($shopId, $keyword);
                        if($productData != NULL) {
                            foreach($productData as $product) {
                                $productSizeColorData = $productSizeColorModel->getProductSizeColorByProIdLimit($product->getId(), $shopId, $limit, $offset);
                                foreach($productSizeColorData as $productSizeColor) {
                                    array_push($data, $productSizeColor);
                                }
                            }
                            $productSizeColorController->viewProduct($data);
                        }
                        
                    }else {
                        if(isset($_SESSION['keyword'])) {
                            if(isset($_POST['keyword'])) {
                                $keyword = $_POST['keyword'];
                                unset($_SESSION['keyword']);
                                $_SESSION['keyword'] = $keyword;
                                //$controller->getProductByNameLimit($keyword, $limit, $offset);
                                $productData = $productModel->getProductByName($shopId, $keyword);
                                if($productData != NULL) {
                                    foreach($productData as $product) {
                                        $productSizeColorData = $productSizeColorModel->getProductSizeColorByProIdLimit($product->getId(), $shopId, $limit, $offset);
                                        foreach($productSizeColorData as $productSizeColor) {
                                            array_push($data, $productSizeColor);
                                        }
                                    }
                                    $productSizeColorController->viewProduct($data);
                                }
                            }else {
                                if(isset($_POST['page-submit'])) {
                                    $keyword = $_SESSION['keyword'];
                                    //$controller->getProductByNameLimit($keyword, $limit, $offset);
                                    $productData = $productModel->getProductByName($shopId, $keyword);
                                    if($productData != NULL) {
                                        foreach($productData as $product) {
                                            $productSizeColorData = $productSizeColorModel->getProductSizeColorByProIdLimit($product->getId(), $shopId, $limit, $offset);
                                            foreach($productSizeColorData as $productSizeColor) {
                                                array_push($data, $productSizeColor);
                                            }
                                        }
                                        $productSizeColorController->viewProduct($data);
                                    }
                                }else {
                                    unset($_SESSION['keyword']);
                                    $productSizeColorController->getProductSizeColorByShopIdLimit($shopId, $limit, $offset);
                                }
                            }
                        }else {
                            if(isset($_POST['keyword'])) {
                                $keyword = $_POST['keyword'];
                                $_SESSION['keyword'] = $keyword;
                                //$controller->getProductByNameLimit($keyword, $limit, $offset);
                                $productData = $productModel->getProductByName($shopId, $keyword);
                                if($productData != NULL) {
                                    foreach($productData as $product) {
                                        $productSizeColorData = $productSizeColorModel->getProductSizeColorByProIdLimit($product->getId(), $shopId, $limit, $offset);
                                        foreach($productSizeColorData as $productSizeColor) {
                                            array_push($data, $productSizeColor);
                                        }
                                    }
                                    $productSizeColorController->viewProduct($data);
                                }
                            }else {
                                $productSizeColorController->getProductSizeColorByShopIdLimit($shopId, $limit, $offset);
                            }
                        }
                    }
                    // if($data != NULL) {
                        
                    // }else {
                    //     echo "Không có sản phẩm nào được tìm thấy. Vui lòng thử lại";
                    // }
                    
                ?>
            </tbody>
        </table>
        <div class="page-list">
            <?php
                include_once "../../controllers/productSizeColorController.php";
                include_once "../../models/productModel.php";
                include_once "../../models/productSizeColorModel.php";
                $controller = new ProductSizeColorController();
                $productModel = new ProductModel();
                $productSizeColorModel = new ProductSizeColorModel();
                $name = "";
                if(isset($_POST['search-submit'])) {
                    if(isset($_POST['keyword'])) {
                        $name = $_POST['keyword'];
                        $productData = $productModel->getProductByName($shopId, $name);
                        $countPage = 0;
                        if($productData != NULL) {
                            foreach($productData as $product) {
                                $productSizeColorData = $productSizeColorModel->getProductSizeColorByProId($product->getId(), $shopId);
                                $countPage += count($productSizeColorData);
                            }
                            $controller->showPageList($countPage);
                        }
                    }
                }else {
                    if(isset($_SESSION['keyword'])) {
                        $name = $_SESSION['keyword'];
                        $productData = $productModel->getProductByName($shopId, $name);
                        $countPage = 0;
                        if($productData != NULL) {
                            foreach($productData as $product) {
                                $productSizeColorData = $productSizeColorModel->getProductSizeColorByProId($product->getId(), $shopId);
                                $countPage += count($productSizeColorData);
                            }
                            $controller->showPageList($countPage);
                        }

                    }else {
                        $controller->getAllProductSizeColorPage($shopId);
                    }
                }
            ?>
        </div>
    </div>
</div>


