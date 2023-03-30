<?php
//include "../Controllers/dbh.contr.php";

class DeleteData extends Dbh{
    public function DeleteRecord($ID = null)
    {
        if($this->connect()!=null){
            if($ID!=null){
                $sql = "DELETE FROM products WHERE sku=?;";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute(array($ID));

                return $stmt;
            }
        }
    }
}