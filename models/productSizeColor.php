<?php 
    class ProductSizeColor {
        private $id;
        private $product_id;
        private $size_id;
        private $color_id;
        private $quantity;
        private $shop_id;
        private $status;

        public function __construct($id, $product_id, $size_id, $color_id, $quantity, $shop_id, $status) {
            $this->id = $id;
            $this->product_id = $product_id;
            $this->size_id = $size_id;
            $this->color_id = $color_id;
            $this->quantity = $quantity;
            $this->shop_id = $shop_id;
            $this->status = $status;
        }

        public function getId() {return $this->id;}
        public function getProductId() {return $this->product_id;}
        public function getSizeId() {return $this->size_id;}
        public function getColorId() {return $this->color_id;}
        public function getQuantity() {return $this->quantity;}
        public function getShopId() {return $this->shop_id;}
        public function getStatus() {return $this->status;}
    }
?>