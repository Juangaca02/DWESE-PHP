<html>
    <head>
        <title>10</title>
    </head>
    <body>
        <table border ="1px">
        <?php
            $numeros=array(3,2,8,123,5,1); 
            sort($numeros);
            foreach ($numeros as $value) {
                echo "<tr><td>$value</td></tr>";
            }
         ?>   
        </table>
    </body>
</html>

