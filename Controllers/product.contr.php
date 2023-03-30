<?php

class ProductContr extends Dbh
{
    protected function setProducts($sku, $name, $price, $type, $typeValue)
    {
        $stmt = $this->connect()->prepare("INSERT INTO 
        products (sku, name, price, type, value) Values(?, ?, ?, ?, ?);");


        if (!$stmt->execute(array($sku, $name, $price, $type, $typeValue))) {
            $stmt = null;
            header("location: ../..H/index.php?error=stmtfailed");
            exit();
        }

        return $stmt;
    }
}