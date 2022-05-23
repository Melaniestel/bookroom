<?php 
include_once '../comprobaciones/filtrado.php';
require_once('db-connect.php');
if($_SERVER['REQUEST_METHOD'] !='POST'){
    echo "<script> alert('Error: No hay datos para guardar.'); location.replace('./') </script>";
    $conn->close();
    exit;
}
extract($_POST);
$allday = isset($allday);
//filtramos el nombre y descripcion 
$nombre=filtrado($nombre);
$descripcion=filtrado($descripcion);

if(empty($id)){
    $sql = "INSERT INTO `agenda` (`dni_usu`, `nombre`,`descripcion`,`fech_inicio`,`fech_fin`) VALUES ('$dni_usu', '$nombre','$descripcion','$fech_inicio','$fech_fin')";
}else{
    $sql = "UPDATE `agenda` set  `nombre` = '{$nombre}', `descripcion` = '{$descripcion}', `fech_inicio` = '{$fech_inicio}', `fech_fin` = '{$fech_fin}' where `id` = '{$id}'";
}
$save = $conn->query($sql);
if($save){
    echo "<script> alert('Evento Guardado Correctamente.'); location.replace('./') </script>";
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$conn->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$conn->close();
?>