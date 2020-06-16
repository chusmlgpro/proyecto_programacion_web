<?php
include_once "encabezado.php";
?>

<div>
	<center>

		<table width="200" border="0">


			<?PHP
			if (isset($_GET['cve'])) {
				//$consulta="SELECT * FROM persona WHERE persona.id_cve_alu=".$_GET['cve']; //consulta
				$consulta = "SELECT * from personals WHERE personals.cve_per=" . $_GET['cve']; //consulta
				$ejecuta = mysqli_query($mysqli, $consulta);
				$res = mysqli_fetch_assoc($ejecuta);

				echo '<form>		

				<tr>											
				<td id="cabeceraTabla">CLAVE</td>
				<td><input type="text" id="datosTablaInsertar" value="' . $res['cve_per'] . '" readonly name="cve_per" /></td>									
				</tr>		
				<tr>											
				<td id="cabeceraTabla">TITULO</td>
				<td><select name="titulo_per" class="form-control">
													<option value="' . $res['titulo_per'] . '">' . $res['titulo_per'] . '</option>
													<option value="Licenciatura en Administracion">Licenciatura en Administracion</option>
                                                    <option value="Contador Publico">Contador Publico</option>
                                                    <option value="Ingenieria en Gestion Empresarial">Ingenieria en Gestion Empresarial</option>
                                                    <option value="Arquitectura">Arquitectura</option>
                                                    <option value="Ingenieria Civil">Ingenieria Civil</option>
                                                    <option value="Ingenieria Electromecanica">Ingenieria Electromecanica</option>
                                                    <option value="Ingenieria en Industrias Alimentarias">Ingenieria en Industrias Alimentarias</option>
                                                    <option value="Ingenieria Agricola Sustentable">Ingenieria Agricola Sustentable</option>
                                                    <option value="Ingenieria Industrial">Ingenieria Industrial</option>
                                                    <option value="Ingenieria en Sistemas Computacionales">Ingenieria en Sistemas Computacionales</option>
                                                </select></td>
			</tr>		
			<tr>										
				<td id="cabeceraTabla">NOMBRE</td>
				<td><input type="text" id="datosTablaInsertar" value="' . $res['nombre_per'] . '" name="nombre_per"/></td>									
			</tr>	
			<tr>
				<td id="cabeceraTabla">PATERNO</td>
				<td><input type="text" id="datosTablaInsertar"  value="' . $res['app_per'] . '" name="app_per"/></td>
			</tr>	
			<tr>
				<td id="cabeceraTabla">MATERNO</td>
				<td><input type="text" id="datosTablaInsertar" value="' . $res['apm_per'] . '" name="apm_per"/></td>
			</tr>	
			<tr>
				<td id="cabeceraTabla">SEXO</td>
				<td><input type="text" id="datosTablaInsertar" value="' . $res['sexo_per'] . '" name="sexo_per" readonly /></td>
			</tr>
			<tr>
				<td id="cabeceraTabla">RFC</td>
				<td><input type="text" id="datosTablaInsertar" value="' . $res['rfc_per'] . '" name="rfc_per" /></td>
			</tr>	
			<tr>
				<td id="cabeceraTabla">CURP</td>
				<td><input type="text" id="datosTablaInsertar" value="' . $res['curp_per'] . '" name="curp_per" /></td>
			</tr>
			<tr>
				<td id="cabeceraTabla">CORREO</td>
				<td><input type="text" id="datosTablaInsertar" value="' . $res['correo_per'] . '" name="correo_per" /></td>
			</tr>
			
			';
			}
			?>

			<TR>
				<TD COLSPAN="6">
					<center>
						<input type="submit" value="Modificar" id="aceptar" name="guardar" />
					</center>
					</form>
				</TD>
			</TR>
			<?php

			//MODIFICAR
			if (isset($_GET["guardar"])) {
				$consulta2 = "UPDATE personals SET titulo_per='" . $_GET['titulo_per'] . "',nombre_per='" . $_GET['nombre_per'] . "',app_per='" . $_GET['app_per'] . "',apm_per='" . $_GET['apm_per'] . "',sexo_per='" . $_GET['sexo_per'] . "',rfc_per='" . $_GET['rfc_per'] . "',curp_per='" . $_GET['curp_per'] . "',correo_per='" . $_GET['correo_per'] . "' WHERE cve_per = " . $_GET['cve_per'];
				//echo $consulta3 = "UPDATE alumnocopia SET nom_alu='" . $_GET['nom_alu'] . "',app_alu='" . $_GET['app_alu'] . "',apm_alu='" . $_GET['apm_alu'] . "',tel_alu='" . $_GET['tel_alu'] . "',mensualidad_alu='" . $_GET['mensualidad_alu'] . "',grupo_alu='" . $_GET['grupo_alu'] . "', fchaing_alu='" . $_GET['fchaing_alu'] . "' WHERE cve_alu = " . $_GET['cve_alu'];
				$ejecuta2 = mysqli_query($mysqli, $consulta2);
				//$ejecuta2 = mysqli_query($mysqli, $consulta3);
				$res = $mysqli->affected_rows;
				if ($res == 1) {
					echo '<script> location.href="index.php";</script>';
				} else {
					echo "NO HAY DATOS";
				}
			}

			?>


		</table>;

	</center>
</div>

</body>

</html>