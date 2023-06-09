<?php
    ob_start();
    if (!function_exists('currency_format')) {
        function currency_format($number, $suffix = 'đ') {
            if (!empty($number)) {
                return number_format($number, 0, ',', '.') . "{$suffix}";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../../style.css">
        <link rel="stylesheet" href="./style.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
        <title>Thanh toán</title>
    </head>
    <body>
        <div class="container">
            <?php 
                include_once "../../components/header.php";
                include_once "../../controllers/userController.php";
                if(isset($_POST['return-cart-page'])) {
                    header("Location: ../../views/cart/index.php");
                }
            ?>
            <div class="checkout-body">
                <div class="row">
                    <form action="#" method="POST" style="display: flex;" onsubmit="javascript: return getTotal();" class="checkout-body-form row">
                        <div class="col-lg-6 col-md-12 col-12 checkout-body-left">           
                            <div class="checkout-info">
                                <div class="checkout-info-title">
                                    Thông tin giao hàng
                                </div>
                                <div class="checkout-info-input">
                                    <?php
                                        if(isset($_SESSION['user_id'])) {
                                            $userController = new UserController();
                                            $idUser = $_SESSION['user_id'];
                                            $userController->getUserByIdCheckoutInfo($idUser);
                                        } 
                                    ?>
                                    
                                </div>
                            </div>
                            <div class="checkout-payment">
                                <div class="checkout-payment-title">
                                    Phương thức thanh toán
                                </div>
                                <div class="checkout-payment-input">
                                    <div class="checkout-payment-input-item">
                                        <input type="radio" name="checkout-method" value="cod" checked>
                                        <span class="material-symbols-outlined checkout-payment-input-item-icon">
                                            local_shipping
                                        </span>
                                        <div class="checkout-payment-input-item-txt">Thanh toán ngay khi nhận hàng (COD)</div>
                                    </div>
                                    <div class="checkout-payment-input-item">
                                        <input type="radio" name="checkout-method" value="payUrl"> 
                                        <!-- <span class="material-symbols-outlined checkout-payment-input-item-icon">
                                            credit_card
                                        </span> -->
                                        <img class="checkout-payment-input-item-icon" src="../../src/img/logo-momo.jpg" alt="">
                                        <div class="checkout-payment-input-item-txt">Thanh toán qua ví Momo</div>
                                    </div>
                                    <div class="checkout-payment-input-item">
                                        <input type="radio" name="checkout-method" value="redirect">
                                        <input id="hidden-redirect" type="hidden" name="redirect" value="redirect">
                                        <img class="checkout-payment-input-item-icon" src="../../src/img/vnpay.png" alt="">
                                        <div class="checkout-payment-input-item-txt">Thanh toán bằng ví VNPay</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-12 col-12 checkout-body-right">
                            <div class="cart-products checkout-products">
                                <?php 
                                    include "../../components/cartProducts.php";
                                ?>
                            </div>

                            <div class="checkout-confirm">
                                <div class="checkout-confirm-title">
                                    Thông tin giỏ hàng
                                </div>
                                <div class="checkout-confirm-list">
                                    <div class="checkout-confirm-item">
                                        <div class="checkout-confirm-item-left">Tổng tiền hàng</div>
                                        <div class="checkout-confirm-item-right checkout-sum">
                                        <?php
                                            if(count($_SESSION['cart'])>0) {
                                                echo'
                                                <p class="cart-info-content-price-money">'.currency_format($totalcartprice).'</p>';
                                            }
                                            else {
                                                echo'
                                                <p class="cart-info-content-price-money">0</p>';
                                            }
                                        ?>
                                        </div>
                                    </div>
                                    <div class="checkout-confirm-item">
                                        <div class="checkout-confirm-item-left">Phí ship</div>
                                        <div class="checkout-confirm-item-right checkout-ship">20.000đ</div>
                                    </div>
                                    <div class="checkout-confirm-item">
                                        <div class="checkout-confirm-item-left">Thành tiền</div>
                                        <div class="checkout-confirm-item-right checkout-total"></div>
                                        <input id="hidden-total" type="hidden" name="total" value="">
                                        <input id="hidden-total-1" type="hidden" name="total-1" value="">
                                    </div>
                                </div>
                                <button class="checkout-confirm-btn col-12" type="submit" name="checkout-complete" onclick="getTotal()">
                                    Hoàn tất đơn hàng
                                </button>
                                
                                <button class="checkout-confirm-btn col-12" style="background-color: transparent; color: black; border: 1px solid black" type="submit" name="return-cart-page" onclick="getTotal()">
                                    Về trang giỏ hàng
                                </button>
                                
                                <?php
                                    include_once "../../controllers/billController.php";
                                    include_once "../../controllers/billDetailController.php";
                                    include_once "../../controllers/productController.php";
                                    include_once "../../controllers/checkoutController.php";
                                    include_once "../../models/provinceModel.php";
                                    include_once "../../models/districtModel.php";
                                    include_once "../../models/wardModel.php";
                                    if(isset($_GET['checkoutStatus']) && isset($_GET['fullName']) && isset($_GET['email']) && isset($_GET['phoneNumber']) && isset($_GET['total']) && isset($_GET['address'])){
                                        if($_GET['checkoutStatus'] == "success") {
                                            echo "<script type='text/javascript'>alert('Thanh toán thành công');</script>";
                                            $billController = new BillController();
                                            $detailBillController = new BillDetailController();
                                            $billController->getAllBill($_GET['fullName'], $_GET['email'], $_GET['phoneNumber'], $_GET['total'], $_GET['address']);
                                        }
                                    } 
                                    if(isset($_POST['checkout-complete'])){
                                        $provinceModel = new ProvinceModel();
                                        $districtModel = new DistrictModel();
                                        $wardModel = new WardModel();
                                        if(isset($_SESSION['cart'])) {
                                            if(isset($_POST['checkout-method']) && isset($_POST['checkout-info-name']) && isset($_POST['checkout-info-email']) 
                                            && isset($_POST['checkout-info-number']) && isset($_POST['total']) && isset($_POST['address-province']) 
                                            && isset($_POST['address-district']) && isset($_POST['address-ward']) && isset($_POST['address-street'])){
                                                if($_POST['checkout-info-name']!=="" && $_POST['checkout-info-email']!=="" && $_POST['checkout-info-number']!=="" && isset($_POST['total'])!=="" 
                                                && $_POST['address-province']!=="" && $_POST['address-district']!=="" && $_POST['address-ward']!=="" && $_POST['address-street']!==""){
                                                    // Nếu khách hàng nhập đủ thông tin
                                                    if(count($_SESSION['cart']) > 0) {
                                                        if($_POST['checkout-method'] == "cod") {
                                                            $billController = new BillController();
                                                            $detailBillController = new BillDetailController();
                                                            $provinceId = $_POST['address-province'];
                                                            $districtId = $_POST['address-district'];
                                                            $wardId = $_POST['address-ward'];
                                                            $provinceData = $provinceModel->getProvinceById($provinceId);
                                                            $districtData = $districtModel->getDistrictByProvinceId($provinceId);
                                                            $wardData  = $wardModel->getWardByDistrictId($districtId);
                                                            $provinceName = $provinceData[0]->getName();
                                                            $districtName = $districtData[0]->getName();
                                                            $wardName = $wardData[0]->getName();
                                                            $addressDetail = $_POST['address-street'];
                                                            $fullAddress = $addressDetail .', '. $wardName .', '. $districtName .', '. $provinceName;
                                                            //echo $fullAddress;
                                                            $billController->getAllBill($_POST['checkout-info-name'], $_POST['checkout-info-email'], $_POST['checkout-info-number'], $_POST['total'], $fullAddress);
                                                        }else {
                                                            $totalValue = rtrim($_POST['total-1'], "đ");
                                                            $checkoutController = new CheckoutController();
                                                            $provinceId = $_POST['address-province'];
                                                            $districtId = $_POST['address-district'];
                                                            $wardId = $_POST['address-ward'];
                                                            $provinceData = $provinceModel->getProvinceById($provinceId);
                                                            $districtData = $districtModel->getDistrictByProvinceId($provinceId);
                                                            $wardData  = $wardModel->getWardByDistrictId($districtId);
                                                            $provinceName = $provinceData[0]->getName();
                                                            $districtName = $districtData[0]->getName();
                                                            $wardName = $wardData[0]->getName();
                                                            $addressDetail = $_POST['address-street'];
                                                            $fullAddress = $addressDetail .', '. $wardName .', '. $districtName .', '. $provinceName;
                                                            $checkoutController->onlineCheckout($totalValue, $_POST['checkout-info-name'], $_POST['checkout-info-email'], $_POST['checkout-info-number'], $_POST['total'], $fullAddress);
                                                        }
                                                    }else {
                                                        echo "<script type='text/javascript'>alert('Chưa có sản phẩm trong giỏ hàng');</script>";
                                                    }
                                                    
                                                }
                                                else {
                                                    // Nếu khách hàng nhập còn thiếu thông tin
                                                    echo "<script type='text/javascript'>alert('Vui lòng nhập đủ thông tin');</script>";
                                                }
                                            }else{
                                                // Vì lý do nào đó trường POST bị thiếu
                                                echo "<script>alert('Có lỗi xảy ra')</script>";
                                                echo "<script>window.location = 'index.php'</script>";
                                            }
                                        }                     
                                    }        
                                ?>
                            </div>
                        </div>   
                    </form>
                </div>
                <?php 
                    include_once "../../components/footer.php";
                ?>
                <?php
                    include_once "../../components/scrollToTop.php"
                ?>
            </div>
        </div>
    </body>
    <script src="https://kit.fontawesome.com/644376ed9d.js" crossorigin="anonymous"></script>
    
    <script src="./script.js"></script>
</html>