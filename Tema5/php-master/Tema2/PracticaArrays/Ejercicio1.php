<html>
    <head>
        <title>1</title>
    </head>
    <body>
        <?php
        $a=[];
        for ($i=0;$i<20;$i+=2){
            $a[] = $i;
        }
            
        foreach ($a as $value) {
            echo "$value<br>";
        }
        ?>
    </body>
</html>