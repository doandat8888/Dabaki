<?php 
    foreach ($data as $ward) {
        $wardName = $ward->getName();
        echo "
            <option value='".$ward->getId()."'>$wardName</option>
        ";
    }
?>