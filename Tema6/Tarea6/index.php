<?php
require_once './Client.php';
$client = new Client();
$client->obtenerPVP('3DSNG');
echo '<br>';
$client->getStock('ARCLPMP32GBN', 'MP3');
echo '<br>';
$client->getFamilias();
echo '<br>';
$client->getProductosFamilia('CAMARA');
echo '<br>';

?>