<?php
require_once("../../Base_de_datos/conexion.php");
session_start();

if (!isset($_SESSION['rol'])) {
    header('location: ../index.php?Error=Acceso_denegado');
} else {
    if ($_SESSION['rol'] != 1) {
        header('location: ../index.php?Error=Acceso_denegado');
    }
}
?>
<?php
	$consulta="delete from usuarios_cargos where cve_usu =".$_GET['cve'];
	$ejecuta=mysqli_query($mysqli,$consulta);

	//$res = mysqli::$affected_rows;
	$res=$mysqli->affected_rows;
	
	if($res==1)
	{
	//echo '<script>alert("datoeliminado");</script>';	
	echo '<script> location.href="index.php";</script>';
	}
	else{ echo "NO HAY DATOS";}		
	
?>
