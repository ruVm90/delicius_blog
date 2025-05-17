<?php

namespace App\Http\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendMail(Request $request)
{
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = 'tu_usuario';
        $mail->Password = 'tu_contraseña';
        $mail->Port = 2525;

        // Remitente
        $mail->setFrom('hello@example.com', 'Tu Nombre');
        $mail->addAddress($request->email, $request->name);  // Usamos parámetros pasados por el formulario

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = $request->subject;
        $mail->Body = $request->body;
        $mail->AltBody = strip_tags($request->body);

        if ($mail->send()) {
            return "Correo enviado con éxito!";
        }
    } catch (Exception $e) {
        return "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}
}
