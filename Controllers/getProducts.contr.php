<?php
include "../../Controllers/dbh.contr.php";
class Prods extends Dbh
{
    public function getAllProducts()
    {
        $sql = "SELECT * FROM products;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();

        return $results;
    }
}
