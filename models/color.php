<?php 
    class Color {
        private $id;
        private $name;
        private $colorHex;
        
        public function __construct($id, $name, $colorHex) {
            $this->id = $id;
            $this->name = $name;
            $this->colorHex = $colorHex;
        }

        public function getId() {return $this->id;}
        public function getName() {return $this->name;}
        public function getColorHex() {return $this->colorHex;}
    }
?>