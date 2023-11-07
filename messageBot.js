const fetch = require('node-fetch');

// Mensaje a enviar
const mensaje = "22spin.net tu casino online 😉🎰";

// Reemplaza con el token de tu bot y el chat ID del grupo
const botToken = "6652040090:AAGevufskIkxuwv6wmHnxNY6SzqY6MNs2T0";
const chatID = "-4059348148";

// URL de la API de Telegram para enviar el mensaje
const url = `https://api.telegram.org/bot${botToken}/sendMessage`;

// Verifica si se ha enviado el formulario
if (typeof window !== 'undefined') {
  // Aquí iría la lógica para manejar la solicitud POST desde un formulario HTML
  // Por ejemplo, escuchar un evento de formulario y enviar el mensaje al servidor
} else {
  // Esto es para ejecutar la solicitud en un entorno Node.js

  // Reemplaza el bucle for con una función asincrónica para enviar 10 mensajes
  async function enviarMensajes() {
    for (let i = 0; i < 10; i++) {
      // Datos del mensaje
      const data = {
        chat_id: chatID,
        text: mensaje,
      };

      // Configura la solicitud POST
      const response = await fetch(url, {
        method: 'POST',
        body: JSON.stringify(data),
        headers: { 'Content-Type': 'application/json' },
      });

      // Verifica si la solicitud fue exitosa
      if (response.status === 200) {
        console.log("Mensaje enviado exitosamente");
      } else {
        const responseData = await response.json();
        console.error(`Error al enviar el mensaje. Código HTTP: ${response.status}`);
        console.error(responseData);
      }

      // Espera 5 segundos antes de enviar el siguiente mensaje
      if (i < 9) {
        await new Promise(resolve => setTimeout(resolve, 5000));
      }
    }
  }

  // Llama a la función para enviar los mensajes
  enviarMensajes();
}
