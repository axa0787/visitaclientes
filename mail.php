<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
//Creamos una instancia
$mail = new PHPMailer(true);
if($_SERVER['REQUEST_METHOD'] === 'POST' ){
    header("Location: index.html" );
    $respuestas = $_POST['contacto'];    
    // Crear una instancia de PHPMailer
    $mail = new PHPMailer();

    // Configurar SMTP
    $mail->isSMTP(); 
    $mail->Host = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Username   = 'b6ff576bafd615';  
    $mail->Password   = '90a9b6d7661ec3';
    $mail->SMTPSecure = 'tls';           
    $mail->Port       = 2525;

    //Configurar el contenido del mail
    $mail->setFrom('admin@visitaclientes.com');
    $mail->addAddress('admin@visitaclientes.com', 'VisitaClientes.com');   
    $mail->Subject = 'Reporte de Visita a Clientes';
    //Hablilitar HTML
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    //Definir el contenido
    $contenido = '<html>';
    $contenido .= '<p>Reporte de la Visita</p>';
    $contenido .= '<p>Nombre Cliente: ' . $respuestas['nombre'] . '  </p>';
    $contenido .= '<p>Email: ' . $respuestas['email'] . '  </p>';
    $contenido .= '<p>Teléfono: ' . $respuestas['telefono'] . '  </p>';
    $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '  </p>';
    // $contenido .= '<p>Asunto: ' . $respuestas['asunto'] . '  </p>';
    // $contenido .= '<p>Forma de Pago: ' . $respuestas['pago'] . '  </p>';
    // $contenido .= '<p>Monto: ' . $respuestas['monto'] . '  </p>';
    // $contenido .= '<p>Cantidad: ' . $respuestas['cantidad'] . '  </p>';
    // $contenido .= '<p>Fecha: ' . $respuestas['fecha'] . '  </p>';
    // $contenido .= '<p>Hora: ' . $respuestas['hora'] . '  </p>';
    // $contenido .= '<p>Técnico: ' . $respuestas['tecnico'] . '  </p>';
    $contenido .= ' </html>';

    $mail->Body = $contenido;
    $mail->AltBody = 'Esto es texto alternativo sin HTML';
    //Enviar el mail 
    if($mail->send()) {
        echo 'Enviado Correctamente';
    } else {
        echo "El Mensaje no se pudo enviar";
    }
}


//Remitente (Nombre - Email)
// Asunto
//Cuerpo
$rta = mail('sandbox.smtp.mailtrap.io', "Mensaje web: $asunto", $body )
;



try {
    //Server settings
    
} catch (Exception $e) {
    echo "Error al enviar: {$mail->ErrorInfo}";
}

