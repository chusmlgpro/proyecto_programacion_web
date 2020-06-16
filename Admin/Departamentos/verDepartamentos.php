
<?php
include_once "encabezado.php";
?>
<br><br><br><br><br><br><br><br><br><br><br><br>
<div>
	<center>

		<table width="200" border="0">


			<?PHP
			if (isset($_GET['cve'])) {
				//$consulta="SELECT * FROM persona WHERE persona.id_cve_per=".$_GET['cve']; //consulta
				$consulta = "SELECT * from personals join departamentos on personals.cve_per = departamentos.jefe_cve_per";
				$ejecuta = mysqli_query($mysqli, $consulta);
				$res = mysqli_fetch_assoc($ejecuta);

				echo '<form>		

				<tr>											
					<td id="cabeceraTabla">CLAVE</td>
					<td><input type="text" id="datosTablaInsertar" value="' . $res['cve_dep'] . '" name="cve_dep" readonly /></td>									
				</tr>			
				<tr>
					<td id="cabeceraTabla">NOMBRE</td>
					<td><input type="text" id="datosTablaInsertar"  value="' . $res['nombre_dep'] . '"  name="nombre_dep" readonly /></td>
				</tr>	
				<tr>
					<td id="cabeceraTabla">ABREVIACION</td>
					<td><input type="text" id="datosTablaInsertar" value="' . $res['abrevia_dep'] . '" name="abrevia_dep" readonly /></td>
				</tr>	
				<tr>
					<td colspan="2" id="cabeceraTabla">DATOS DEL JEFE</td>
				</tr>

				<tr>
				<td id="cabeceraTabla">TITULO</td>
				<td><input type="text" id="datosTablaInsertar" value="' . $res['titulo_per'] . '" name="titulo_per" readonly /></td>
				</tr>
				<tr>
				<td id="cabeceraTabla">NOMBRE JEFE</td>
				<td><input type="text" id="datosTablaInsertar" value="' . $res['nombre_per'] . '" name="nombre_per" readonly /></td>
				</tr>
				<tr>
				<td id="cabeceraTabla">PATERNO</td>
				<td><input type="text" id="datosTablaInsertar" value="' . $res['app_per'] . '" name="app_per" readonly /></td>
				</tr>
				<tr>
				<td id="cabeceraTabla">MATERNO</td>
				<td><input type="text" id="datosTablaInsertar" value="' . $res['apm_per'] . '" name="apm_per" readonly /></td>
				</tr>
				';
			}	?>
		</table>;
	</center>
</div>
