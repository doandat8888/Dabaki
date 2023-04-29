<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/update-product-size-color.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
</head>

<body>
    <?php
    include_once "../../controllers/productSizeColorController.php";
    include_once "../../models/productSizeColorModel.php";
    include_once "../../models/productModel.php";
    include_once "../../models/colorModel.php";
    include_once "../../models/sizeModel.php";
    $productSizeColorController = new ProductSizeColorController();
    $productModel = new ProductModel();
    $productSizeColorModel = new ProductSizeColorModel();
    $colorModel = new ColorModel();
    $sizeModel = new SizeModel();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $shopId = $_SESSION['shop_id'];
        $idProSizeColor = $_GET['idProSizeColor'];
        // $sizeId = $_GET['sizeId'];
        // $colorId = $_GET['colorId'];
        // $quantity = $_GET['quantity'];
        $dataProduct = $productModel->getProductById($id);
        $dataProductSizeColor = $productSizeColorModel->getProductSizeColorById($idProSizeColor, $shopId);
        $dataColor = $colorModel->getColorById($dataProductSizeColor[0]->getColorId());
        $dataSize = $sizeModel->getSizeById($dataProductSizeColor[0]->getSizeId());
        $productSizeColorController->viewProductSizeColorInfo($dataProductSizeColor[0], $dataProduct[0], $dataSize[0], $dataColor[0]);
    }
    ?>
</body>

</html>