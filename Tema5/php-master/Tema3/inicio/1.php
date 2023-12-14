<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <?php
        //mysqli_report(MYSQLI_REPORT_OFF);
        $conex = new mysqli('localhost', 'dwes', 'abc123.', 'prueba');
        $conex->set_charset("utf8mb4");
        if ($conex->connect_errno) {
            die('Error');
        } else{
            echo 'Okey<br>';
            //echo $conex->server_info;
            $conex->query("insert into empleados (Id, Nombre, Apellidos, Salario) values (1, 'Juan David', 'Fernandez', 1000000000)");
            if (!$conex->errno){
                echo 'Todo Correcto';
            }
            $conex->query("update empleados set Salario=1 where Nombre='Juan David'");
            $conex->close();
        }
        ?>
    </body>
</html>
