<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <?php
        $num = 1;
        $suma = 0;
        for (;$num <= 100; $num++){
            $suma += $num;
        }
        echo "$suma bucle for <br>";
        $num = 1;
        $suma = 0;
        while ($num <= 100){
            $suma += $num;
            $num++;
        }
        echo "$suma bucle while <br>";
        $num = 1;
        $suma = 0;
        do{
            $suma += $num;
            $num++;
        }while ($num <= 100);
        echo "$suma bucle do while <br>";
        ?>
    </body>
</html>

