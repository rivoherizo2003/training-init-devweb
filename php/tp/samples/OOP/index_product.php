<?php
require_once("Product.php");
//data from database
$listProducts = [
    [
        "reference" => 123,
        "label" => "Or",
        "unit_price" => 200000,
        "quantity" => 72
    ],
    [
        "reference" => 234,
        "label" => "Argent",
        "unit_price" => 15000,
        "quantity" => 700
    ],
    [
        "reference" => 890,
        "label" => "Cuivre",
        "unit_price" => 2000,
        "quantity" => 1000
    ]
];

$products = []; //tableau d'objet Product
foreach ($listProducts as $product) {
    $products[] =  new Product($product["reference"], $product["label"], $product["unit_price"], $product["quantity"]); //instanciation
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Document</title>
</head>

<body>
    <p>Hello OOP</p>
    <?php foreach($products as $product) { ?>
        <p>
            Reference: <?= $product->getReference() ?><br>
            Label: <?= $product->getLabel() ?> <br>
        </p>
    <?php } ?>
</body>

</html>
