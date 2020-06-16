<?php
include_once "encabezado.php";
?>
<?php

//MODIFICAR
if (isset($_GET["guardar"])) {
	//$consulta2 = "UPDATE departamentos SET nombre_dep= 'A' ,abrevia_dep='B',jefe_cve_per=2 WHERE cve_dep = 2";//. $_GET['cve_dep'];
	$consulta2 = "UPDATE usuarios_cargos SET user_usu='" . $_GET['user_usu'] . "',pass_usu='" . $_GET['pass_usu'] . "' ,cve_per='" . $_GET['cve_per'] . "' ,cve_pue='" . $_GET['cve_pue'] . "',cve_dep='" . $_GET['cve_dep'] . "' WHERE cve_usu =" . $_GET['cve_usu'];
	//echo $consulta3 = "UPDATE alumnocopia SET nom_alu='" . $_GET['nom_alu'] . "',app_alu='" . $_GET['app_alu'] . "',apm_alu='" . $_GET['apm_alu'] . "',tel_alu='" . $_GET['tel_alu'] . "',mensualidad_alu='" . $_GET['mensualidad_alu'] . "',grupo_alu='" . $_GET['grupo_alu'] . "', fchaing_alu='" . $_GET['fchaing_alu'] . "' WHERE cve_alu = " . $_GET['cve_alu'];
	$ejecuta2 = mysqli_query($mysqli, $consulta2);
	//$ejecuta2 = mysqli_query($mysqli, $consulta3);
	$res2 = $mysqli->affected_rows;
	if ($res2 == 1) {
		echo '<script> location.href="index.php";</script>';
	} else {
		echo "NO HAY DATOS2s";
	}
}

?>

<div>
	<center>

		<table width="200" border="0">

			<?PHP
			if (isset($_GET['cve'])) {
				//$consulta="SELECT * FROM persona WHERE persona.id_cve_alu=".$_GET['cve']; //consulta
				$consulta = "SELECT * from usuarios_cargos join puestos on puestos.cve_pue = usuarios_cargos.cve_pue join personals on personals.cve_per = usuarios_cargos.cve_per join departamentos on departamentos.cve_dep = usuarios_cargos.cve_dep where cve_usu=" . $_GET['cve']; //consulta
				$ejecuta = mysqli_query($mysqli, $consulta);
				$res = mysqli_fetch_assoc($ejecuta);

				$consulta3 = "SELECT * from personals"; //consulta
				$ejecuta3 = mysqli_query($mysqli, $consulta3);

				$consulta4 = "SELECT * from personals"; //cambiar
				$consulta5 = "SELECT * from departamentos"; //cambiar
				$consulta6 = "SELECT * from puestos"; //cambiar
				$ejecuta4 = mysqli_query($mysqli, $consulta4);
				$ejecuta5 = mysqli_query($mysqli, $consulta5);
				$ejecuta6 = mysqli_query($mysqli, $consulta6);
				echo '<form>		
				<tr>											
				<td id="cabeceraTabla">CLAVE</td>
				<td><input type="text" id="datosTablaInsertar" value="' . $res['cve_usu'] . '" readonly name="cve_usu"/></td>									
				</tr>			
				<tr>										
				<td id="cabeceraTabla">USUARIO</td>
				<td><input type="text" id="datosTablaInsertar" value="' . $res['user_usu'] . '" name="user_usu"/></td>									
				</tr>	
				<tr>										
				<td id="cabeceraTabla">PASSWORD</td>
				<td><input type="text" id="datosTablaInsertar" value="' . $res['pass_usu'] . '" name="pass_usu"/></td>									
				</tr>			
			';
			}
			?>
			<tr>
				<td id="cabeceraTabla" colspan="6">
					<div class="form-group">
						<label for="cve_per">NOMBRE</label>
						<select name="cve_per" class="form-control" onchange="myFunction()">
							<?PHP
							echo ' <option value=' . $res['cve_per'] . ' > ' . $res['nombre_per'] . ' ' . $res['app_per'] . ' ' . $res['apm_per'] . '</option>  ';
							while ($res4 = mysqli_fetch_assoc($ejecuta4)) {
								echo '<option value=' . $res4['cve_per'] . ' > ' . $res4['nombre_per'] . ' ' . $res4['app_per'] . ' ' . $res4['apm_per'] . ' </option> ';
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="cve_dep">DEPARTAMENTO</label>
						<select name="cve_dep" class="form-control" onchange="myFunction()">
							<?PHP
							echo ' <option value=' . $res['cve_dep'] . ' > ' . $res['nombre_dep'] . '</option>  ';
							while ($res5 = mysqli_fetch_assoc($ejecuta5)) {
								echo ' <option value=' . $res5['cve_dep'] . ' > ' . $res5['nombre_dep'] . ' </option>  ';
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="cve_pue">PUESTO</label>
						<select name="cve_pue" class="form-control" onchange="myFunction()">
							<?PHP
							echo ' <option value=' . $res['cve_pue'] . ' > ' . $res['nombre_pue'] . '</option>  ';
							while ($res6 = mysqli_fetch_assoc($ejecuta6)) {
								echo ' <option value=' . $res6['cve_pue'] . ' > ' . $res6['nombre_pue'] . ' </option>  ';
							}
							?>
						</select>
					</div>
					</td>
			</tr>
			<TR>
				<TD COLSPAN="6">
					<center>
						<input type="submit" value="Modificar" id="aceptar" name="guardar" />
					</center>
					</form>
				</TD>
			</TR>



		</table>;


	</center>
</div>

</body>


</html>