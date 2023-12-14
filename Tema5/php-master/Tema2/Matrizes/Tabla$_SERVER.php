<html>
    <head>
        <title>$_SERVER</title>
    </head>
    <body>
        <table border="1px">
        <?php
            foreach ($_SERVER as $key => $value) {
                echo "<tr><td>$key<td><td>$value<td><tr>";
            }
        ?>
         </table>
    </body>
</html>

