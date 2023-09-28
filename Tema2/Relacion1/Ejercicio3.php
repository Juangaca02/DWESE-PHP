
<?php

$a = rand(1, 20);
print_r($a);
echo '<br>';
$b = rand(1, 20);
print_r($b);
echo '<br>';
$c = rand(1, 20);
print_r($c);
echo '<br>';
if ($a > $b && $a > $c) {
    print_r($a);
}

if ($b > $a && $b > $c) {
    print_r($b);
} else {
    print($c);
}
?>
