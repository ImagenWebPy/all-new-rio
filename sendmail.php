<?php

date_default_timezone_set('America/Asuncion');

define('DB_USER', 'web');
define('DB_PASS', 'WebG@rdenMKT');
define('DB_NAME', 'rk000732_kia');
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
include 'Database.php';
$db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
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
    $fecha = date('d-m-Y H:i:s');
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
                    <tr>
                        <td>Enviado el: </td>
                        <td>' . $fecha . '</td>
                    </tr>
                </table>';
    sendMail($para, $asunto, $content);
    $db->insert('allnewrio_leads', array(
        'nombre' => utf8_decode($nombre),
        'email' => utf8_decode($email),
        'telefono' => utf8_decode($telefono),
        'version' => utf8_decode($version),
        'mensaje' => utf8_decode($mensaje),
        'fecha' => date('Y-m-d H:i:s')
    ));
    $data = array(
        'type' => 'success'
    );
}
echo json_encode($data);
