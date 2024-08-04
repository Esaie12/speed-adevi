<?php

use Illuminate\Support\Str;

if (!function_exists('slugify')) {
    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param  string  $text
     * @return string
     */
    function slugify(string $text): string
    {
        $slug = Str::slug($text);
        $uniqueString = Str::lower(Str::random(3));

        return "{$uniqueString}-{$slug}";
    }
}

if (!function_exists('format_money')) {
    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param  string  $text
     * @return string
     */
    function format_money(int $mtn): string
    {
        $montant = $mtn." FCFA";

        return $montant;
    }
}
