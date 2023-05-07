var notHaveProductCheckBox = document.getElementById("not_have_product");
var haveProductCheckBox = document.getElementById("have_product");
var notHaveProductName = document.getElementById("not_have_product_name");
var haveProductName = document.getElementById("have_product_name");
var productPrice = document.getElementById("product_price");
var productDescription = document.getElementById("product_description");
var productType = document.getElementById("product_type");
var productCategory = document.getElementById("product_category");
var productImg01 = document.getElementById("product_img_01");
var productImg02 = document.getElementById("product_img_02");

notHaveProductCheckBox.addEventListener("change", function() {
    if(notHaveProductCheckBox.checked) {
        haveProductName.style.display = "none";
        notHaveProductName.style.display = "block";
        productPrice.style.display = "block";
        productDescription.style.display = "block";
        productType.style.display = "block";
        productCategory.style.display = "block";
        productImg01.style.display = "block";
        productImg02.style.display = "block";
    }
});

haveProductCheckBox.addEventListener("change", function() {
    if(haveProductCheckBox.checked) {
        haveProductName.style.display = "block";
        notHaveProductName.style.display = "none";
        productPrice.style.display = "none";
        productDescription.style.display = "none";
        productType.style.display = "none";
        productCategory.style.display = "none";
        productImg01.style.display = "none";
        productImg02.style.display = "none";
    }
});

        



