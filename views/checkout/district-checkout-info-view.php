<?php 
    foreach ($data as $district) {
        $districtName = $district->getName();
        echo "
            <option value='".$district->getId()."'>$districtName</option>
        ";
    }
?>