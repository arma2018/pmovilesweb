<?php
    //Codigo utilizado para heroku aplicaciones moviles.
    $host = 'us-cdbr-iron-east-01.cleardb.net';
    $db = 'heroku_2fc5cde442a532e';
    $user = 'b75ccb77d42e10';
    $pwd = '8c4cc32a';
    try{
        $conexion = new PDO("mysql:host=$host;dbname=$db",$user,$pwd,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
        // Hacer las operaciones
        if(is_string($conexion)){
            //Regresa el error
            echo $conexion;
            
        }else{
            //Obtener datos post
            $data = json_decode($_POST['d']);
            $nombre = $data[0];
            $tipo = $data[1];
            $direccion = $data[2];
            $telc = $data[3];
            $telm = $data[4];
            $correo = $data[5];
            $lugaro = $data[6];
            $lugard = $data[7];
            $fechas = $data[8];
            $fechad = $data[9];
            $descripcion = $data[10];
            
            
            $peticion = $conexion->prepare("insert into datos('nombre','motivo','direccion','telc','telm','correo','lugaro','lugard','fechas','fechad','descripcion',) values ('$nombre','$tipo','$direccion','$telc','$telm','$correo','$lugaro','$lugard','$fechas','$fechad','$descripcion')");
            $peticion->execute();
            echo "registro exitoso";
        }
        
    } catch (PDOException $e) {
        echo 'Error: '.$e->getMessage();
    }
?>
