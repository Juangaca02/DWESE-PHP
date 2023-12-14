<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <?php
        $num = 2;
        $suma = 0;
        for ($i = 0; $i < 100; $i++){
            $suma += $num;
            $num += 2;
        }
        echo $suma
        ?>
    </body>
</html>
