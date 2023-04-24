<?php 
    foreach ($data as $size) {
        $sizeName = $size->getName();
        echo "
            <option value='".$size->getId()."'>$sizeName</option>
        ";
    }
?>