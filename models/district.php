<?php
    class District{
        private $id;
        private $name;
        private $type;
        private $province_id;
        
        public function getId() {return $this->id;}
        public function getName() {return $this->name;}
        public function getType() {return $this->$type;}
        public function getProvinceId() {return $this->province_id;}

        public function __construct($id, $name, $type, $province_id)
        {
            $this->id = $id;
            $this->name = $name;
            $this->type = $type;
            $this->province_id = $province_id;
        }
    }
?>