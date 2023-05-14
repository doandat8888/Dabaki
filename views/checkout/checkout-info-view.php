<?php 
    $firstName = $data[0]->getFirstName();
    $lastName = $data[0]->getLastName();
    $fullName = $firstName . " " . $lastName;
    $phoneNumber = $data[0]->getPhoneNumber();
    $email = $data[0]->getEmail();
?>
<input name="checkout-info-name" value="<?php echo $fullName?>" type="text" class="checkout-info-input-item" placeholder="* Họ và tên">
<input name="checkout-info-email" value="<?php echo $email?>" type="text" class="checkout-info-input-item" placeholder="* Email">
<input name="checkout-info-number" value="<?php echo $phoneNumber?>" type="text" class="checkout-info-input-item" placeholder="* Số điện thoại">
<div class="checkout-info-item col-12 col-sm-12 col-lg-12">
    <select class="checkout-info-item-input" id="province" name="address-province">
        <option value="-1">Tỉnh / thành phố</option>
        <div id="province-list">
            <?php 
                include_once "../../controllers/provinceController.php";
                $provinceController = new ProvinceController();
                $provinceController->getAllProvinceCheckoutInfo();
            ?>
        </div>
    </select>
    
</div>
<div class="checkout-info-item col-12 col-sm-12 col-lg-12">
    <select class="checkout-info-item-input district" name="address-district" id="district"></select>
</div>

<div class="checkout-info-item col-12 col-sm-12 col-lg-12">
    <select class="checkout-info-item-input ward" name="address-ward"></select>
</div>

<input name="address-street" type="text" class="checkout-info-input-item" placeholder="* Địa chỉ">
<div class="checkout-info-input-txt">
    * là trường không được để trống
</div>

<script>
    $(document).ready(function() {
        document.querySelector(".district").innerHTML = "<option value='-1'>Quận / huyện</option>"
        document.querySelector(".ward").innerHTML = "<option value='-1'>Xã / phường / thị trấn</option>"
        //Lấy danh sách quận huyện theo mã thành phố
        function showDistrict(provinceId) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) {
                    document.querySelector(".district").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", `./getdistrict.php?provinceId=${provinceId}`, true);
            xmlhttp.send();
        }
        provinceList = document.getElementById('province');
        provinceList.onchange = function() {
            showDistrict(provinceList.value);
        }
        //Lấy danh sách xã phường theo mã quận huyện
        function showWard(districtId) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if(this.readyState == 4 && this.status == 200) {
                    document.querySelector(".ward").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", `./getward.php?districtId=${districtId}&provinceId=${provinceList.value}`, true);
            xmlhttp.send();
        }
        districtList = document.getElementById('district');
        districtList.onchange = function() {
            showWard(districtList.value);
        }
    })
</script>