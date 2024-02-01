<?php
/**
 * Script que define un servicio web SOAP para la inserción y lectura de datos de usuarios.
 *
 * @author Damián Gabriel Rodríguez Jiménez
 * @version 1.0
 */

// Ruta de la clase Econea/Nusoap
require_once "vendor/econea/nusoap/src/nusoap.php";

/**
 * Espacio de nombres del servicio web SOAP.
 *
 * @var string $namespace
 */
$namespace = "InsertCategoriaSOAP";

/**
 * Instancia de la clase soap_server para configurar el servicio web SOAP.
 *
 * @var soap_server $server
 */
$server = new soap_server();
$server->configureWSDL("InsertCategoria", $namespace);
$server->wsdl->schemaTargetNamespace = $namespace;

/**
 * Definición de la estructura del servicio para la inserción de categorías.
 */
$server->wsdl->addComplexType(
    'InsertCategoria',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'usu_nom' => array('name' => 'usu_nom', 'type'=> 'xsd:string'),
        'usu_ape' => array('name' => 'usu_ape', 'type'=> 'xsd:string'),
        'usu_correo' => array('name' => 'usu_correo', 'type'=> 'xsd:string'),
    )
);

/**
 * Definición de la estructura de la respuesta del servicio para la inserción de categorías.
 */
$server->wsdl->addComplexType(
    'response',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'Resultado' => array('name' => 'Resultado', 'type'=> 'xsd:boolean'),
    )
);

/**
 * Registro del método InsertCategoriaService en el servicio web SOAP.
 */
$server->register(
    'InsertCategoriaService',
    array("InsertCategoria" => "tns:InsertCategoria"),
    array("InsertCategoria" => "tns:response"),
    $namespace,
    false,
    "rpc",
    "encoded",
    "Inserta una categoria"
);

/**
 * Implementación del método InsertCategoriaService para insertar usuarios en la base de datos.
 *
 * @param array $request Datos de usuario a insertar.
 *
 * @return array Respuesta del servicio con el resultado de la operación.
 */
function InsertCategoriaService($request){
    require_once "config/conexion.php";
    require_once "models/Usuario.php";

    $usuario = new Usuario();
    $usuario->insert_usuario($request["usu_nom"],$request["usu_ape"],$request["usu_correo"]);
    return array(
        "Resultado" => true
    );
}

/**
 * Registro del método LeerDatosService en el servicio web SOAP.
 */
$server->register(
    'LeerDatosService',
    array(),
    array('return' => 'xsd:string'),
    $namespace,
    'Lee los datos de la base de datos'
);

/**
 * Implementación del método LeerDatosService para leer datos de la base de datos y devolver en formato JSON.
 *
 * @return string Datos de usuarios en formato JSON.
 */
function LeerDatosService(){
    require_once "config/conexion.php";
    require_once "models/Usuario.php";

    $usuario = new Usuario();
    $resultados = $usuario->Leer_Datos();

    return json_encode($resultados);
}

/**
 * Obtener datos POST de la solicitud SOAP.
 */
$POST_DATA = file_get_contents("php://input");

/**
 * Procesar la solicitud y enviar la respuesta.
 */
$server->service($POST_DATA);

exit();
?>
