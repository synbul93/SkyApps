<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require FCPATH . 'vendor/autoload.php';

class Phpmailer_lib
{
    public function __construct()
    {
        $this->mail = new PHPMailer(true);
        $this->mail->isSMTP();
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->Port = 465;
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = 'ssl';
        $this->mail->Username = 'synbullz5@gmail.com';
        $this->mail->Password = 'apyoqjxzauohfzje';
        $this->mail->CharSet = 'utf-8';
    }

    public function sendEmail($to, $subject, $message)
    {
        try {
            $CI = &get_instance();
            $CI->load->helper('url');

            $email_body = $CI->load->view('auth/email_template', ['to' => $to, 'subject' => $subject, 'message' => $message], true);

            $this->mail->setFrom('synbullz5@gmail.com', 'SkyApps');
            $this->mail->addAddress($to);
            $this->mail->Subject = $subject;
            $this->mail->isHTML(true);
            $this->mail->Body = $email_body;
            $this->mail->AltBody = strip_tags($email_body);

            $this->mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
