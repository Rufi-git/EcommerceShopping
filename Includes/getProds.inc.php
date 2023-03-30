<?php
include "../../Controllers/getProducts.contr.php";
include "../../Views/Products/products.php";

$productsObj = new ProductsView();
$productsObj->showProducts();