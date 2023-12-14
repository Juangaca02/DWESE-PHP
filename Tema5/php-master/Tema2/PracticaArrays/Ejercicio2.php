<html>
    <head>
        <title>2</title>
    </head>
    <body>
        <?php
        $a=[];
        for ($i=0;$i<20;$i+=2){
            $a[] = $i;
        }
            
        foreach (array_reverse($a) as $value) {
            echo "$value<br>";
        }
        ?>
    </body>
</html>