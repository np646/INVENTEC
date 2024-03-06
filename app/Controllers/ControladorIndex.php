<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use CodeIgniter\Model;
use PharIo\Manifest\Url;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class ControladorIndex extends BaseController
{
    public function index()
    {
        return view('Templates/header').view('Index').view('Templates/footer');
    }
}