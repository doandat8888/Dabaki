<?php
    class Ward{
        private $id;
        private $name;
        private $type;
        private $district_id;
        
        public function getId() {return $this->id;}
        public function getName() {return $this->name;}
        public function getType() {return $this->$type;}
        public function getDistrictId() {return $this->district_id;}

        public function __construct($id, $name, $type, $district_id)
        {
            $this->id = $id;
            $this->name = $name;
            $this->type = $type;
            $this->district_id = $district_id;
        }
    }
?>