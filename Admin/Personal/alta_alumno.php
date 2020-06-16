<?php
$basededatos='itz';
	$mysqli = new mysqli('localhost','root','',$basededatos);
	if($mysqli->connect_errno){
	echo "error".$mysqli->connect_error;
	
	}else{ 
//	echo "conecto \n";
//	echo "";	
	}
if (!isset($_POST['titulo_per']) &&  !isset($_POST['nombre_per']) && !isset($_POST['app_per']) && !isset($_POST['apm_per']) && !isset($_POST['sexo_per']) && !isset($_POST['rfc_per']) && !isset($_POST['curp_per']) && !isset($_POST['corro_per'])) {
    echo '<script>location.href="insertarPersonal.php";</script>';
} else {
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES["foto_per"]["name"]);
    $extension = end($temp);
    $foto_per = "";
    $random = rand(1, 999999);
    /*if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/x-png")
        || ($_FILES["file"]["type"] == "image/png"))) {*/
        //Verificamos que sea una imagen
        if ($_FILES["foto_per"]["error"] > 0) {
            //verificamos que venga algo en el input file
            echo "Error numero: " . $_FILES["foto_per"]["error"] . "<br>";
        } else {
            //subimos la imagen

            $foto_per = $random . '_' . $_FILES["foto_per"]["name"];
            if (file_exists("fotos/" . $random . '_' . $_FILES["foto_per"]["name"])) {
                echo $_FILES["foto_per"]["name"] . " Ya existe. ";
            } else {
                move_uploaded_file(
                    $_FILES["foto_per"]["tmp_name"],
                    "fotos/" . $random . '_' . $_FILES["foto_per"]["name"]
                );
                $titulo_per = $_POST['titulo_per'];
                $nombre_per = $_POST['nombre_per'];
                $app_per = $_POST['app_per'];
                $apm_per = $_POST['apm_per'];
                $sexo_per = $_POST['sexo_per'];
                $rfc_per = $_POST['rfc_per'];
                $curp_per = $_POST['curp_per'];
                $correo_per = $_POST['correo_per'];
                $Sql = "insert into personals (titulo_per,nombre_per,app_per,apm_per,sexo_per,rfc_per,curp_per,foto_per,correo_per) values(
							'" . $titulo_per . "',
							'" . $nombre_per . "',
							'" . $app_per . "',
							'" . $apm_per . "',
                            '" . $sexo_per . "',
                            '" . $rfc_per . "',
                            '" . $curp_per . "',
                            '" . $foto_per . "',
                            '" . $correo_per . "')";
                mysqli_query($mysqli, $Sql);
                echo '<script>location.href="index.php";</script>';
            }
        }
    //} 
    //else {

       // echo "Formato no soportado";
    }
//}
?>