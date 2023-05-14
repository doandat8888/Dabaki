<?php
    class Province{
        private $id;
        private $name;
        private $type;
        
        public function getId() {return $this->id;}
        public function getName() {return $this->name;}
        public function getType() {return $this->$type;}
        

        public function __construct($id, $name, $type)
        {
            $this->id = $id;
            $this->name = $name;
            $this->type = $type;
        }
    }
?>