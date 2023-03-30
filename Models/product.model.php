<?php
ob_start();
session_start();
include "../Controllers/getProducts.contr.php";


interface ProductInterface {
    public function setSku($sku);
    public function setName($name);
    public function setPrice($price);
    public function setTypeValue($typeValue);
    public function productAdd();
}


abstract class ProductModel extends ProductContr implements ProductInterface
{
    private $sku;
    private $name;
    private $price;
    private $typeValue;

    public $error = false;
    public $error_values = array();

    public function errors()
    {
        return $this->error_values;
    }
    //setters
    public function setSku($sku)
    {
        $unique = true;
        if (empty($sku)) {
            $this->error = true;
            array_push($this->error_values, "sku can not be empty");
            $_SESSION['error_values'] = $this->error_values;
            return;
        } else {
            $getProducts = new Prods();
            $products = $getProducts->getAllProducts();
            foreach ($products as $product) {
                if ($product['sku'] == $sku) {
                    $unique = false;
                    break;
                }
            }
        }

        if ($unique == false) {
            $this->error = true;
            array_push($this->error_values, "SKU already exists");
            $_SESSION['error_values'] = $this->error_values;
            return;
        }

        $this->sku = $sku;
    }
    public function setName($name)
    {
        if (empty($name)) {
            $this->error = true;
            array_push($this->error_values, "name can not be empty");
            $_SESSION['error_values'] = $this->error_values;
            unset($_SESSION['error_values']);
            return;
        }
        unset($_SESSION['error_values']);
        $this->name = $name;
    }
    public function setPrice($price)
    {
        if (empty($price)) {
            $this->error = true;
            array_push($this->error_values, "price can not be empty");
            $_SESSION['error_values'] = $this->error_values;
            return;
        }
        if (!is_numeric($price)) {
            array_push($this->error_values, "price is not a number");
            return;
        }
        unset($_SESSION['error_values']);
        $this->price = $price;
    }

    public function setTypeValue($typeValue)
    {
        if (empty($typeValue)) {
            $this->error = true;
            array_push($this->error_values, "type value can not be empty");
            $_SESSION['error_values'] = $this->error_values;
            return;
        }
        unset($_SESSION['error_values']);
        $this->typeValue = $typeValue;
    }
    //getters
    public function getSku()
    {
        return $this->sku;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getTypeValue()
    {
        return $this->typeValue;
    }
}


class DimensionProduct extends ProductModel implements ProductInterface {
    protected $dimension;
    
    public function setDimension($dimension) {
        $this->dimension = $dimension;
    }
    public function getDimension() {
        return $this->dimension;
    }
    

    public function productAdd() {
        if (!$this->error)
            $this->setProducts($this->getSku(), $this->getName(), $this->getPrice(), $this->getDimension(), $this->getTypeValue());
    }
}

class SizeProduct extends ProductModel implements ProductInterface {
    protected $size;
    
    public function setSize($size) {
        
        $this->size = $size;

    }
    
    public function getSize() {
        return $this->size;
    }

    public function productAdd() {
        if (!$this->error)
            $this->setProducts($this->getSku(), $this->getName(), $this->getPrice(), $this->getSize(), $this->getTypeValue());
    }
}

class WeightProduct extends ProductModel implements ProductInterface {
    protected $weight;
    
    public function setWeight($weight) {
        
        $this->weight = $weight;

    }
    
    public function getWeight() {
        return $this->weight;
    }

    public function productAdd() {
        if (!$this->error)
            $this->setProducts($this->getSku(), $this->getName(), $this->getPrice(), $this->getWeight(), $this->getTypeValue());
    }
}
