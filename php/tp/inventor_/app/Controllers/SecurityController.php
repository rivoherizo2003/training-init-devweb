<?php

declare(strict_types=1);

namespace Codemdg\Inventor\Controllers;

use Codemdg\Core\Controllers\AbstractController;
use Codemdg\Core\Http\Route;
use Codemdg\Inventor\Models\SecurityModel;

class SecurityController extends AbstractController
{
    private SecurityModel $securityModel;

    public function __construct()
    {
        $this->securityModel = new SecurityModel();
    }

    public function showLogin()
    {
        if (!empty($_POST)) {
            try {
                $accountDto  = $this->securityModel->authenticate($_POST["email"], $_POST["password"]);
                $_SESSION["username"] = $accountDto->getUsername();

                session_regenerate_id(true);

                $_SESSION["account_id"] = $accountDto->getId();

                session_write_close();

                $this->redirectToUrl(Route::generateUrl("show.dashboard"));
            } catch (\Throwable $th) {
                $this->render("security/login.php", [
                    "message" => $th->getMessage(),
                    "email" => $_POST["email"]
                ]);
            }
        }

        $this->render("security/login.php");
    }

    public function logout(): void
    {
        //détruire le cookie de session coté navigateur
        //On demande á php de nous donner les paramétres  actuels du cookie pour cibler le bon
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();

            //Régler la date d'éxpiration du cookie dans le passé 
            //Cela force le navigateur de l'utilisateur a supprimer immédiatement
            setcookie(
                session_name(),
                "",
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );

            session_destroy();

            $this->redirectToUrl(Route::generateUrl("show.login"));
        }
    }
}
