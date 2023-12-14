<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <table border = "1px">
        <?php
        $cont = 1;
        $i = 0;
        do {
            $j = 0;
             echo "<tr>";
             while ($j < 7){
                 echo "<td>".($cont)."</td>";
                  $cont++;
                  $j++;
             }
              echo "</tr>";
              $i++;
        }while ($i < 5)
        ?>
        </table>
        
    </body>
</html>
