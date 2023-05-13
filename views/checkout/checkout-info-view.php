<?php 
    foreach($data as $user) {
        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();
        $fullName = $firstName . "" . $lastName;
        $phoneNumber = $user->getPhoneNumber();
        $email = $user->getEmail();
        echo '
            <input name="checkout-info-name" value="'. $fullName .'" type="text" class="checkout-info-input-item" placeholder="* Họ và tên">
            <input name="checkout-info-email" value="'. $email .'" type="text" class="checkout-info-input-item" placeholder="* Email">
            <input name="checkout-info-number" value="'. $phoneNumber .'" type="text" class="checkout-info-input-item" placeholder="* Số điện thoại">
            <input name="checkout-info-address" type="text" class="checkout-info-input-item" placeholder="* Địa chỉ">
            <div class="checkout-info-input-txt">
                * là trường không được để trống
            </div>
        ';
    }
?>