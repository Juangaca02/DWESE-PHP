<?php
$pass = "Antonio1234";
$hash_md5 = md5($pass);
echo $hash_md5 . "<br>";
$hash_password = password_hash($pass, PASSWORD_DEFAULT);
echo $hash_password . "<br><br>";

$pass2 = "Juan";
$hash_password2 = password_hash($pass2, PASSWORD_DEFAULT);
echo $hash_password2;

echo "<br>Comprobacion<br>";
$pass_usu = "Antonio1234";
if (md5($pass_usu) == $hash_md5) {
    echo "Contraseña Correcto";
} else {
    echo "Contraseña Incorrecto";
}


echo "<br>Comprobacion<br>";
if (password_verify($pass_usu, $hash_password)) {
    echo "Contraseña Correcto";
} else {
    echo "Contraseña Incorrecto";
}

?>