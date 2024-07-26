## Instalación 

`composer install`

## Execución
Para ejecutar el proyecti, ejecutar 
`php artisan serve`.

# Documentación del Webservice de Cuaterniones

Este webservice proporciona operaciones básicas con cuaterniones, incluyendo suma, resta, multiplicación y conjugado.

## Endpoints

1. `POST /soap/sum` - Suma de cuaterniones
2. `POST /soap/subs` - Resta de cuaterniones
3. `POST /soap/mult` - Multiplicación de cuaterniones
4. `POST /soap/conj` - Conjugado de un cuaternión

## Formato de la Solicitud

La aplicación no posee validación de datos, por lo tanto, es necesario que los cuaterniones sean pasados en el formato correcto, de lo contrario, el resultado no será el esperado.

La aplicación no consume los parámetros pasados en el cuerpo de la solicitud SOAP, sino los parámetros de la solicitud POST, por lo tanto, el cuerpo de la solicitud SOAP no influye en el resultado.

### Ejemplo de Solicitud XML

# Ejemplo de Uso del Webservice de Cuaterniones

## Suma de Cuaterniones

### Solicitud Suma

```xml
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns="http://127.0.0.1:8000/">
   <soapenv:Header/>
   <soapenv:Body>
      <ns:sumQuaternions>
         <ns:quat1>1,2,3,4</ns:quat1>
         <ns:quat2>4,3,2,1</ns:quat2>
      </ns:sumQuaternions>
   </soapenv:Body>
</soapenv:Envelope>

### Solicitud Resta

```xml
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns="http://127.0.0.1:8000/">
   <soapenv:Header/>
   <soapenv:Body>
      <ns:subtractQuaternions>
         <ns:quat1>5,6,7,8</ns:quat1>
         <ns:quat2>1,2,3,4</ns:quat2>
      </ns:subtractQuaternions>
   </soapenv:Body>
</soapenv:Envelope>

### Solicitud Multiplicación

```xml
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns="http://127.0.0.1:8000/">
   <soapenv:Header/>
   <soapenv:Body>
      <ns:multiplyQuaternions>
         <ns:quat1>1,0,0,0</ns:quat1>
         <ns:quat2>0,1,0,0</ns:quat2>
      </ns:multiplyQuaternions>
   </soapenv:Body>
</soapenv:Envelope>

### Solicitud Conjugado

```xml
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns="http://127.0.0.1:8000/">
   <soapenv:Header/>
   <soapenv:Body>
      <ns:conjugateQuaternion>
         <ns:quat>1,2,3,4</ns:quat>
      </ns:conjugateQuaternion>
   </soapenv:Body>
</soapenv:Envelope>