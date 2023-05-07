<?php
    include_once "../../models/productModel.php";
    include_once "../../models/colorModel.php";
    include_once "../../models/sizeModel.php";
    $productModel = new ProductModel();
    $sizeModel = new SizeModel();
    $colorModel = new ColorModel();
    if($data != NULL) {
        if(count($data) > 0) {
            foreach ($data as $productSizeColor) { 
                $idProduct = $productSizeColor->getProductId();
                $idProSizeColor = $productSizeColor->getId();
                $sizeId = $productSizeColor->getSizeId();
                $colorId = $productSizeColor->getColorId();
                $productData = $productModel->getProductById($idProduct);
                $sizeData = $sizeModel->getSizeById($sizeId);
                $colorData = $colorModel->getColorById($colorId);
                if($productSizeColor->getStatus() == 1) {
                    echo "
                        <tr>
                            <th scope='row'>" . $idProduct . "</th>
                            <td class='productSizeColor-img-container col-2'><img src='" . $productData[0]->getImage01() . "' class='manage-productSizeColor-img col-lg-6'></td>
                            <td>" . $productData[0]->getName() . "</td>
                            <td>" . currency_format($productData[0]->getPrice()) . "</td>
                            <td>" . $colorData[0]->getName() . "</td>
                            <td>" . $sizeData[0]->getName() . "</td>
                            <td>" . $productSizeColor->getQuantity() . "</td>
                            <td class='manage-product-action'>
                                <a href='./index.php?page=update-productSizeColor&id=".$productData[0]->getId()."&idProSizeColor=$idProSizeColor'>
                                    <button class='edit action-btn' data-toggle='modal' data-target='#editModal'>
                                        Sửa
                                    </button>
                                </a>
                                <a href='./index.php?page=manage-product&action=delete&id=".$productData[0]->getId()."&idProSizeColor=$idProSizeColor'>
                                    <button class='delete action-btn' type='submit'>Xóa</button>
                                </a>
                            </td>
                        </tr>   
                    ";
                }
                
            }
        }
    }else {
        echo "Chưa có sản phẩm";
    }   
?>
