const chat = require("@botpress/chat");
const express = require("express");
const app = express();
const port = 3000; // Usa un puerto que esté disponible

app.use(express.json());

app.post("/send", async (req, res) => {
    const messageText = req.body.message;

    // Webhook del bot
    const webhookId = "4a7cef84-7df3-4f3e-bb65-258822647121";
    const apiUrl = `https://chat.botpress.cloud/${webhookId}`;


    try {
        // Conectarse al cliente del botpress
        const client = await chat.Client.connect({ apiUrl });
        const { conversation } = await client.createConversation({});

        // Enviar el mensaje del usuario al bot
        await client.createMessage({
            conversationId: conversation.id,
            payload: {
                type: "text",
                text: messageText,
            },
        });

        // Parámetros de reintentos para recibir múltiples mensajes
        const MAX_RETRIES = 5; // Número máximo de intentos para recolectar mensajes
        const DELAY_BETWEEN_RETRIES = 20000; // Tiempo de espera entre intentos (en milisegundos)

        // Función para esperar las respuestas del bot
        async function waitForBotResponses(
            client,
            conversationId,
            retries = 0
        ) {
            if (retries >= MAX_RETRIES) {
                throw new Error(
                    "No se recibió respuesta del bot después de varios intentos."
                );
            }

            // Obtener todos los mensajes de la conversación
            const { messages } = await client.listConversationMessages({
                id: conversationId,
            });

            // Filtrar solo los mensajes enviados por el bot (excluyendo los del usuario)
            const botMessages = messages.filter(
                (message) => message.userId !== client.user.id
            );

            // Mostrar en consola los mensajes recolectados para depuración
            console.log(
                "Mensajes recolectados hasta ahora: ",
                botMessages.map((msg) => msg.payload.text)
            );

            // Si se han recibido más de un mensaje del bot, regresarlos
            if (botMessages.length > 0) {
                console.log("Mensajes finales del bot: ", botMessages);
                return botMessages.map((msg) => msg.payload.text); // Regresar los textos de los mensajes
            }

            // Si no se han recibido respuestas, esperar y reintentar
            await new Promise((resolve) =>
                setTimeout(resolve, DELAY_BETWEEN_RETRIES)
            );
            return waitForBotResponses(client, conversationId, retries + 1);
        }

        // Intentar obtener las respuestas del bot
        const botResponses = await waitForBotResponses(client, conversation.id);

        // Enviar las respuestas del bot al cliente Laravel
        if (botResponses.length > 0) {
            res.json({ response: botResponses });
        } else {
            res.json({ response: ["No response from bot."] });
        }
    } catch (error) {
        // Manejo de errores
        res.status(500).json({ error: error.message });
    }
});

// Iniciar el servidor Node.js en el puerto 3000
app.listen(port, () => {
    console.log(`Servidor Node.js escuchando en http://localhost:${port}`);
});
