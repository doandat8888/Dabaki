<?php 
    class Shop {
        private $id;
        private $name;
        private $img;
        private $address;
        private $phoneNumber;
        private $status;

        public function __construct($id, $name, $img, $address, $phoneNumber, $status) {
            $this->id = $id;
            $this->name = $name;
            $this->img = $img;
            $this->address = $address;
            $this->phoneNumber = $phoneNumber;
            $this->status = $status;
        }

        public function getId() {return $this->id;}
        public function getName() {return $this->name;}
        public function getImg() {return $this->img;}
        public function getAddress() {return $this->address;}
        public function getPhoneNumber() {return $this->phoneNumber;}
        public function getStatus() {return $this->status;}
    }
?>