<link rel="stylesheet" href="stylesheets/bootstrap.min.css">
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
            $peticion = $conexion->prepare("select * from datos ");
            $peticion->execute();$datos = $peticion->fetchAll();
            $filas;
            foreach ($datos as $row){
                $filas[] = array($row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9],$row[10],$row[11]);
            }
            echo "<table class='col-sm-12 col-md-12 col-lg-12 col-xl-12 table table-bordered table-responsive'>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Dirección</th>
                        <th>Telefono casa</th>
                        <th>Telefono Movil</th>
                        <th>Email</th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Fecha Partida</th>
                        <th>Fecha Regreso</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>";
            for ($i=0; $i <count($filas); $i++) { 
                echo "<tr>
                    <td>".$filas[$i][0]."</td>
                    <td>".$filas[$i][1]."</td>
                    <td>".$filas[$i][2]."</td>
                    <td>".$filas[$i][3]."</td>
                    <td>".$filas[$i][4]."</td>
                    <td>".$filas[$i][5]."</td>
                    <td>".$filas[$i][6]."</td>
                    <td>".$filas[$i][7]."</td>
                    <td>".$filas[$i][8]."</td>
                    <td>".$filas[$i][9]."</td>
                    <td>".$filas[$i][10]."</td>
                    </tr>";
                # code...
            }
            echo "</tbody></table>";
            echo "<script>
                    setTimeout(function(){windows.reload();},5000);
                    </script>";
        }
        
    } catch (PDOException $e) {
        echo 'Error: '.$e->getMessage();
    }
?>


