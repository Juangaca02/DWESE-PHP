<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Plantilla para Ejercicios Tema 3</title>
	<link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
	require_once("funciones.php");
	$conex = crearConexion();
	$familia = isset($_POST['familia']) ? $_POST['familia'] : "";
	var_dump($_POST);
	?>


	<div id="encabezado">
		<h1>Tarea: Listado de productos familia
			<form id="form_seleccion" action="" method="post">
				Familia:
				<?php crearSelectFamilias($conex, $familia); ?>
				<input type="submit" name="mostrar" value="mostrar">
			</form>
	</div>

	<div id="contenido">
		<h2>Contenido</h2>
		<?php
		if (isset($_POST['mostrar'])) {
			$result = $conex->query("select * from producto where familia like '$_POST[familia]'");
			while ($familia = $result->fetchObject()) {
				?>
				<form action="editar.php" method="post">
					<?php echo $familia->nombre_corto . ' - ' . $familia->pvp;
					echo "<input type='hidden' name='cod' value='$familia->cod'>"
						?>
					<input type="submit" name="editar" value="editar">
				</form>
				<?php
			}

		}
		?>
	</div>

	<div id="pie">
	</div>
</body>

</html>