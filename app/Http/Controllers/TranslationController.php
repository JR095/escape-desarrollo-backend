<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class TranslationController extends Controller
{
    public function translate(Request $request)
    {
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
            $apiUrl = "https://lingva.ml/api/v1/$sourceLang/$targetLang/" . rawurlencode($text);
            $response = @file_get_contents($apiUrl); 

            if ($response === false) {
                return response()->json(['error' => 'Error al conectar con la API de traducción.'], 500);
            }

            $translation = json_decode($response, true)['translation'] ?? $text;

            Cache::put($cacheKey, $translation, now()->addHour());

            return response()->json(['translation' => $translation]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error inesperado: ' . $e->getMessage()], 500);
        }
    }
}
