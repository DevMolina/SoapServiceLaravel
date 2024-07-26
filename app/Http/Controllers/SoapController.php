<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Soap\SoapResponse;
use App\Models\Quaternion;

class SoapController extends Controller
{

    //Funcion para sumar
    public function sumQuaternions(Request $request)
    {
        try {
            // Obtener el contenido XML del cuerpo de la solicitud
            $xmlContent = $request->getContent();

            // Cargar el XML y manejar espacios de nombres
            $xml = new \SimpleXMLElement($xmlContent);

            // Registrar el espacio de nombres
            $xml->registerXPathNamespace('ns', 'http://127.0.0.1:8000/');

            // Extraer los valores de quat1 y quat2
            $quat1Nodes = $xml->xpath('//ns:quat1');
            $quat2Nodes = $xml->xpath('//ns:quat2');

            // Verificar que se hayan encontrado los nodos quat1 y quat2
            if (empty($quat1Nodes) || empty($quat2Nodes)) {
                return response()->json(['error' => 'Both quat1 and quat2 are required'], 400);
            }

            $quat1 = (string) $quat1Nodes[0];
            $quat2 = (string) $quat2Nodes[0];

            // Verificar que ambos cuaterniones no estén vacíos
            if (empty($quat1) || empty($quat2)) {
                return response()->json(['error' => 'Both quat1 and quat2 are required'], 400);
            }

            // Convertir las cadenas de cuaterniones en arreglos
            $q1 = explode(',', $quat1);
            $q2 = explode(',', $quat2);

            // Verificar que ambos arreglos tengan la longitud correcta
            if (count($q1) != 4 || count($q2) != 4) {
                return response()->json(['error' => 'Both quat1 and quat2 must have four components'], 400);
            }

            // Crear los objetos Quaternion y asignar valores
            $quaternion1 = new Quaternion();
            $quaternion1->a = $q1[0];
            $quaternion1->b = $q1[1];
            $quaternion1->c = $q1[2];
            $quaternion1->d = $q1[3];

            $quaternion2 = new Quaternion();
            $quaternion2->a = $q2[0];
            $quaternion2->b = $q2[1];
            $quaternion2->c = $q2[2];
            $quaternion2->d = $q2[3];

            // Sumar los cuaterniones
            $result = [
                'w' => $quaternion1->a + $quaternion2->a,
                'x' => $quaternion1->b + $quaternion2->b,
                'y' => $quaternion1->c + $quaternion2->c,
                'z' => $quaternion1->d + $quaternion2->d
            ];

            // Retornar el resultado
            return SoapResponse::create(['result' => $result]);

        } catch (\Exception $e) {
            // Manejar cualquier excepción inesperada
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    //Funcion para Restar
    public function subtractQuaternions(Request $request)
    {
    try {
        // Obtener el contenido XML del cuerpo de la solicitud
        $xmlContent = $request->getContent();

        // Cargar el XML y manejar espacios de nombres
        $xml = new \SimpleXMLElement($xmlContent);

        // Registrar el espacio de nombres
        $xml->registerXPathNamespace('ns', 'http://127.0.0.1:8000/');

        // Extraer los valores de quat1 y quat2
        $quat1Nodes = $xml->xpath('//ns:quat1');
        $quat2Nodes = $xml->xpath('//ns:quat2');

        // Verificar que se hayan encontrado los nodos quat1 y quat2
        if (empty($quat1Nodes) || empty($quat2Nodes)) {
            return response()->json(['error' => 'Both quat1 and quat2 are required'], 400);
        }

        $quat1 = (string) $quat1Nodes[0];
        $quat2 = (string) $quat2Nodes[0];

        // Verificar que ambos cuaterniones no estén vacíos
        if (empty($quat1) || empty($quat2)) {
            return response()->json(['error' => 'Both quat1 and quat2 are required'], 400);
        }

        // Convertir las cadenas de cuaterniones en arreglos
        $q1 = explode(',', $quat1);
        $q2 = explode(',', $quat2);

        // Verificar que ambos arreglos tengan la longitud correcta
        if (count($q1) != 4 || count($q2) != 4) {
            return response()->json(['error' => 'Both quat1 and quat2 must have four components'], 400);
        }

        // Crear los objetos Quaternion y asignar valores
        $quaternion1 = new Quaternion();
        $quaternion1->a = $q1[0];
        $quaternion1->b = $q1[1];
        $quaternion1->c = $q1[2];
        $quaternion1->d = $q1[3];

        $quaternion2 = new Quaternion();
        $quaternion2->a = $q2[0];
        $quaternion2->b = $q2[1];
        $quaternion2->c = $q2[2];
        $quaternion2->d = $q2[3];

        // Restar los cuaterniones
        $result = [
            'w' => $quaternion1->a - $quaternion2->a,
            'x' => $quaternion1->b - $quaternion2->b,
            'y' => $quaternion1->c - $quaternion2->c,
            'z' => $quaternion1->d - $quaternion2->d
        ];

        // Retornar el resultado
        return SoapResponse::create(['result' => $result]);

        } catch (\Exception $e) {
            // Manejar cualquier excepción inesperada
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    //funcion para multiplicar 
    public function multiplyQuaternions(Request $request)
{
    try {
        // Obtener el contenido XML del cuerpo de la solicitud
        $xmlContent = $request->getContent();

        // Cargar el XML y manejar espacios de nombres
        $xml = new \SimpleXMLElement($xmlContent);

        // Registrar el espacio de nombres
        $xml->registerXPathNamespace('ns', 'http://127.0.0.1:8000/');

        // Extraer los valores de quat1 y quat2
        $quat1Nodes = $xml->xpath('//ns:quat1');
        $quat2Nodes = $xml->xpath('//ns:quat2');

        // Verificar que se hayan encontrado los nodos quat1 y quat2
        if (empty($quat1Nodes) || empty($quat2Nodes)) {
            return response()->json(['error' => 'Both quat1 and quat2 are required'], 400);
        }

        $quat1 = (string) $quat1Nodes[0];
        $quat2 = (string) $quat2Nodes[0];

        // Verificar que ambos cuaterniones no estén vacíos
        if (empty($quat1) || empty($quat2)) {
            return response()->json(['error' => 'Both quat1 and quat2 are required'], 400);
        }

        // Convertir las cadenas de cuaterniones en arreglos
        $q1 = explode(',', $quat1);
        $q2 = explode(',', $quat2);

        // Verificar que ambos arreglos tengan la longitud correcta
        if (count($q1) != 4 || count($q2) != 4) {
            return response()->json(['error' => 'Both quat1 and quat2 must have four components'], 400);
        }

        // Crear los objetos Quaternion y asignar valores
        $quaternion1 = new Quaternion();
        $quaternion1->a = $q1[0];
        $quaternion1->b = $q1[1];
        $quaternion1->c = $q1[2];
        $quaternion1->d = $q1[3];

        $quaternion2 = new Quaternion();
        $quaternion2->a = $q2[0];
        $quaternion2->b = $q2[1];
        $quaternion2->c = $q2[2];
        $quaternion2->d = $q2[3];

        // Multiplicar los cuaterniones
        $result = [
            'w' => $quaternion1->a * $quaternion2->a - $quaternion1->b * $quaternion2->b - $quaternion1->c * $quaternion2->c - $quaternion1->d * $quaternion2->d,
            'x' => $quaternion1->a * $quaternion2->b + $quaternion1->b * $quaternion2->a + $quaternion1->c * $quaternion2->d - $quaternion1->d * $quaternion2->c,
            'y' => $quaternion1->a * $quaternion2->c - $quaternion1->b * $quaternion2->d + $quaternion1->c * $quaternion2->a + $quaternion1->d * $quaternion2->b,
            'z' => $quaternion1->a * $quaternion2->d + $quaternion1->b * $quaternion2->c - $quaternion1->c * $quaternion2->b + $quaternion1->d * $quaternion2->a
        ];

        // Retornar el resultado
        return SoapResponse::create(['result' => $result]);

    } catch (\Exception $e) {
        // Manejar cualquier excepción inesperada
        return response()->json(['error' => $e->getMessage()], 500);
    }
}
//Conjugado
public function conjugateQuaternion(Request $request)
{
    try {
        // Obtener el contenido XML del cuerpo de la solicitud
        $xmlContent = $request->getContent();

        // Cargar el XML y manejar espacios de nombres
        $xml = new \SimpleXMLElement($xmlContent);

        // Registrar el espacio de nombres
        $xml->registerXPathNamespace('ns', 'http://127.0.0.1:8000/');

        // Extraer el valor de quat
        $quatNodes = $xml->xpath('//ns:quat');

        // Verificar que se haya encontrado el nodo quat
        if (empty($quatNodes)) {
            return response()->json(['error' => 'Quaternion quat is required'], 400);
        }

        $quat = (string) $quatNodes[0];

        // Verificar que el cuaternión no esté vacío
        if (empty($quat)) {
            return response()->json(['error' => 'Quaternion quat is required'], 400);
        }

        // Convertir la cadena del cuaternión en un arreglo
        $q = explode(',', $quat);

        // Verificar que el arreglo tenga la longitud correcta
        if (count($q) != 4) {
            return response()->json(['error' => 'Quaternion quat must have four components'], 400);
        }

        // Crear el objeto Quaternion y asignar valores
        $quaternion = new Quaternion();
        $quaternion->a = $q[0];
        $quaternion->b = $q[1];
        $quaternion->c = $q[2];
        $quaternion->d = $q[3];

        // Conjugado del cuaternión
        $result = [
            'w' => $quaternion->a,
            'x' => -$quaternion->b,
            'y' => -$quaternion->c,
            'z' => -$quaternion->d
        ];

        // Retornar el resultado
        return SoapResponse::create(['result' => $result]);

    } catch (\Exception $e) {
        // Manejar cualquier excepción inesperada
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

}
