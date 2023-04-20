<?php 
    include_once "../../controllers/productSizeColorController.php";
    $productSizeColorController = new ProductSizeColorController();
    $productQuantity = $data[0]->getQuantity();
    $productQuantityNew = $productQuantity - $quantityBuy;
    $productSizeColorController->updateQuantity($productQuantityNew, $productId, $sizeId, $colorId, $shopId);
?>