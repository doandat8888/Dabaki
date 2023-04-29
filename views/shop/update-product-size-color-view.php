<?php 
    include_once "../../controllers/productController.php";
    include_once "../../controllers/categoryProductController.php";
    include_once "../../models/colorModel.php";
    include_once "../../models/sizeModel.php";
?>
<?php 
    $colorModel = new ColorModel();
    $sizeModel = new SizeModel();
    $arraycolor = $colorModel->getAllColor();
    $arraysize = $sizeModel->getAllSize();
    $proDes = $productInfo->getDescription();
    echo "
        <form method='post' action='./index.php?page=manage-product&id=".$productInfo->getId()."&idProductSizeColor=".$productSizeColorInfo->getId()."'>
            <div class='product-info-list col-12 d-flex'>
                <div class='product-info-item col-12 col-sm-6 col-lg-6'>
                    <div class='product-info-item-title'>Tên sản phẩm</div>
                    <input type='text' class='product-info-item-input' name='pro-name' value = '" . $productInfo->getName() . "' />
                </div>
                <div class='product-info-item col-12 col-sm-6 col-lg-6'>
                    <div class='product-info-item-title'>Màu sắc</div>
                    <select title='Chọn màu sắc' class='product-info-item-input' name='pro-color' id='color' required>
                        ";?>
                            <?php 
                                foreach ($arraycolor as $color) {
                                    if($color->getId() == $colorInfo->getId()) {
                                        $colorName = $colorInfo->getName();
                                        echo "<option value='".$colorInfo->getId()."' selected>$colorName</option>";
                                    }else {
                                        $colorName = $color->getName();
                                        echo "<option value='".$color->getId()."'>$colorName</option>";
                                    }
                                }
                            ?>
                            <?php 
                        echo "
                    </select>
                </div>
                <div class='product-info-item col-12 col-sm-6 col-lg-6'>
                    <div class='product-info-item-title'>Kích thước</div>
                    <select title='Chọn màu sắc' class='product-info-item-input' name='pro-size' id='size' required>
                        ";?>
                            <?php 
                                foreach ($arraysize as $size) {
                                    if($size->getId() == $sizeInfo->getId()) {
                                        $sizeName = $sizeInfo->getName();
                                        echo "<option value='".$sizeInfo->getId()."' selected>$sizeName</option>";
                                    }else {
                                        $sizeName = $size->getName();
                                        echo "<option value='".$size->getId()."'>$sizeName</option>";
                                    }
                                }
                            ?>
                            <?php 
                        echo "
                    </select>
                </div>
                <div class='product-info-item col-12 col-sm-6 col-lg-6'>
                    <div class='product-info-item-title'>Nhập giá</div>
                    <input type='text' class='product-info-item-input' name='pro-price' value=" . $productInfo->getPrice() . ">
                </div>
                <div class='product-info-item col-12 col-sm-6 col-lg-6'>
                    <div class='product-info-item-title'>Số lượng</div>
                    <input type='text' class='product-info-item-input' name='pro-quantity' value=" . $productSizeColorInfo->getQuantity() . ">
                </div>
                <div class='product-info-item col-12 col-sm-6 col-lg-12'>
                    <div class='product-info-item-title'>Mô tả</div>
                    <textarea class='product-info-item-input' name='pro-description'>$proDes</textarea>
                </div>
                <div class='product-info-item col-12 col-sm-6 col-lg-6'>
                    <div class='product-info-item-title'>Loại</div>
                    <select class='product-info-item-input' name='pro-type'>
                        ";?>
                            <?php
                                include_once "../../controllers/typeController.php";
                                $typeController = new TypeController();
                                $typeController->getTypeListUpdateProduct($productInfo->getType());
                            ?>
                        <?php 
                        echo "
                    </select>
                </div>
                <div class='product-info-item col-12 col-sm-6 col-lg-6'>
                    <div class='product-info-item-title'>Danh mục</div>
                    <select class='product-info-item-input' name='pro-category'>
                        ";?>
                            <?php
                            $categoryProductController = new CategoryProductController();
                            $categoryProductController->getCategoryByIdUpdateProduct($productInfo->getCategoryId()); 
                        ?>
                        <?php 
                        echo "
                    </select>' 
                </div>
                <div class='product-info-item col-12'>
                    <div class='product-info-item-title'>Link ảnh 1</div>
                    <input type='text' class='product-info-item-input' name='pro-img-01' value=" . $productInfo->getImage01() . ">
                </div>
                <div class='product-info-item col-12'>
                    <div class='product-info-item-title'>Link ảnh 2</div>
                    <input type='text' class='product-info-item-input' name='pro-img-02' value=" . $productInfo->getImage02() . ">
                </div>
            </div>
            <div class='footer'>
                <button class='edit action-btn' type='submit' name='edit-submit'>
                    Cập nhật
                </button>
                <a href='./index.php?page=manage-product'>
                    <button class='previous action-btn' type='submit'>Trở lại</button>
                </a>
            </div>
        </form>
    ";
?>