<?php 
    foreach($data as $shop) {
        echo "
            <form method='post' action='./index.php?page=setting&id=".$shop->getId()."'>
                <div class='shop-info-list row'>
                    <div class='shop-info-item col-12 col-sm-12 col-lg-12'>
                        <p class='shop-info-item-title'>Tên shop</p>
                        <input type='text' placeholder='Nhập tên shop' class='shop-info-item-input' name='shop-name' value='" . $shop->getName() . "' required>
                    </div>
                    <div class='shop-info-item col-12 col-sm-12 col-lg-12'>
                        <p class='shop-info-item-title'>Link ảnh shop</p>
                        <input type='text' placeholder='Nhập link ảnh shop' class='shop-info-item-input' name='shop-img' value='" . $shop->getImg() . "' required>
                    </div>
                    <div class='shop-info-item col-12 col-sm-12 col-lg-12'>
                        <p class='shop-info-item-title'>Địa chỉ</p>
                        <input type='text' placeholder='Nhập địa chỉ shop' class='shop-info-item-input' name='shop-address' value='" . $shop->getAddress() . "' required>
                    </div>
                    <div class='shop-info-item col-12 col-sm-12 col-lg-12'>
                        <p class='shop-info-item-title'>Số điện thoại</p>
                        <input type='text' placeholder='Nhập số điện thoại' class='shop-info-item-input' name='shop-phone' value='" . $shop->getPhoneNumber() . "' required>
                    </div>
                </div>
                <div class='save-info'>
                    <button class='btn-save-info-shop' type='submit' name='update-shop-submit'>
                        Lưu thông tin
                    </button>
                </div>
            </form>
        ";
    }
?>