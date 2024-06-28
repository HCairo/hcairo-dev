<?php
namespace Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Models\Authentification;
use Views\AuthView;

class AuthController {
    protected $auth;
    protected $authView;

    public function __construct() {
        $this->auth = new Authentification();
        $this->authView = new AuthView();
    }
}