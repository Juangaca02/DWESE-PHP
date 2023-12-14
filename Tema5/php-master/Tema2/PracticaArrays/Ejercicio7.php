<html>
    <head>
        <title>7</title>
    </head>
    <body>
        <?php
            $personas = ["Pedro", "Ismael", "Sonia", "Clara", "Susana", "Alfonso", "Teresa"];
            
            echo "La lista tiene ".count($personas);
            echo "<ul>";
            foreach ($personas as $value) {
                echo "<li>$value</li>";
            }
            echo "</ul>";
        ?>
    </body>
</html>