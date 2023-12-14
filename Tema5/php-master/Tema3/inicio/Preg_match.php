<<<<<<< HEAD
<html>

<head>
    <title>Login</title>
    <style>
        .fallo {
            text-decoration: underline;
            text-decoration-color: red;
        }
    </style>
</head>

<body>
    <?php
    $nombreval = $dnival = $fechaval = $emailval = $edadval = true;
    if (isset($_POST['enviar'])) {
        if (preg_match('/^[A-Za-z]{1,30}$/', $_POST['nombre']) === 0) {
            $nombreval = false;
        }
        if (preg_match('/^[1-9]{8}[A-Z]$/i', $_POST['dni']) === 0) {
            $dnival = false;
        }
        if (preg_match('/^\d{2}-\d{2}-\d{4}$/', $_POST['fecha']) === 0) {
            $fechaval = false;
        } else {
            list($dia, $mes, $anio) = explode("-", $_POST['fecha']);
            if (!checkdate($mes, $dia, $anio)) {
                $fechaval = false;
            }
        }
        if (preg_match('/^[A-Za-z0-9]*@[A-Za-z]*\.[A-Za-z]*$/i', $_POST['email']) === 0) {
            $emailval = false;
        }
        if ($_POST['edad'] < 18) {
            $edadval = false;
        }

    }
    ?>
    <form action="" method="post">
        <div <?php if (isset($_POST['nombre']) && $nombreval == false)
            echo "class='fallo'" ?>>Nombre:
            <?php if (!$nombreval)
            echo "El nombre no pueden tener ni números ni mas de 30 caracteres" ?>
            </div>
            <input type="text" name="nombre" value="<?php if (isset($_POST['nombre']))
            echo $_POST['nombre'] ?>">
            <div <?php if (isset($_POST['dni']) && $dnival == false)
            echo "class='fallo'" ?>>DNI:
            <?php if (!$dnival)
            echo "El DNI no es válido : 11111111A" ?>
            </div>
            <input type="text" name="dni" value="<?php if (isset($_POST['dni']))
            echo $_POST['dni'] ?>">
            <div <?php if (isset($_POST['fecha']) && $fechaval == false)
            echo "class='fallo'" ?>>Fecha nacimiento:
            <?php if (!$fechaval)
            echo "El formato de la fecha no es en adecuado dd-dd-dddd" ?>
            </div>
            <input type="text" name="fecha" value="<?php if (isset($_POST['fecha']))
            echo $_POST['fecha'] ?>">
            <div <?php if (isset($_POST['email']) && $emailval == false)
            echo "class='fallo'" ?>>E-mail:
            <?php if (!$emailval)
            echo "El E-mail no tiene el formato válido aaaa@aaaa.aaaa" ?>
            </div>
            <input type="text" name="email" value="<?php if (isset($_POST['email']))
            echo $_POST['email'] ?>">
            <div <?php if (isset($_POST['edad']) && $edadval == false)
            echo "class='fallo'" ?>>Edad:
            <?php if (!$edadval)
            echo "La edad debe ser mayor de 18" ?>
            </div>
            <input type="number" name="edad" value="<?php if (isset($_POST['edad']))
            echo $_POST['edad'] ?>">
            <br><input type="submit" name="enviar" value="enviar">
        </form>
    <?php if (($nombreval && $dnival && $fechaval && $emailval && $edadval == true) and isset($_POST['enviar']))
            echo "<h2>Formulario enviado correctamente</h2>"; ?>
</body>

=======
<html>

<head>
    <title>Login</title>
    <style>
        .fallo {
            text-decoration: underline;
            text-decoration-color: red;
        }
    </style>
</head>

<body>
    <?php
    $nombreval = $dnival = $fechaval = $emailval = $edadval = true;
    if (isset($_POST['enviar'])) {
        if (preg_match('/^[A-Za-z]{1,30}$/', $_POST['nombre']) === 0) {
            $nombreval = false;
        }
        if (preg_match('/^[1-9]{8}[A-Z]$/i', $_POST['dni']) === 0) {
            $dnival = false;
        }
        if (preg_match('/^\d{2}-\d{2}-\d{4}$/', $_POST['fecha']) === 0) {
            $fechaval = false;
        } else {
            list($dia, $mes, $anio) = explode("-", $_POST['fecha']);
            if (!checkdate($mes, $dia, $anio)) {
                $fechaval = false;
            }
        }
        if (preg_match('/^[A-Za-z0-9]*@[A-Za-z]*\.[A-Za-z]*$/i', $_POST['email']) === 0) {
            $emailval = false;
        }
        if ($_POST['edad'] < 18) {
            $edadval = false;
        }

    }
    ?>
    <form action="" method="post">
        <div <?php if (isset($_POST['nombre']) && $nombreval == false)
            echo "class='fallo'" ?>>Nombre:
            <?php if (!$nombreval)
            echo "El nombre no pueden tener ni números ni mas de 30 caracteres" ?>
            </div>
            <input type="text" name="nombre" value="<?php if (isset($_POST['nombre']))
            echo $_POST['nombre'] ?>">
            <div <?php if (isset($_POST['dni']) && $dnival == false)
            echo "class='fallo'" ?>>DNI:
            <?php if (!$dnival)
            echo "El DNI no es válido : 11111111A" ?>
            </div>
            <input type="text" name="dni" value="<?php if (isset($_POST['dni']))
            echo $_POST['dni'] ?>">
            <div <?php if (isset($_POST['fecha']) && $fechaval == false)
            echo "class='fallo'" ?>>Fecha nacimiento:
            <?php if (!$fechaval)
            echo "El formato de la fecha no es en adecuado dd-dd-dddd" ?>
            </div>
            <input type="text" name="fecha" value="<?php if (isset($_POST['fecha']))
            echo $_POST['fecha'] ?>">
            <div <?php if (isset($_POST['email']) && $emailval == false)
            echo "class='fallo'" ?>>E-mail:
            <?php if (!$emailval)
            echo "El E-mail no tiene el formato válido aaaa@aaaa.aaaa" ?>
            </div>
            <input type="text" name="email" value="<?php if (isset($_POST['email']))
            echo $_POST['email'] ?>">
            <div <?php if (isset($_POST['edad']) && $edadval == false)
            echo "class='fallo'" ?>>Edad:
            <?php if (!$edadval)
            echo "La edad debe ser mayor de 18" ?>
            </div>
            <input type="number" name="edad" value="<?php if (isset($_POST['edad']))
            echo $_POST['edad'] ?>">
            <br><input type="submit" name="enviar" value="enviar">
        </form>
    <?php if (($nombreval && $dnival && $fechaval && $emailval && $edadval == true) and isset($_POST['enviar']))
            echo "<h2>Formulario enviado correctamente</h2>"; ?>
</body>

>>>>>>> f94b01f6267d3c5706f2f6cd382322f8042ce4c4
</html>