<?php

namespace App\Http\Services;

class XMLExtractor
{
    public static function extract($xml)
    {
        $xml = simplexml_load_string($xml);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        return $array;
    }
}