<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <?php
            $a = 2;
            $b = 7;
            $c = 5;
            $max = $a;
            if ($b > $max)
                $max = $b;
            if ($c > $max)
                $max = $c;
            
            echo "El numero mayor es $max"
            
         ?>
    </body>
</html>
