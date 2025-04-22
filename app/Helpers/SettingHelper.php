<?php
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

if (!function_exists('site_setting')) {
    function site_setting($key, $default = null)
    {
        // On récupère toutes les lignes une seule fois et on les met en cache
        $settings = Cache::rememberForever('site_settings', function () {
            return Setting::all()->keyBy('key');
        });

        // Si la clé existe, retourne la valeur non nulle (logo, email, etc.)
        if (isset($settings[$key])) {
            $setting = $settings[$key];

            return $setting->logo 
                ?? $setting->adresse 
                ?? $setting->email 
                ?? $setting->tel1 
                ?? $setting->tel2 
                ?? $setting->value 
                ?? $default;
        }

        return $default;
    }
}
