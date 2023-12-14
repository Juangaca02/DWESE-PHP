<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <table border = "1px">
        <?php
        $cont = 1;
         for ($i = 0; $i < 5; $i++){
                    echo "<tr>";
                    for ($j = 0; $j < 7; $j++){
                        echo "<td>".($cont)."</td>";
                        $cont++;
                    }
                    echo "</tr>";
                }
        ?>
        </table>
    </body>
</html>
