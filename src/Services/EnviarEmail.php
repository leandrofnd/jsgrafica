<?php

namespace Grafica\Projeto\Services;
// require __DIR__ . '/../../vendor/autoload.php';
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EnviarEmail
{
    public $email;
    private $usuario = "leanoficialcontato@gmail.com";
    private $para = "leanoficialcontato@gmail.com";
    private $nomeEmpresa = "Finger Print";

    public function __construct($emailUsuario, $texto)
    {

        // Instantiation and passing `true` enables exceptions
        $this->email = new PHPMailer();

        //Server settings
        $this->email->SMTPDebug = false;                                       // Enable verbose debug output
        $this->email->isSMTP();                                            // Set emailer to use SMTP
        $this->email->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $this->email->SMTPAuth   = true;                                   // Enable SMTP authentication
        $this->email->Username   = $this->usuario;                        // SMTP username
        $this->email->Password   = getenv("JS_SENHA_EMAIL");                               // SMTP password
        $this->email->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
        $this->email->Port       =  465;
        $this->email->From       = $this->usuario;                                  // TCP port to connect to
        $this->email->FromName   = $this->nomeEmpresa;

        //Recipients
        $this->email->setFrom($this->usuario);
        $this->email->addAddress($this->para);

        // Attachments
        // $this->mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $this->mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        // $this->email->isHTML(true);                                  // Set email format to HTML
        $this->email->Subject = $emailUsuario;
        // $this->email->Body    = $texto;
        $this->email->msgHTML($texto);

        // print_r($this->email); exit;

    }
    
    public function enviarEmail()
    {
        try{
            $this->email->send();
            return true;
        } catch(Exception $e){
            echo "Message could not be sent. Mailer Error: {$this->email->ErrorInfo}";
            return false;
        }
    }


    
}
