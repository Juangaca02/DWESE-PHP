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
        $min = $a;
        $int;
        if ($b > $max)
            $max = $b;
        if ($c > $max)
            $max = $c;

        if ($b < $min)
            $min = $b;
        if ($c < $min)
            $min = $c;
        if ($a != $max && $a != $min)
            $int = $a;
        if ($b != $max && $b != $min)
            $int = $b;
        if ($c != $max && $c != $min)
            $int = $c;
        echo "El maximo es $max <br>"
        . "El intermedio es $int <br>"
        . "El menor es $min";
        ?>
    </body>
</html>
