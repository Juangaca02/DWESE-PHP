<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <table border = "1px">
            <?php
            do{
                $random = rand(0,100);
            }while ($random % 2 != 0);
                for ($i = 0; $i < 10; $i++){
                    echo "<tr>";
                    for ($j = 0; $j < 10; $j++){
                        echo "<td>".($random+=2)."</td>";
                    }
                    echo "</tr>";
                }
            ?>
        </table>

    </body>
</html>

