<?php
//     ini_set('display_errors', '1');
//     ini_set('display_startup_errors', '1');
//     error_reporting(E_ALL);
// function dividir($numero1, $numero2){

//     if($numero2 == 0){
//         throw new Exception('División por 0', 555);
//     }
//     return $numero1 / $numero2;
// }
// try {
//     echo dividir(5,0 );
    
// } catch (Exception $e) {
//     echo "Ocurrio un error, contacte al servidor: " . "<br>";
//     echo $e->getMessage();
// }


// echo "mi programa se ejecuta...";
// $host = '127.0.0.1';
// $user = 'root';
// $password = '';
// $bd = 'ddhh';
// $puerto = '3306';

// $conexion = mysqli_connect($host, $user,$password,$bd,$puerto);


// if(!$conn){
//     echo " no hay conexión";
//     exit;
// }

// echo "conexion";

$conn = null;

try {
    $conn = new PDO("informix:host=host.docker.internal; service=9088;database=tienda; server=informix; protocol=onsoctcp;EnableScrollableCursors=1", "informix", "in4mix");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "conexion";
    
} catch (PDOException $e) {
    echo "no hay conexion de PDO";
    echo "<br>";
    echo $e->getMessage();
}


$sentencia = $conn->prepare("select * from productos");
$sentencia->execute();
$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
var_dump($resultado);
echo "</pre>";
