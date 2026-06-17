<?php
declare(strict_types=1);

namespace Codemdg\Inventor\Controllers;

use Codemdg\Core\Controllers\AbstractController;

class SecurityController extends AbstractController{
    public function showLogin(){
        $this->render("security/login.php");
    }
}