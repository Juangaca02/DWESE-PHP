<?php
require_once('Client.php');
$client = new Client();
$client->sum();
echo '<br>';
$client->getName();
echo '<br>';
$client->users();
echo '<br>';
?>