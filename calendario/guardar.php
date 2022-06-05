<?php 
include_once '../comprobaciones/filtrado.php';
require_once('../conexion/conexion_limitado.php');
$conn= ConectaDB2::singleton();

if($_SERVER['REQUEST_METHOD'] !='POST'){
    echo "<script> alert('Error: No hay datos para guardar.'); location.replace('./') </script>";
    $conn->close();
    exit;
}
extract($_POST);
$allday = isset($allday);
//filtramos sala y datos 
$sala=filtrado($sala);
$datos=filtrado($datos);

if(empty($id)){
   
$sql= $conn->insertarCalendario($dni_usu, $sala, $datos, $fecha, $hora);
}else{
    
  $sql= $conn->modificarCalendario($id, $sala, $datos, $fecha, $hora);
}

if($sql){
    echo "<script> alert('Su nota se ha guardado correctamente.'); location.replace('./') </script>";
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$conn->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$conn->close();
?>