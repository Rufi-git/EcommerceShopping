<?php
include "../Controllers/dbh.contr.php";
include "../Controllers/product.contr.php";
include "../Models/product.model.php";

$sku = $_POST["sku"];
$name = $_POST["name"];
$price = $_POST["price"];
$type = $_POST["type"];
$typevalue = $_POST["typevalue"];

switch ($type) {
    case 'Weight':
        $signup = new WeightProduct();
        $signup->setSku($sku);
        $signup->setName($name);
        $signup->setPrice($price);
        $signup->setWeight($type);
        $signup->setTypeValue($typevalue);
        break;

    case 'Dimension':
        $signup = new DimensionProduct();
        $signup->setSku($sku);
        $signup->setName($name);
        $signup->setPrice($price);
        $signup->setDimension($type);
        $signup->setTypeValue($typevalue);
        break;

    default:
        $signup = new SizeProduct();
        $signup->setSku($sku);
        $signup->setName($name);
        $signup->setPrice($price);
        $signup->setSize($type);
        $signup->setTypeValue($typevalue);
        break;
}



if (!isset($_SESSION['error_values'])) {
    $signup->productAdd();
    header("location: ../Views/Home/index.php?error=none");
    unset($_SESSION['error_values']);
    session_abort();
    session_reset();
} else {
    header("location: ../Views/Add/productadd.php?error=true");
}
