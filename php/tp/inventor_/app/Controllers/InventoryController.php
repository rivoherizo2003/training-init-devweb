<?php

declare(strict_types=1);

namespace Codemdg\Inventor\Controllers;

use Codemdg\Core\Controllers\AbstractController;

class InventoryController extends AbstractController{
    public function showInventory(){
        $this->render("inventory/inventory.php");
    }
}