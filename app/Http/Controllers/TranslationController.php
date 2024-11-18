<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class TranslationController extends Controller
{
    public function translate(Request $request)
    {
        Log::info('Solicitud de traducción recibida', $request->all());
        $text = $request->input('text');
        $sourceLang = $request->input('source_lang');
        $targetLang = $request->input('target_lang');
        $cacheKey = "translation_{$sourceLang}_{$targetLang}_" . md5($text);

        if (!$text || !$sourceLang || !$targetLang) {
            return response()->json(['error' => 'Faltan parámetros.'], 400);
        }

        if (Cache::has($cacheKey)) {
            return response()->json(['translation' => Cache::get($cacheKey)]);
        }

        try {
            //$apiUrl = "http://localhost:5001/api/v1/$sourceLang/$targetLang/" . rawurlencode($text);
            $apiUrl = "http://lingva.ml/api/v1/$sourceLang/$targetLang/" . rawurlencode($text);
            $response = @file_get_contents($apiUrl);

            if ($response === false) {
                Log::error('Error al conectar con la API de traducción.');
                return response()->json(['error' => 'Error al conectar con la API de traducción.'], 500);
            }

            $responseData = json_decode($response, true);
            if (isset($responseData['error'])) {
                Log::error('Error en la API de traducción', $responseData);
                return response()->json(['error' => 'Error en la API de traducción.'], 500);
            }

            $translation = $responseData['translation'] ?? $text;

            Cache::put($cacheKey, $translation, now()->addHour());

            return response()->json(['translation' => $translation]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error inesperado: ' . $e->getMessage()], 500);
        }
    }
    
}
