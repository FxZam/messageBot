<?php
// Mensaje a enviar
$mensaje = "22spin.net tu casino online 😉🎰";

// Reemplaza con el token de tu bot y el chat ID del grupo
$botToken = "6652040090:AAGevufskIkxuwv6wmHnxNY6SzqY6MNs2T0";
$chatID = "-4059348148";

// URL de la API de Telegram para enviar el mensaje
$url = "https://api.telegram.org/bot" . $botToken . "/sendMessage";

// Verifica si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'encender') {
    for ($i = 0; $i < 10; $i++) {
        // Datos del mensaje
        $data = array(
            "chat_id" => $chatID,
            "text" => $mensaje,
        );

        // Inicializa cURL
        $ch = curl_init($url);

        // Configura la solicitud POST
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        // Configura para recibir la respuesta
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Realiza la solicitud
        $response = curl_exec($ch);

        // Verifica si la solicitud fue exitosa
        if ($response !== false) {
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($httpCode == 200) {
                echo "Mensaje enviado exitosamente" . PHP_EOL;
            } else {
                echo "Error al enviar el mensaje. Código HTTP: " . $httpCode . PHP_EOL;
            }
        } else {
            echo "Error al enviar el mensaje. Curl error: " . curl_error($ch) . PHP_EOL;
        }

        // Cierra la conexión cURL
        curl_close($ch);

        // Espera 5 segundos antes de enviar el siguiente mensaje
        if ($i < 9) {
            sleep(5);
        }
    }
}
header("Location: index.html");
?>
