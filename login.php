<?php
    include_once 'Base_de_datos/conexion_login.php';
    
    session_start();

    if(isset($_GET['cerrar_sesion'])){
        session_unset(); 

        // destroy the session 
        session_destroy(); 
        header('location: index.php');
    }
    
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: Admin/Personal/index.php');
            break;

            case 2:
            header('location: Docente/index.php');
            break;

            default:
        }
    }

    if(isset($_POST['user_usu']) && isset($_POST['pass_usu'])){
        $user_usu = $_POST['user_usu'];
        $pass_usu = $_POST['pass_usu'];

        $db = new Database();
        $query = $db->connect()->prepare('SELECT * FROM usuarios_cargos WHERE user_usu = :user_usu AND pass_usu = :pass_usu');
        $query->execute(['user_usu' => $user_usu, 'pass_usu' => $pass_usu]);

        $row = $query->fetch(PDO::FETCH_NUM);
        
        if($row == true){
            $rol = $row[4];//De la tabla usuarios saca la clave foranea que seria los roles de usuarios (admin/docente)            
            $_SESSION['rol'] = $rol;
            
            $cve_usu = $row[0];
            $_SESSION['cve_usu'] = $cve_usu;

            $nombre_usu = $row[1];            
            $_SESSION['nombre_usu'] = $nombre_usu;

            switch($rol){
                case 1:
                    header('location: Admin/Personal/index.php');
                break;

                case 2:
                    header('location: Docente/index.php');
                break;

                default:                    
            }
        }else{
            // no existe el usuario
            echo "Nombre de usuario o contraseña incorrecto";
        }
        

    }

?>



<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1-dist/css/bootstrap.css">
</head>

<body>
    <div class="container">
    <div class="row">
        <div class="col-lg-4  col-md-4"></div>
        <div class="card col-lg-4 col-md-4">
            <div class="card-header">Inicio de Sesión</div>
            <div class="card-body">
            

                <form action="#" method="POST">
                    <label for="Usuario">Usuario</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                        <input type="text" id="user_usu" name="user_usu" class="form-control" placeholder="Usuario" autocomplete="off" required>
                    </div>

                    <label for="Contraseña">Contraseña</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-lock"></i>
                            </span>
                        </div>
                        <input type="text" id="pass_usu" name="pass_usu" class="form-control" placeholder="Contraseña" autocomplete="off" required>
                    </div>

                                    

                <button type="submit" class="btn btn-primary mt-4"><i class="fa fa-paper-plane"></i> Enviar</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>