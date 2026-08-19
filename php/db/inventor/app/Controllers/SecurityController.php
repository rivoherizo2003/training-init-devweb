<?php

declare(strict_types=1);

namespace Codemdg\Inventor\Controllers;

use Codemdg\Core\Controllers\AbstractController;
use Codemdg\Core\Http\Route;
use Codemdg\Inventor\Models\SecurityModel;
use Codemdg\Inventor\Validators\LoginValidator;

class SecurityController extends AbstractController
{
    private SecurityModel $securityModel;

    public function __construct()
    {
        $this->securityModel = new SecurityModel();
    }

    public function showLogin()
    {
        $loginValidator = new LoginValidator();
        if (!empty($_POST)) {
            if ($loginValidator->isValid($_POST)) {
                try {
                    $accountDto = $this->securityModel->authenticate($_POST['email'], $_POST['password']);
                    $_SESSION["username"] = $accountDto->getUsername();
                    // OK authentication
                    // 1. destroy old id and regenerate
                    session_regenerate_id(true);

                    // 2. On assigne les données
                    $_SESSION['account_id'] = $accountDto->getId();
                    session_write_close();
                    $this->redirectToUrl(Route::generateUrl("show.dashboard"));
                } catch (\Throwable $th) {
                    $this->render("security/login.php", ['message' => $th->getMessage(), "email" => $_POST['email']]);
                }
            } else {
                $this->render("security/login.php", ['formErrors' => $loginValidator->getErrors()]);
            }
        }

        $this->render("security/login.php");
    }

    public function logout(): void
    {
        $_SESSION = [];

        // 2. Détruire le cookie de session côté navigateur
        // On demande à PHP de nous donner les paramètres actuels du cookie pour cibler le bon
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();

            // On recrée un cookie portant le même nom, mais on règle sa date d'expiration dans le passé (time() - 42000)
            // Cela force le navigateur de l'utilisateur à le supprimer immédiatement.
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );

            session_destroy();
            $this->redirectToUrl(URL_LOGIN);
            exit;
        }
    }
}
