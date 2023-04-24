<?php 
    foreach ($data as $color) {
        $colorName = $color->getName();
        echo "
            <option value='".$color->getId()."'>$colorName</option>
        ";
    }
?>