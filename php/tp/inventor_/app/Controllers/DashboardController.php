<?php

declare(strict_types=1);

namespace Codemdg\Inventor\Controllers;

use Codemdg\Core\Controllers\AbstractController;

class DashboardController extends AbstractController{
    public function showDashboard(){
        $this->render("dashboard.php");
    }
}