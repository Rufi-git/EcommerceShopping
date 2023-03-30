<?php
include "../../Controllers/deleteProduct.contr.php";

class ProductsView extends Prods
{
    public function showProducts()
    {
        $results = $this->getAllProducts();
?>
        <?php
        foreach ($results as $result) {
            $type = "";
            if ($result["type"] == "weight") {
                $type = "Kq";
            } elseif ($result["type"] == "size") {
                $type = "Mb";
            }
        ?><label class="option_item">
                <input type="checkbox" name="delete_id[]" class="checkbox" value="<?= $result["sku"] ?>">
                <div class="option_inner">
                    <div class="tickmark"></div>
                    <div class="card-info">
                        <h3>SKU: <?= $result["sku"] ?></h3>
                        <h5 class="card-title">Name: <?= $result["name"] ?></h5>
                        <h5 class="card-title">Price: <?= $result["price"] ?>$</h5>
                        <h5 class="card-title">Type: <?= ucfirst($result["type"]) ?></h5>
                        <h5 class="card-title">Value: <?= $result["value"] ?> <?= $type ?></h5>
                    </div>
                </div>
            </label>
        <?php
        } ?>
<?php
    }
}
