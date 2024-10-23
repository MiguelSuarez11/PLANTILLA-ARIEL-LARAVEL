<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

set_time_limit(60);

class BotController extends Controller
{
    public function sendMessage(Request $request)
    {
        $userMessage = $request->input('message');
        $processAudio = $request->input('processAudio') === 'true';

        Log::info("Usuario envió el mensaje: " . $userMessage);
        Log::info("Procesar audio: " . ($processAudio ? 'Sí' : 'No'));

        try {
            // Enviar el mensaje a la nueva API externa
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'User-Agent' => 'PostmanRuntime/7.42.0',
                'Authorization' => 'TokenABC123', // Ajusta el token si es necesario
            ])->timeout(60)->post('https://automate.proderi.com/webhook/08e72b16-5a4c-416f-90a0-5bcf0f444e4e', [
                'message' => $userMessage,
            ]);

            Log::info("Respuesta de la API externa: " . $response->body());

            // Validar la respuesta y asegurarse de que tenga el formato esperado
            $responseData = $response->json();
            Log::info("Respuesta completa de la API: " . json_encode($responseData));

            // Verificar si la respuesta tiene el formato correcto
            if (isset($responseData[0]['text'])) {
                $apiMessages = [$responseData[0]['text']];
            } else {
                $apiMessages = ['No encontré una respuesta relacionada a tu pregunta, por favor reformúlala.'];
            }

            // Procesar el texto para reemplazar etiquetas <br> y convertir * a negrita
            $processedMessage = $this->formatResponseText($apiMessages[0]);

            // Procesar la conversión de texto a audio si está habilitado
            if ($processAudio && config('app.activeaudio') == 'true') {
                $api_key = config('app.eleventlab');
                $voice_id = 'XrExE9yKIg1WjnnlVkGX'; // ID de voz predefinido
                $url = "https://api.elevenlabs.io/v1/text-to-speech/{$voice_id}";

                $audioResponse = Http::timeout(60)->withHeaders([
                    'Content-Type' => 'application/json',
                    'xi-api-key' => $api_key
                ])->withOptions(['verify' => false])->post($url, [
                    'text' => $processedMessage,
                    'model_id' => "eleven_multilingual_v2",
                    'voice_settings' => [
                        'stability' => 0.9,
                        'similarity_boost' => 0.9
                    ]
                ]);

                if ($audioResponse->successful()) {
                    $audioFile = 'audio/output_audio_' . time() . '.mp3';
                    $saveSuccess = file_put_contents(public_path($audioFile), $audioResponse->body());

                    if ($saveSuccess !== false && file_exists(public_path($audioFile))) {
                        Log::info("Archivo de audio guardado en: " . public_path($audioFile));
                        return response()->json([
                            'response' => [$processedMessage],
                            'audioUrl' => asset($audioFile)
                        ]);
                    } else {
                        Log::error("Error al guardar el archivo de audio.");
                        return response()->json([
                            'response' => [$processedMessage],
                            'audioUrl' => null
                        ]);
                    }
                } else {
                    Log::error("Error al convertir el texto a audio: " . $audioResponse->body());
                    return response()->json([
                        'response' => [$processedMessage],
                        'audioUrl' => null
                    ]);
                }
            } else {
                return response()->json([
                    'response' => [$processedMessage],
                    'audioUrl' => null
                ]);
            }
        } catch (\Exception $e) {
            Log::error("Error durante la ejecución: " . $e->getMessage());
            return response()->json(['error' => 'Ocurrió un error: ' . $e->getMessage()]);
        }
    }


    private function formatResponseText($text)
    {
        // Reemplazar <br> con saltos de línea
        $text = str_replace('<br>', "\n", $text);

        // Reemplazar texto entre asteriscos (*) con etiquetas <strong>
        $text = preg_replace('/\*(.*?)\*/', '<strong>$1</strong>', $text);

        return $text;
    }
}
