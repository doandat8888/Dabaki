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
                                inventory_2
                            </span>
                            <p class="shop-view-header-title">Sản phẩm được cung cấp bởi</p>
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
                                        <p class="btn-view-shop-content">Xem cửa hàng</p>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                ';
            }
        ?>
    </body>
</html>

