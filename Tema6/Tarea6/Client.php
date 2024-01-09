<?php
/* En este archivo estableceremos la comunicación con nuestro servidor SOAP */
require_once __DIR__ . '/vendor/autoload.php';
class Client
{
    private $_soapClient = null;
    public function __construct()
    {
        $this->_soapClient = new nusoap_client("http://localhost/DWESE-PHP/Tema6/Tarea6/Server.php?wsdl");
    }
    public function obtenerPVP($codigo)
    {
        $result = $this->_soapClient->call('Funciones.getPVP', array('CodigoProducto'=>$codigo));
        echo 'El precio del producto es:'.$result;
    }
    public function getStock($CodigoProducto, $CodigoTienda)
    {
        $result = $this->_soapClient->call('Funciones.getStock', array('CodigoProducto' =>$CodigoProducto, 'CodigoTienda' => $CodigoTienda));
        echo "El producto $CodigoProducto tiene stockde: ".$result." en la tienda $CodigoTienda";
    }
    public function getFamilias()
    {
        $result = $this->_soapClient->call('Funciones.getFamilias', array());
        print_r($result);
    }
    public function getProductosFamilia($CodigoFamilia)
    {
        $result = $this->_soapClient->call('Funciones.getProductosFamilia', array('CodigoFamilia' =>$CodigoFamilia));
        print_r($result);
    }
    
}
?>