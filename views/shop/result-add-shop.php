<?php 
    include_once "../../controllers/userController.php";
    include_once "../../models/userModel.php";
    $userController = new UserController();
    $userModel = new UserModel();
    if(isset($_SESSION['user_id'])) {
        $userId = $_SESSION['user_id']; 
    }
    $resultSetShopId = $userController->setShopId($userId, $id);
    $userData = $userModel->getUserById($userId);
    $_SESSION['shop_id'] = $userData[0]->getShopId();
    if($result == true && $resultSetShopId == true) {
        echo "<script type='text/javascript'>alert('Thêm cửa hàng thành công');</script>";
    }else {
        echo "<script type='text/javascript'>alert('Có lỗi xảy ra. Vui lòng thử lại');</script>";
    }
?>