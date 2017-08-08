<?php

$data = array();
function cleanInput($data) {
    $data = trim($data);
    $data = str_replace("'", "\'", $data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);

    return $data;
}

function sendMail($para, $asunto, $mensaje) {
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: Kia Paraguay <noresponder@kia.com.py>' . "\r\n";
    $headers .= 'Reply-To: noresponder@kia.com.py' . "\r\n";
    mail($para, $asunto, $mensaje, $headers);
}

if (!empty($_POST)) {
    $para = 'raul.ramirez@garden.com.py';
    $asunto = 'Formulario Landing Page All-New Rio';
    $nombre = cleanInput($_POST['nombre']);
    $email = cleanInput($_POST['email']);
    $telefono = cleanInput($_POST['telefono']);
    $version = cleanInput($_POST['version']);
    $mensaje = cleanInput($_POST['mensaje']);
    $content = '<table>
                    <tr>
                        <td colspan="2"><h4>Formulario Landing Page All-New Rio</h4></td>
                    </tr>
                    <tr>
                        <td>Nombre: </td>
                        <td>' . $nombre . '</td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td>' . $email . '</td>
                    </tr>
                    <tr>
                        <td>Teléfono: </td>
                        <td>' . $telefono . '</td>
                    </tr>
                    <tr>
                        <td>Versión: </td>
                        <td>' . $version . '</td>
                    </tr>
                    <tr>
                        <td>Mensaje: </td>
                        <td>' . $mensaje . '</td>
                    </tr>
                </table>';
    sendMail($para, $asunto, $content);
    $data = array(
        'type' => 'success'
    );
}
echo json_encode($data);
