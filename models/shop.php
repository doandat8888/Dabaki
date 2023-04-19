<?php 
    class Shop {
        private $id;
        private $name;
        private $img;
        private $address;
        private $status;

        public function __construct($id, $name, $img, $address, $status) {
            $this->id = $id;
            $this->name = $name;
            $this->img = $img;
            $this->address = $address;
            $this->status = $status;
        }

        public function getId() {return $this->id;}
        public function getName() {return $this->name;}
        public function getImg() {return $this->img;}
        public function getAddress() {return $this->address;}
        public function getStatus() {return $this->status;}
    }
?>