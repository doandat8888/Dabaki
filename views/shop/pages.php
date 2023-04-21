<?php 
    if(isset($_GET['page'])) {
        switch ($_GET['page']) {
            case 'dashboard':
                include_once "dashboard.php";
                break;
            case 'manage-product':
                include_once "manage-product.php";
                break;
            case 'manage-customer':
                include_once "manage-customer.php";
                break;
            case 'statistic':
                include_once "statistic.php";
                break;
            case 'bill':
                include_once "bill.php";
                break;
            case 'setting':
                include_once "setting-shop.php";
                break;
            case 'update-product':
                include_once "updateProduct.php";
                break;
            case 'update-category':
                include_once "updatecategory.php";
                break;
            default:
                include_once "dashboard.php";
                break;
        }
    }else {
        include_once "dashboard.php";
    }
?>