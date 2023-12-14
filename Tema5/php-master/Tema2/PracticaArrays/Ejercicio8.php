<html>
    <head>
        <title>8</title>
    </head>
    <body>
        <?php
            for ($index = 1; $index < 11; $index++) {
                $array[] = $index;
            }
            $media = 0;
            $suma = 0;
            foreach ($array as $value) {
                if ($value % 2 == 0) {
                    $suma += $value;
                }
            }
            $media = $suma / (count($array) / 2);
            echo "$media"
        ?>
    </body>
</html>

