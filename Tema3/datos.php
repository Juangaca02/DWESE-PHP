<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        try {
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
        } catch (Exception $exc) {
            //echo $exc->getCode() . "-" . $exc->getMessage();
            die($exc->getMessage());
        }
        $conex->autocommit(false);
        $conex->set_charset("utf8mb4");
        try {
            $conex->query("UPDATE stock SET unidades=(unidades-1) WHERE producto='3DSNG' AND tienda=1;");
            $conex->query("INSERT stock VALUES('3DSNG',3,1)");
            $conex->commit();
            echo "TODO CORRECTO";
        } catch (Exception $exc) {
            $conex->rollback();
            echo "ERROR";
        }
        
        ?>
    </body>
</html>
