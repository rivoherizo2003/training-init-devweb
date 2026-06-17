<?php

use Codemdg\Core\Views\BlockBuilder;

BlockBuilder::startBlock("additionnal_css");
?>
<link rel="stylesheet" type="text/css" href="<?= APP_URL ?>/assets/css/dashboard.css">
<?php
BlockBuilder::endBlock();
$parentView = "admin/default_admin.php";
BlockBuilder::startBlock("content_admin");
?>

<?=  "<h1>Page inventory</h1>"  ?>

<?php BlockBuilder::endBlock() ?>