<?php 
    //session_start();
    include "../../models/userModel.php";
?>

<?php 
    class UserController {
        public $model;
        public function __construct() {
            $this->model = new UserModel();
        }

        //Đăng nhập
        public function getUser($username, $password) {
            $data = $this->model->getUser($username, $password);
            if($data != NULL) {
                foreach($data as $user) {
                    $_SESSION['role'] = $user->getRole();
                    $_SESSION['shop_id'] = $user->getShopId();
                    $_SESSION['phoneNumber'] = $user->getPhonenumber();
                    $_SESSION['user_id'] = $user->getId();
                    $_SESSION['user'] = $user;
                }
                if(isset($_SESSION['role'])) {
                    $role = $_SESSION['role'];
                    if($role === 'R1') {
                        header("Location: ../../index.php");
                    }else if($role === 'R2') {
                        header("Location: ../admin/index.php");
                    }
                }
            }else {
                header('Location: ../../views/login/index.php?msg=login-fail');
            }
        }

        public function getUserByIdCheckoutInfo($idUser) {
            $data = $this->model->getUserById($idUser);
            include_once "../../views/checkout/checkout-info-view.php";
        }

        public function getInfoAdmin($username, $password) {
            $data = $this->model->getUser($username, $password);
            include_once "../../views/admin/admin-info-view.php";
        }

        //Đăng ký
        public function setUser($firstName, $lastName, $phoneNumber, $email, $username, $password, $gender) {
            $count = 0;
            $registerInfo = ['username', 'password', 'firstName', 'lastName', 'phoneNumber', 'email', 'gender'];
            for($i = 0; $i < count($registerInfo); $i++) {
                if($_POST[$registerInfo[$i]] == '') {
                    header('Location: ../../views/register/index.php?msg=missing-info');
                    break;
                }else {
                    $count++;
                }
            }
            if($count == count($registerInfo)) {
                $result = $this->model->setUser($firstName, $lastName, $phoneNumber, $email, $username, $password, $gender);
                if($result == true) {
                    header('Location: ../../views/register/index.php?msg=done');
                }else if($result == false) {
                    header('Location: ../../views/register/index.php?msg=username-existed');
                }
            }
        }
        
        //Set shop_id sau khi người dùng đăng kí shop
        public function setShopId($userId, $shopId) {
            $result = $this->model->setShopId($userId, $shopId);
            return $result;
        }
    }
?>