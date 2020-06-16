<?php
include ("conexion.php");

if(isset($_FILES['img'])){
    $nombreImg=$_FILES['img']['name'];
    $ruta=$_FILES['img']['tmp_name'];
    $destino="fotos/".$nombreImg;
    if(copy($ruta,$destino)){
        $sql="INSERT INTO `tbimg`(nombre,ruta) VALUES ('$nombreImg','$destino')";
        $res=mysqli_query($cn,$sql);
        if($res){
            echo '<script type="text/javascript"> alert("Agregado Correctamente"); window.location="index.php";</script>';

        }else{
            die("Error".mysqli_error($cn));
        }

    }

}
?>



