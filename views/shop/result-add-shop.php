<?php 
    include_once "../../controllers/userController.php";
    $userController = new UserController();
    if(isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id']; 
    }
    $resultSetShopId = $userController->setShopId($userId, $id);
    if($result == true && $resultSetShopId == true) {
        echo "<script type='text/javascript'>alert('Thêm cửa hàng thành công');</script>";
    }else {
        echo "<script type='text/javascript'>alert('Có lỗi xảy ra. Vui lòng thử lại');</script>";
    }
?>