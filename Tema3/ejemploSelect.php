<?php

try {
    $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
} catch (Exception $exc) {
    die($exc->getTraceAsString());
}


try {
    $result = $conex->query("SELECT * FROM producto;");
    //echo $result->num_rows;
    //$fila=$result->fetch_array();
    //$fila=$result->fetch_assoc();
    //$fila=$result->fetch_row();
    //echo $fila[0]."-".$fila['nombre_corto'];
    //var_dump($fila);
    /*
     * Recorre el Array Y devuelve todos los valores que halla con las especificaciones que digas
      while ( $fila=$result->fetch_array()) {
            echo $fila[0]."-".$fila['nombre_corto']."<br>";
      }
      while ( $fila=$result->fetch_object()) {
            echo $fila->cod."-".$fila->nombre_corto."<br>";
      }
     */
    
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
    echo $exc->getMessage();
}

