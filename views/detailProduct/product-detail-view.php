<?php
    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = 'đ') {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }
?>
<!-- format màu -->
<?php
?>
<?php
    foreach ($data as $product) {
        include_once "../../models/productSizeColorModel.php";
        $productSizeColorModel = new ProductSizeColorModel();
        $arraysize = $productSizeColorModel->getAllSizeProduct($product->getId());
        $arraycolor = $productSizeColorModel->getAllColorProduct($product->getId());
        ?>
            
        <form action="../../controllers/cartController.php" method="POST">
            <?php
            echo'
                <div class="pro-title">
                    <h3 id="prod_name">'.$product->getName().'</h3>
                </div>
                <div class="detail-pro-price">
                    <span class="detail-pro-sale">-30%</span>
                    <span class="detail-pro-price" name="price">'.currency_format($product->getPrice()).'</span>
                    <del>'.currency_format(2000000).'</del>
                </div>
                <div class="size-select">';?>
                    <?php
                        foreach ($arraysize as $spro) { 
                            echo '
                                <input type="radio" class="size-selector" name="size" id="'.strtoupper($spro->getName()).'" value="'.strtoupper($spro->getName()).' "autocomplete="off" checked="">
                                <label class="size-btn" for="'.strtoupper($spro->getName()).'">'.strtoupper($spro->getName()).'</label>';  
                        }?>
            <?php
            echo '
                </div>
                <div class="color-select">';
            ?>
            <?php
                    foreach ($arraycolor as $cpro) {
                        $colorHex = $cpro->getColorHex();
                        echo '
                            <input type="radio" class="color-selector" name="color" id="'.strtolower($cpro->getName()).'" value="'.strtolower($cpro->getName()).'" autocomplete="off" checked="">
                            <label class="color-btn" style="background-color:#'.$colorHex.';" for="'.strtolower($cpro->getName()).'"></label>';
                    }
            ?>
            <?php
            echo '
                </div>
                <div class="selector-actions">
                    <div class="quantity mb-3" style="clear: both;">
                            <button class="minusdecrease">-</button>
                            <input type="text" value="1" min="0"" name="prod_quantity" class="detail-number">
                            <button class="plusincrease">+</button>
                    </div>
                    <br style="clear: both"></br>
                    <div class="d-flex">
                        <input type="hidden" name="prod_id" value="'.$product->getId().'">
                        <input type="hidden" name="prod_name" value="'.$product->getName().'">
                        <input type="hidden" name="prod_image" value="'.$product->getImage01().'">
                        <input type="hidden" name="prod_price" value="'.$product->getPrice().'">
            
                        <button type="submit" name="cartcontroller" value="addToCart" class="detail-btn add-btn gap-2 mx-auto ">Thêm vào giỏ</button>
                        <button type="submit" name="cartcontroller" value="buyNow" class="detail-btn buy-btn gap-2">Mua ngay</button>
                    </div>
                </div>

                <div class="info">
                    <div class="info-list d-flex">
                        <div class="info-item">Giới thiệu</div>
                    </div>
                    <div class="info-content">
                        <div class="info-content-item block">
                            '.$product->getDescription().'
                        </div>
                    </div>
                </div>
                <div class="desc">
                    <p class="desc-policy">
                        <i class="fa-solid fa-truck-fast"></i>
                        Giao hàng toàn quốc
                    </p>
                    <p class="desc-policy"> 
                        <i class="fa-solid fa-thumbs-up"></i>
                        Cam kết chính hãng
                    </p>
                    <p class="desc-policy">
                        <i class="fa-solid fa-chess-queen"></i>
                        Bảo hành trọn đời
                    </p>
                </div>';
            ?>
        </form>
 <?php }
 ?>