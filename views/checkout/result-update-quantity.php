<?php 
    if($result) {
        echo "<script type='text/javascript'>alert('Cập nhật số lượng thành công');</script>";
        unset($_SESSION['cart']);
        unset($_SESSION['prod_price_total']);
        header("Location: ../../index.php?checkoutStatus=success");
    }
?>