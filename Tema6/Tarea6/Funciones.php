<?php
require_once './connection.php';
class Funciones
{
    public function getPVP($codigo)
    {
        try {
            $conex = new mysqli("localhost","dwes","abc123.","dwes");
            $stmt = $conex->query("SELECT PVP from producto  where cod='$codigo';");
            $conex->close();
            if ($result= $stmt->fetch_Object()) {
                $resultado =$result->PVP;
            } 
            return $resultado;
        } catch (\Exception $ex) {
            return false;
        }
    }
    public function getStock($cod_pro, $cod_tien)
    {
        try {
            $conex = new mysqli("localhost","dwes","abc123.","dwes");
            $stmt = $conex->query("SELECT unidades from stock  where producto='$cod_pro' and tienda = '$cod_tien';");
            $conex->close();
            if ($result= $stmt->fetch_Object()) {
                $resultado =$result->PVP;
            }
            return $resultado;
        } catch (\Exception $ex) {
            return false;
        }
    }
    public function getFamilias()
    {
        try {
            $conex = new mysqli("localhost","dwes","abc123.","dwes");
            $stmt = $conex->query("SELECT * from familia ;");
            while ($result = $stmt->fetch_Object()) {
                $familia[] = $result->cod;
            }
            $conex->close();
            return $familia;
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function getProductosFamilia($codigo)
    {
        try {
            $conex = new mysqli("localhost","dwes","abc123.","dwes");
            $stmt = $conex->query("SELECT * from familia f join producto p on f.cod = p.familia where f.cod = '$codigo';");
            
            $array = null;
            while ($result = $stmt->fetch_Object()) {
                $productos[] = $result->cod;
            }
            $conex->close();
            return $productos;
        } catch (\Exception $ex) {
            return false;
        }
    }
}
?>