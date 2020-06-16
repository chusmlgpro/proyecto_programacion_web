<?php
include_once "encabezado.php";
?>
<br><br><br><br><br><br><br><br>
<center>

<table width="200" border="0">
<?PHP
if (isset($_GET['cve'])) {
	//$consulta="SELECT * FROM persona WHERE persona.id_cve_per=".$_GET['cve']; //consulta
	$consulta = "SELECT * from usuarios_cargos join puestos on puestos.cve_pue = usuarios_cargos.cve_pue join personals on personals.cve_per = usuarios_cargos.cve_per join departamentos on departamentos.cve_dep = usuarios_cargos.cve_dep where cve_usu=" .$_GET['cve'];
	$ejecuta = mysqli_query($mysqli, $consulta);
	$res = mysqli_fetch_assoc($ejecuta);

	echo '<form>		

	<tr>											
		<td id="cabeceraTabla">CLAVE</td>
		<td><input type="text" id="datosTablaInsertar" value="' . $res['cve_usu'] . '" name="cve_usu" readonly /></td>									
	</tr>		
	<tr>	 									
		<td id="cabeceraTabla">USUARIO</td>
		<td><input type="text" id="datosTablaInsertar" value="' . $res['user_usu'] . '" name="user_usu" readonly /></td>									
	</tr>	
	<tr>
		<td id="cabeceraTabla">CONTRASEÑA</td>
		<td><input type="text" id="datosTablaInsertar"  value="' . $res['pass_usu'] . '"  name="pass_usu" readonly /></td>
	</tr>	
	<tr>
		<td id="cabeceraTabla">NOMBRE</td>
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
	<tr>
		<td id="cabeceraTabla">PUESTO</td>
		<td><input type="text" id="datosTablaInsertar" value="' . $res['nombre_pue'] . '" name="nombre_pue" readonly /></td>
	</tr>					
	<tr>
		<td id="cabeceraTabla">DEPARTAMENTO</td>
		<td><input type="text" id="datosTablaInsertar" value="' . $res['nombre_dep'] . '" name="nombre_dep" readonly /></td>			
	</tr>	


	';
}
?>
		</table>;
</div>