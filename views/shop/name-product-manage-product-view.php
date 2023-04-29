<?php 
    foreach ($data as $product) {
        $productName = $product->getName();
        echo "
            <option value='".$product->getId()."'>$productName</option>
        ";
    }
?>