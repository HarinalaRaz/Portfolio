<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Configurer PHPMailer
    $mail = new PHPMailer(true);

    try {
        
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'harinalalanjaniaina@gmail.com'; 
        $mail->Password = 'gydr ujmv njut szam '; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Chiffrement TLS
        $mail->Port = 587; // Port SMTP

        // Destinataires
        $mail->setFrom($email, $name); 
        $mail->addAddress('harinalalanjaniaina@gmail.com'); 

        // Contenu de l'email
        $mail->isHTML(true);
        $mail->Subject = "Nouveau message de $name";
        $mail->Body = "
            <h1>Nouveau message de $name</h1>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Message:</strong></p>
            <p>$message</p>
        ";

        // Envoyer l'email
        $mail->send();
        echo "<script>alert('Message envoyé avec succès !'); window.location.href = 'index.html';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Erreur lors de l\'envoi du message. Veuillez réessayer.'); window.location.href = 'index.html';</script>";
    }
}
?>