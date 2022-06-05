<?php 
require_once('../conexion/conexion_limitado.php');
$conn= ConectaDB2::singleton();
if(!isset($_GET['id'])){
    echo "<script> alert('Id. de programa no definido.'); location.replace('./') </script>";
    $conn->close();
    exit;
}
$delete= $conn->borrarCalendario($_GET['id']);
//$delete = $conn->query("DELETE FROM `agenda` where id = '{$_GET['id']}'");
if($delete){
    echo "<script> alert('Su nota se ha eliminado con éxito'); location.replace('./') </script>";
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$conn->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$conn->close();

?>