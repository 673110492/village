<?php

if (!function_exists('getYoutubeVideoId')) {
    /**
     * Extrait l'ID d'une vidéo YouTube depuis une URL.
     *
     * @param string|null $url
     * @return string|null
     */
    function getYoutubeVideoId(?string $url): ?string
    {
        if (empty($url)) {
            return null;
        }

        $patterns = [
            '#(?:https?://)?(?:www\.)?youtu\.be/([^\s&]+)#',
            '#(?:https?://)?(?:www\.)?youtube\.com/embed/([^\s&?]+)#',
            '#(?:https?://)?(?:www\.)?youtube\.com/watch\?v=([^\s&]+)#',
            '#(?:https?://)?(?:www\.)?youtube\.com/watch\?.*?&v=([^\s&]+)#',
            '#(?:https?://)?(?:www\.)?youtube\.com/shorts/([^\s&]+)#',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url, $matches)) {
                return $matches[1];
            }
        }

        return null;
    }
}