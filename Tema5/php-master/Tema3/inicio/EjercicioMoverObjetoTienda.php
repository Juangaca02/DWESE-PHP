<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <?php
        //mysqli_report(MYSQLI_REPORT_OFF); Para desactivar excepciones
        try {
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
            $conex->set_charset("utf8mb4");
        } catch (Exception $ex) {
            die($ex->getMessage());
        }
        //echo $conex->server_info;
        $conex->autocommit(false);
        try {
            $conex->query("update stock set unidades=(unidades-1) where tienda=1 and producto='3DSNG'");
            $filasAfectadas = $conex->affected_rows;
            $conex->query("insert into stock values ('3DSNG', 3, 1)");
            $filasAfectadas += $conex->affected_rows;
            $conex->commit();
            echo "filas afectadas $filasAfectadas";
        } catch (Exception $exc) {
            $conex->rollback();
            echo $exc->getCode() . " " . $exc->getMessage();
        }
        $conex->autocommit(true);
        $conex->close();
        ?>
    </body>
</html>

