<?php 
class ConectaDB2
{
    private $conn;
    private static $instancia;
    private function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost; dbname=bookroom", 'usuarios', '123');
    }
    public static function singleton()
    { //método singleton que crea instancia sí no está creada
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function __clone()
    {  // Evita que el objeto se pueda clonar
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }


    public function insertarReservas($dni, $fecha, $hora, $id_sala, $estado)
    { // Prepara y ejecuta consulta

        $datos = array(':par1' => $dni, ':par2' => $fecha, ':par3' => $hora, ':par4'=> $id_sala, ':par5'=> $estado);
        $sql = 'INSERT INTO reservas (dni_usu, fecha, hora, id_sala, estado) VALUES ( :par1 , :par2 , :par3, :par4 , :par5)';
        $q = $this->conn->prepare($sql); //prepara la sentencia
        return $q->execute($datos); //devuelve la sentencia insert ejecutada
    }
    

        //Modifica el estado de la reserva según la fecha y el id de la sala.
        //Método a implementar en un futuro
        public function modificarReservas($estado, $fech)
        { // Prepara y ejecuta consulta
    
            $datos = array(':par1' => $estado, ':par2' => $fech);
            $sql = ' update reservas
                 set estado=:par1
                 where fecha =:par2
                 and id_sala in(select id_sala from salas )';
            $q = $this->conn->prepare($sql);
            return $q->execute($datos);
        }

        public function selectCalendario($dni)
        {
            $datos=array(':par1' => $dni);
            $sql='select * from agenda where dni_usu=:par1';
            $q = $this->conn->prepare($sql);
            $q->execute($datos);
            if($q){
                $resultado = $q->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            }else{
                return false;
            }
        }

     public function insertarCalendario($dni, $sala, $datos, $f, $ff){
        $datos = array(':par1' => $dni, ':par2' => $sala, ':par3' => $datos, ':par4'=> $f, ':par5'=> $ff);
        $sql = 'INSERT INTO agenda (dni_usu, sala, datos, fecha, hora) VALUES ( :par1 , :par2 , :par3, :par4 , :par5)';
        $q = $this->conn->prepare($sql); //prepara la sentencia
        return $q->execute($datos); //devuelve la sentencia insert ejecutada
    }

    public function modificarCalendario($id, $sala, $datos, $f, $h){
        $datos = array(':par1' => $id, ':par2' => $sala, ':par3' => $datos, ':par4'=> $f, ':par5'=>$h);
        $sql = ' UPDATE agenda SET sala=:par2, datos=:par3, fecha=:par4, hora=:par5 WHERE id=:par1';
        $q = $this->conn->prepare($sql); //prepara la sentencia
        return $q->execute($datos); //devuelve la sentencia insert ejecutada
    }
    public function borrarCalendario($id){
        $datos = array(':par1' => $id);
        $sql = ' DELETE FROM  agenda  WHERE id=:par1';
        $q = $this->conn->prepare($sql); //prepara la sentencia
        return $q->execute($datos); //devuelve la sentencia insert ejecutada
    }

    
        public function borrarReservas($dni , $id_reserva)
        { // Prepara y ejecuta consulta
    
            $datos = array(':par1' => $dni , ':par2' => $id_reserva);
            $sql = ' DELETE FROM reservas WHERE dni_usu=:par1 and id_reserva= :par2';
            $q = $this->conn->prepare($sql);
            return $q->execute($datos);
        }

           //Muestra al usuario la descripción y aforo de la sala que va a reservar antes de confirmar
    public function selectSalaReservada($aforo, $descripcion)
    {
        $datos=array(':par1' => $aforo, ':par2'=> $descripcion);
        $sql='select id_sala, aforo, descripcion from salas where aforo=:par1
        and descripcion=:par2';
        $q = $this->conn->prepare($sql);
        $q->execute($datos);
        if($q){
            $resultado = $q->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }else{
            return false;
        }
    }

        //Buscar sala según el aforo y la descripción
        public function buscarSala($aforo, $descripcion){

            $datos = array(':par1' => $aforo, ':par2'=> $descripcion);
            $sql = 'select id_sala from salas where aforo=:par1 and descripcion=:par2 ';
            $q = $this->conn->prepare($sql); //prepara la sentencia
            $q->execute($datos); //devuelve la sentencia insert ejecutada
            $resultado = $q->fetch(PDO::FETCH_ASSOC);
            if( $resultado===false){
                return false;
            }
            return $resultado;
        }

        public function estadoSala($fecha, $hora, $aforo, $descripcion)
        {
            $datos=array(':par1' => $fecha, ':par2'=> $hora, ':par3'=> $aforo, ':par4'=> $descripcion);
            $sql ='select estado from reservas where hora=:par2 and fecha
            in(select fecha from reservas 
            where fecha=:par1 and id_sala in(
            select id_sala from salas
            where aforo=:par3 and descripcion in(
            select descripcion from salas where descripcion=:par4)))';
            $q = $this->conn->prepare($sql); //prepara la sentencia
           $q->execute($datos);
           $resultado = $q->fetch(PDO::FETCH_ASSOC);
           if(empty($resultado)){
               return 'no existe';
           }
           if($resultado===false){
               return false;
           }
           return $resultado['estado'];
       }

           //MOSTRAR RESERVAS DEL USUARIO
    public function misReservas($dni)
    {

        $datos = array(':par1' => $dni);
        $sql = 'select id_reserva, fecha, hora , id_sala, estado from reservas where dni_usu= :par1 ';
        $q = $this->conn->prepare($sql); //prepara la sentencia
        $q->execute($datos); //devuelve la sentencia insert ejecutada
        $resultado = $q->fetchAll(PDO::FETCH_BOTH);
        if( $resultado===false){
            return false;
        }
        return $resultado;
    }
}
