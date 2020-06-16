
<?php
include_once "encabezado.php";
?>
<br><br><br><br><br><br><br><br>
<div>
	<center>

		<table width="200" border="0">


			<?PHP
			if (isset($_GET['cve'])) {
				//$consulta="SELECT * FROM persona WHERE persona.id_cve_per=".$_GET['cve']; //consulta
				$consulta = "SELECT * from personals where cve_per=".$_GET['cve'];
				$ejecuta = mysqli_query($mysqli, $consulta);
				$res = mysqli_fetch_assoc($ejecuta);

				echo '<form>		
<tr>
<td>
				<tr>											
					<td id="cabeceraTabla">CLAVE</td>
					<td><input type="text" id="datosTablaInsertar" value="' . $res['cve_per'] . '" name="cve_per" readonly /></td>									
					<td rowspan="10"><img src="fotos/'.$res['foto_per'].'" width="350px" heigth="350px" /></td>	
				</tr>

				<tr>	 									
					<td id="cabeceraTabla">TITULO</td>
					<td><input type="text" id="datosTablaInsertar" value="' . $res['titulo_per'] . '" name="titulo_per" readonly /></td>									
				</tr>	
				<tr>
					<td id="cabeceraTabla">NOMBRE</td>
					<td><input type="text" id="datosTablaInsertar"  value="' . $res['nombre_per'] . '"  name="nombre_per" readonly /></td>
				</tr>	
				<tr>
					<td id="cabeceraTabla">PATERNO</td>
					<td><input type="text" id="datosTablaInsertar" value="' . $res['app_per'] . '" name="app_per" readonly /></td>
				</tr>	
				<tr>
				<td id="cabeceraTabla">MATERNO</td>
				<td><input type="text" id="datosTablaInsertar" value="' . $res['apm_per'] . '" name="apm_per" readonly /></td>
				</tr>
				<tr>
					<td id="cabeceraTabla">GENERO</td>
					<td><input type="text" id="datosTablaInsertar" value="' . $res['sexo_per'] . '" name="sexo_per" readonly /></td>
				</tr>					
				<tr>
					<td id="cabeceraTabla">RFC</td>
					<td><input type="text" id="datosTablaInsertar" value="' . $res['rfc_per'] . '" name="rfc_per" readonly /></td>			
				</tr>	
				<tr>
					<td id="cabeceraTabla">CURP</td>					
					<td><input type="text" id="datosTablaInsertar" value="' . $res['curp_per'] . '" name="curp_per"  readonly /></td>			
				</tr>
					
				<tr>
				<td id="cabeceraTabla">CORREO</td>					
				<td><input type="text" id="datosTablaInsertar" value="' . $res['correo_per'] . '" name="correo_per"  readonly /></td>			
				</tr>
				</td>	
				</tr>
				';
			}	?>
		</table>;
	</center>
</div>
