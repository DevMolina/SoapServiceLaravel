<?php
namespace App\Http\Soap;

class SoapResponse
{
    public static function create($data = []){
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">';
        $xml .= '<soap:Body>';
        foreach ($data as $d) {
            $xml .= "<quaternion>[{$d['w']}, {$d['x']}, {$d['y']}, {$d['z']}]</quaternion>";
        }
        $xml .= '</soap:Body>';
        $xml .= '</soap:Envelope>';

        return response($xml, 200)->header('Content-Type', 'text/xml');
    }
}