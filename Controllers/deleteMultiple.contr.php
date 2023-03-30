<?php
include "../Controllers/dbh.contr.php";

class DeleteMulData extends Dbh
{
    public function DeleteMulRecord($ID = null)
    {
        if (isset($_POST['delete_multiple_prods'])) {
            if(isset($_POST['delete_id'])){
                $sql = "DELETE FROM products WHERE sku IN(?);";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute(array($ID));

                // $sql = "DELETE FROM products WHERE sku=?;";
                // $stmt = $this->connect()->prepare($sql);
                // $stmt->execute(array($ID));

                // return $stmt;
                header("location: ../Views/Home/index.php");
                return $stmt;
            }
            
        }
    }
}
