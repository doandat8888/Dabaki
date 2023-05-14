<?php 
    foreach ($data as $province) {
        $provinceName = $province->getName();
        echo "
            <option value='".$province->getId()."'>$provinceName</option>
        ";
    }
?>