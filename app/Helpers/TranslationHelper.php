<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TranslationHelper
{
    /**
     * Traduit un texte donné en utilisant LibreTranslate avec fallback sur plusieurs serveurs.
     *
     * @param string $text       Le texte source à traduire.
     * @param string $targetLang Le code de la langue cible (ex: 'en', 'es').
     * @param string $sourceLang Le code de la langue source (par défaut 'fr').
     * @return string            Le texte traduit ou le texte original en cas d'échec.
     */
    public static function translateText(string $text, string $targetLang = 'en', string $sourceLang = 'fr'): string
    {
        // Si le texte est vide, on retourne directement
        if (trim($text) === '') {
            return $text;
        }

        // Liste des endpoints LibreTranslate publics
        $endpoints = [
            'https://translate.argosopentech.com/translate',
            'https://libretranslate.de/translate',
            'https://libretranslate.com/translate',
        ];

        foreach ($endpoints as $endpoint) {
            try {
                $response = Http::timeout(5)
                    ->post($endpoint, [
                        'q' => $text,
                        'source' => $sourceLang,
                        'target' => $targetLang,
                        'format' => 'text',
                    ]);

                if ($response->successful()) {
                    $json = $response->json();
                    if (isset($json['translatedText'])) {
                        return $json['translatedText'];
                    }
                }
            } catch (\Exception $e) {
                // Log de l'erreur pour debug sans interrompre la boucle
                Log::warning("Traduction échouée sur $endpoint : {$e->getMessage()}");
                continue;
            }
        }

        // Si toutes les tentatives ont échoué, on retourne le texte original
        return $text;
    }
}
