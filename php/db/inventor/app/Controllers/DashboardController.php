<?php
declare(strict_types=1);

namespace Codemdg\Inventor\Controllers;

use Codemdg\Core\Controllers\AbstractController;

final class DashboardController extends AbstractController{
    public function showDashboard(){
        $this->render("admin/dashboard.php");
    }
}