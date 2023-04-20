<?php
    include_once "../../controllers/billDetailController.php";
    include_once "../../controllers/productSizeColorController.php";
    include_once "../../models/colorModel.php";
    include_once "../../models/sizeModel.php";
    include_once "../../models/productModel.php";
    $detailBillController = new BillDetailController();
    $productController = new ProductController();
    $colorModel = new ColorModel();
    $sizeModel = new SizeModel();
    $productSizeColorController = new ProductSizeColorController();
    if ($result == true){
        echo "<script type='text/javascript'>alert('Thêm hóa đơn thành công');</script>";
        if(isset($_SESSION['cart'])&&(is_array($_SESSION['cart']))){
            if(count($_SESSION['cart']) > 0){
                foreach ($_SESSION['cart'] as $prod) : extract($prod) ?>
                    <?php
                        $productModel = new ProductModel();
                        $productData = $productModel->getProductById($prod_id);
                        $shopId = $productData[0]->getShopId();
                        $detailBillController->setBillDetail($billId, $prod_name, $prod_quantity, $prod_color, rtrim(strtolower($prod_size)), $prod_price, $shopId);
                        $sizeProduct = strtolower($prod_size);
                        $sizeData = $sizeModel->getSizeByName($sizeProduct);
                        $colorData = $colorModel->getColorByName($prod_color);
                        $sizeId = $sizeData[0]->getId();
                        $colorId = $colorData[0]->getId();
                        //$productController->getProductByNameProduct($prod_quantity, $prod_name);
                        $productSizeColorController->getProductSizeColor($prod_quantity, $prod_id, $sizeId, $colorId, $shopId);
                    ?>
                <?php
                endforeach;
            }
        }
    }
    else{
        echo "<script type='text/javascript'>alert('Đã có lỗi xảy ra. Vui lòng thử lại');</script>";
    }
?>