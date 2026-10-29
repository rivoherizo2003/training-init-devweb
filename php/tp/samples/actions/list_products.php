<?php

declare(strict_types=1);

$search = $_GET["search"] ?? "";

$products = [
    [
        "id" => 1,
        "name" => "stylos",
        "price" => 1000
    ],
    [
        "id" => 2,
        "name" => "crayon",
        "price" => 2000
    ],
    [
        "id" => 3,
        "name" => "compas",
        "price" => 10000
    ],
    [
        "id" => 4,
        "name" => "cartable",
        "price" => 90000
    ],
    [
        "id" => 5,
        "name" => "gomme",
        "price" => 100000
    ],
];

$productsFiltered = array_filter($products, function($product)use($search) {
    return str_contains($product["name"], $search);
});

?>

<?php
foreach ($products as $product) {
?>
    <tr>
        <td><?= $product["id"] ?></td>
        <td><?= $product["name"] ?></td>
        <td><?= $product["price"] ?></td>
    </tr>
<?php
}
?>
