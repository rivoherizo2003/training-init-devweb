<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P.o.S</title>
    <link rel="stylesheet" href="css/pos.css">
</head>
<body>
    <h1>P.O.S</h1>
    <div class="container-pos">
        <div class="search-product">
            <?php include "views/search_products.php"; ?>
        </div>
        <div class="bill">
            <?php include "views/create_bill.php"; ?>
        </div>
    </div>
</body>
</html>