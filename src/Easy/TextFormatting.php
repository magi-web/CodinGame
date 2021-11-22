<?php

declare(strict_types=1);


namespace App\Easy;

class TextFormatting
{
    public static function format(string $string): string
    {
        $intext = ucfirst(strtolower($string));

        $intext = str_replace([','], [', '], $intext);

        $intext = preg_replace_callback('/(\.\s*([a-z]))/', static function ($matches) {return '. ' . ucfirst($matches[2]);}, $intext);
        $intext = preg_replace_callback('/\s+([.,])/', static function ($matches) { return $matches[1]; }, $intext);
        $intext = preg_replace_callback('/(([.,])([.,])+)+/', static function ($matches) { return $matches[2]; }, $intext);

        $intext = preg_replace('/\s+/', ' ', $intext);

        return trim($intext);
    }
}
