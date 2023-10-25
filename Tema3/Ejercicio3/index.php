<html>
    <head>
        <meta charset="UTF8">
    </head>
    <body>
        <?php
        $nom = $dni2 = $fecha = $mail = $edad2 = true;
        if (isset($_POST['boton'])) {
            if (preg_match('/^[a-zA-Z]{1,30}$/', $_POST['nombre']) === 0) {
                $nom = false;
            }
            if (preg_match('/^\d{7}[A-Z]{1}$/', $_POST['dni']) === 0) {
                $dni2 = false;
            }
            if (preg_match('/  \/  \/  /', $_POST['dni']) === 0) {
                $dni2 = false;
            }
            if (preg_match('/\d{2}\/\d{2}\/\d{4}/', $_POST['fechaNaci']) === 0) {
                list($day, $month, $year) = explode("/", $_POST['fechaNaci']);
                if (checkdate($month, $day, $year) == false) {
                    $mail = false;
                }
                $mail = false;
            }


            if ($_POST['edad'] < 18) {
                $edad2 = false;
            }
        }
        ?>
        <form action="" method="POST">
            <div>
                Nombre: <input type="text" name="nombre">
                <?php
                if (isset($_POST['nombre']) && $nom == false) {
                    echo "Nombre Incorecto";
                }
                ?><br>
                Dni: <input type="text" name="dni">
                <?php
                if (isset($_POST['dni']) && $dni2 == false) {
                    echo "Dni Incorecto";
                }
                ?><br>
                Fecha Nacimiento: <input type="text" name="fechaNaci">
                <?php
                if (isset($_POST['fechaNaci']) && $fecha == false) {
                    echo "Fecha Incorecto";
                }
                ?><br>
                E-mail: <input type="email" name="email">
                <?php
                if (isset($_POST['email']) && $mail == false) {
                    echo "E-mail Incorecto";
                }
                ?><br>
                Edad: <input type="number" name="edad">
                <?php
                if (isset($_POST['edad']) && $edad2 == false) {
                    echo "Edad Incorecto";
                }
                ?><br>
                <input type="submit" name="boton" value="Aceptar"><br>
            </div>
        </form>

    </body>
</html>
