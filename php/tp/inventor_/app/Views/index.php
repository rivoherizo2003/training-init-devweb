<?php

use Codemdg\Core\Http\Route;
use Codemdg\Core\Views\BlockBuilder;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventor</title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <?= BlockBuilder::renderBlock("additionnal_css", "") ?>
</head>

<body>
    <?= BlockBuilder::renderBlock("content") ?>

    <?= BlockBuilder::renderBlock("additionnal_js", "") ?>
</body>

</html>