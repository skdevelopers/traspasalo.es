<?php 

// app/helpers.php

use Illuminate\Support\Facades\DB;

if (!function_exists('translate')) {
    function translate($key, $locale = null)
    {
        $locale = $locale ?: app()->getLocale();
        $translation = DB::table('translations')
            ->where('key', $key)
            ->where('language', $locale)
            ->first();

        return $translation ? $translation->value : $key;
    }
}
