
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
				$consulta = "SELECT * from puestos";
				$ejecuta = mysqli_query($mysqli, $consulta);
				$res = mysqli_fetch_assoc($ejecuta);

				echo '<form>		

				<tr>											
					<td id="cabeceraTabla">CLAVE</td>
					<td><input type="text" id="datosTablaInsertar" value="' . $res['cve_pue'] . '" name="cve_pue" readonly /></td>									
				</tr>			
				<tr>
					<td id="cabeceraTabla">NOMBRE</td>
					<td><input type="text" id="datosTablaInsertar"  value="' . $res['nombre_pue'] . '"  name="nombre_pue" readonly /></td>
				</tr>	
				';
			}	?>
		</table>;
	</center>
</div>