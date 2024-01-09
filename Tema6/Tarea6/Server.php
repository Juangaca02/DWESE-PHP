<?php
require_once __DIR__ . '/vendor/autoload.php';
class Server
{
    private $_soapServer = null;
    public function __construct()
    {
        require_once('Funciones.php');
        $this->_soapServer = new nusoap_server();
        $miURL = 'http://localhost/DWESE-PHP/Tema6/Tarea6/Server.php';
        $this->_soapServer->configureWSDL("Example WSDL", $miURL);
        $this->_soapServer->wsdl->schemaTargetNamespace = $miURL;
        /* Registrar puntos de entrada a nuestro Webservice: Para dar acceso al cliente, debemos utilizar el método
       register dentro del constructor que hemos creado anteriormente. */
        $this->_soapServer->register(
            'Funciones.getPVP', // method name
            array('CodigoProducto' => "xsd:string"), // input parameters
            array('return' => 'xsd:float'), // output parameters
            false, // namespace
            false, // soapaction
            'rpc', // style
            'encoded',
            'Servicio que retorna un string de productos' // documentation
        );
        $this->_soapServer->register(
            'Funciones.getStock',
            array('CodigoProducto' => 'xsd:string', 'CodigoTienda' => 'xsd:string'),
            array('return' => 'xsd:int'),
            false,
            false,
            'rpc', // style
            'encoded',
            "Servicio que retorna stock existente"
        );
        $this->_soapServer->register(
            "Funciones.getFamilias",
            array(),
            array("return" => "xsd:Array"),
            false,
            false,
            'rpc', // style
            'encoded',
            "Servicio que retorna un array con los códigos de todas las familias existentes"
        );
        $this->_soapServer->register(
            "Funciones.getProductosFamilia",
            array('CodigoFamilia' => "xsd:string"),
            array("return" => "xsd:Array"),
            false,
            false,
            'rpc', // style
            'encoded',
            "Servicio que retorna un array con los
            códigos de todos los productos de esa familia"
        );
        //procesamos el webservice
        $this->_soapServer->service(file_get_contents("php://input"));
    }
}

$server = new Server();
?>