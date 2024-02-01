<?php
/**
 * Script para enviar una solicitud SOAP a un servicio InsertCategoria y mostrar la respuesta.
 *
 * @author Damián Gabriel Rodríguez Jiménez
 * @version 1.0
 */

/**
 * URL del servicio web SOAP.
 *
 * @var string $location
 */
$location = "http://localhost/proyectos/PERSONAL_SOAPSERVICE/InsertCategoria.php?wsdl";

/**
 * Solicitud SOAP en formato XML.
 *
 * @var string $request
 */
$request= "
<soapenv:Envelope xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:ins=\"InsertCategoriaSOAP\">
   <soapenv:Header/>
   <soapenv:Body>
      <ins:InsertCategoriaService soapenv:encodingStyle=\"http://schemas.xmlsoap.org/soap/encoding/\">
         <InsertCategoria xsi:type=\"ins:InsertCategoria\">
            <usu_nom xsi:type=\"xsd:string\">Juan</usu_nom>
            <usu_ape xsi:type=\"xsd:string\">Torres</usu_ape>
            <usu_correo xsi:type=\"xsd:string\">Torres@gmail.com</usu_correo>
         </InsertCategoria>
      </ins:InsertCategoriaService>
   </soapenv:Body>
</soapenv:Envelope>
";

/**
 * Imprimir la solicitud.
 */
print("Request : <br>");
print("<pre>".htmlentities($request)."/<pre>");

/**
 * Configuración de la solicitud cURL.
 */
$action = "InsertCategoriaService";
$headers = [
    'Method: POST',
    'Connection: Keep-Alive',
    'User-Agent: PHP-SOAP-CURL',
    'Content-Type: text/xml; charset=utf-8',
    'SOAPAction: "InsertCategoriaService"',
];

$ch = curl_init($location);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

/**
 * Realizar la solicitud cURL.
 *
 * @var string $response Respuesta del servicio web SOAP.
 */
$response = curl_exec($ch);
$err_status = curl_errno($ch);

/**
 * Imprimir la respuesta.
 */
print("Response : <br>");
print("<pre>".$response."/<pre>");

// Procesar la respuesta si es necesario
// ...

// Cerrar la conexión cURL
curl_close($ch);
?>





