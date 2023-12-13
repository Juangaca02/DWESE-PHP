<body>

    <?php
    if (isset($_POST['volver'])) {
        header("Location:index.php");
    }

    ?>

    <h1>Login</h1>
    <form action="" method="post">
        Dni:
        <input type="text" name="dni"><br>
        Contraseña:
        <input type="text" name="pass"><br>
        <input type="submit" value="Login" name="login">
        <input type="submit" value="Volver" name="volver">
    </form>
</body>