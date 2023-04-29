var notHaveProductCheckBox = document.getElementById("not_have_product");
var haveProductCheckBox = document.getElementById("have_product");
var notHaveProductName = document.getElementById("not_have_product_name");
var haveProductName = document.getElementById("have_product_name");

notHaveProductCheckBox.addEventListener("change", function() {
    if(notHaveProductCheckBox.checked) {
        haveProductName.style.display = "none";
        notHaveProductName.style.display = "block";
    }
});

haveProductCheckBox.addEventListener("change", function() {
    if(haveProductCheckBox.checked) {
        haveProductName.style.display = "block";
        notHaveProductName.style.display = "none";
    }
});

        



