<?php

class Dbh{
    protected function connect(){
        
        try {
            $username = "4267128_products";
            $password = "salam123";
            $dbh = new PDO("mysql:host=fdb28.awardspace.net;dbname=4267128_products;", $username, $password);

            $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $dbh;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage()."</br>"; 
            die();
        }
    }
}