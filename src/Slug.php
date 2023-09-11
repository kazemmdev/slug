<?php

namespace Kazemmdev\Slug;

class Slug
{
    /**
     * @param string $string
     * @param string $separator
     * @return string
     */
    public static function handle(string $string, string $separator = '-'): string
    {
        // remove phonetic arabic character
        $string = preg_replace('~[ًٌٍَُِّْٰٓٔ]+~u', '', $string);

        // remove _ to -
        $string = preg_replace('~ـ+~', $separator, $string);

        // replace non letter or digits by -
        $string = preg_replace('~[^\pL\d]+~u', $separator, $string);

        // lowercase
        $string = mb_strtolower($string, "UTF-8");

        // remove unwanted characters
        $string = preg_replace('~[^a-z0-9-\sءاأإآؤئبتثجچحخدذرزژسشصضطظعغفقكگلمنهويةىي]u+~', '', $string);

        // trim
        $string = trim($string);

        // remove duplicate -
        $string = preg_replace('~-+~', $separator, $string);

        // remove dashes if they exist at the start and end
        $string = trim($string, "-");

        if (empty($string)) {
            return '';
        }

        return $string;
    }
}