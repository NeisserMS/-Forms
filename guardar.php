<?php
//invocar clase de conexion
include_once __DIR__ . '/conectarBD.php';
//crear objeto conexion
$conexion = new ConectarBD();
$conectado = $conexion->mysql();
//verificar que los campos esten llenos
if(isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['mensaje']))
{
    //recuperar las variables
    $nombre=$_POST['nombre'];
    $correo=$_POST['correo'];
    $mensaje=$_POST['mensaje'];
    //hacemos la sentencia de sql para guardar estos datos
    $query="INSERT INTO datos (nombre, email, mensaje) VALUES (:nombre, :correo, :mensaje)";    
    //conectar la base de datos, preparar consulta y guardar en una sentencia
    $statement = $conectado->prepare($query);
    //Insertar parametros en la consulta y guardarlo en la sentencia
    $statement->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $statement->bindParam(':correo', $correo, PDO::PARAM_STR);
    $statement->bindParam(':mensaje', $mensaje, PDO::PARAM_STR);
    //ejecutar la sentencia si es correcta
    if($statement->execute()){
        echo 'La consulta se realizo exitosamente.';
        header('Location: index.html');
    }else{
        echo 'Ocurrio un error en la consulta';
    }
}
else{
    echo 'Debes ingresar datos en los campos del formulario.';
}