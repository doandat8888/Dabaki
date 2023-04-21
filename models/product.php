<?php 
    class Product {
        private $id;
        private $name;
        private $price;
        private $type;
        private $description;
        private $category_id;
        private $image01;
        private $image02;
        private $shop_id;
        private $status;

        public function __construct($id, $name, $price, $type, $description, $category_id, $image01, $image02, $status, $shop_id) {
            $this->id = $id;
            $this->name = $name;
            $this->price = $price;
            $this->type = $type;
            $this->description = $description;
            $this->category_id = $category_id;
            $this->image01 = $image01;
            $this->image02 = $image02;
            $this->status = $status;
            $this->shop_id = $shop_id;
        }

        public function getId() {return $this->id;}
        public function getName() {return $this->name;}
        public function getPrice() {return $this->price;}
        public function getType() {return $this->type;}
        public function getDescription() {return $this->description;}
        public function getCategoryId() {return $this->category_id;}
        public function getImage01() {return $this->image01;}
        public function getImage02() {return $this->image02;}
        public function getShopId() {return $this->shop_id;}
        public function getStatus() {return $this->status;}
    }
?>