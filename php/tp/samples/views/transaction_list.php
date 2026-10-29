<?php
    include "../controllers/TransactionController.php";

    $transactionController = new TransactionController();
    $transactions = $transactionController->getListTransaction();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    transaction

    <?php
    var_dump($transactions);
    ?>
</body>
</html>