<?php
require 'vendor/autoload.php';  // Certifique-se de que o autoloader do Composer está presente

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$phpmailer = new PHPMailer(true);

try {
    // Configurações do servidor SMTP (Mailtrap)
    $phpmailer->isSMTP();
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';  // Servidor SMTP do Mailtrap
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = 'a04b4d4914ba77';  // Seu Username do Mailtrap
    $phpmailer->Password = 'b07032d73123cd';  // Sua Senha do Mailtrap
    
    // Configuração do remetente e destinatário
    $phpmailer->setFrom('nutrisafe11@gmail.com', 'NutriSafe');  // Substitua pelo email do remetente
    $phpmailer->addAddress('nicholasflorencio17@gmail.com', 'Nicolas');  // Destinatário

    // Conteúdo do email
    $phpmailer->isHTML(true);  // Define que o corpo do email aceita HTML
    $phpmailer->Subject = 'Cadastro efetuado!';
    $phpmailer->Body = 'Seja bem-vindo ao nosso site!';
    $phpmailer->AltBody = 'Seja bem-vindo ao nosso site!';  // Texto alternativo para clientes que não suportam HTML

    // Enviar o email
    $phpmailer->send();
    echo 'Email enviado com sucesso!';
} catch (Exception $e) {
    echo "Erro ao enviar email: {$phpmailer->ErrorInfo}";
}
?>