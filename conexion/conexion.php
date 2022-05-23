<?php
class ConectaDB
{
    private $conn;
    private static $instancia;
    private function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost; dbname=bookroom", 'root', '');
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


    //COMPROBACIONES Y CRUD DE USUARIO
    public function getClave($usuario)
    {
        $consulta = $this->conn->prepare("select clave from usuarios where nombre= :nombre");
        $consulta->bindParam(':nombre', $usuario);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

        return $resultado['clave'];
    }

    public function compruebaUsuario($dni)
    {
 
        $datos = array(':par1' => $dni);
        $sql = 'select dni_usu from usuarios where dni_usu= :par1';
        $q = $this->conn->prepare($sql); //prepara la sentencia
        $q->execute($datos);
        $resultado = $q->fetch(PDO::FETCH_ASSOC);
        if ($resultado['dni_usu'] === $dni) {
            return true;
        }
        return false;
    }



    public function compruebarol($usuario)
    {
        $consulta = $this->conn->prepare('select rol from usuarios where nombre= :par1');
        $consulta->bindParam(':par1', $usuario);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);

        return $resultado['rol'];
    }


    public function selectUsuario()
    {
        try {
            $sql = ('select * from usuarios');
            $q = $this->conn->prepare($sql);
            $q->execute();

            return $q;
        } catch (PDOException $pe) {
            die("Error al ejecutar orden select :" . $pe->getMessage());
        }
    }


    public function insertarUsuario($dni, $nombre, $clave, $rol, $alta, $email)
    { // Prepara y ejecuta consulta

        $datos = array(':par1' => $dni, ':par2' => $nombre, ':par3' => $clave, ':par4' => $rol, ':par5' => $alta, ':par6' => $email);
        $sql = ' INSERT INTO usuarios (dni_usu, nombre, clave, rol, alta, email) VALUES ( :par1 , :par2 , :par3 , :par4 , :par5 , :par6 )';
        $q = $this->conn->prepare($sql); //prepara la sentencia
        return $q->execute($datos); //devuelve la sentencia insert ejecutada
    }


    public function modificarUsuario($dni, $nombre, $email, $rol, $alta)
    { // Prepara y ejecuta consulta

        $datos = array(':par1' => $dni, ':par2' => $nombre, ':par3'=> $email , ':par4'=> $rol, ':par5'=> $alta);
        $sql = ' UPDATE usuarios SET nombre=:par2, email=:par3, rol=:par4, alta=:par5 WHERE dni_usu=:par1';
        $q = $this->conn->prepare($sql);
        return $q->execute($datos);
    }


    public function borrarUsuario($dni)
    { // Prepara y ejecuta consulta

        $datos = array(':par1' => $dni);
        $sql = ' DELETE FROM usuarios WHERE dni_usu=:par1 ';
        $q = $this->conn->prepare($sql);
        return $q->execute($datos);
    }

    //CRUD RESERVAS

    public function selectReservas()
    {
        try {
            $sql = ('select * from reservas');
            $q = $this->conn->prepare($sql);
            $q->execute();

            return $q;
        } catch (PDOException $pe) {
            die("Error al ejecutar orden select :" . $pe->getMessage());
        }
    }


    public function insertarReservas($dni, $fecha, $hora, $id_sala, $estado)
    { // Prepara y ejecuta consulta

        $datos = array(':par1' => $dni, ':par2' => $fecha, ':par3' => $hora, ':par4'=> $id_sala, ':par5'=> $estado);
        $sql = 'INSERT INTO reservas (dni_usu, fecha, hora, id_sala, estado) VALUES ( :par1 , :par2 , :par3, :par4 , :par5)';
        $q = $this->conn->prepare($sql); //prepara la sentencia
        return $q->execute($datos); //devuelve la sentencia insert ejecutada
    }

    public function insertarCalendario($dni, $nombre, $descripcion, $f, $ff){
        $datos = array(':par1' => $dni, ':par2' => $nombre, ':par3' => $descripcion, ':par4'=> $f, ':par5'=> $ff);
        $sql = 'INSERT INTO agenda (dni_usu, nombre, descripcion, fech_inicio, fech_fin) VALUES ( :par1 , :par2 , :par3, :par4 , :par5)';
        $q = $this->conn->prepare($sql); //prepara la sentencia
        return $q->execute($datos); //devuelve la sentencia insert ejecutada
    }

    //Modifica el estado de la reserva según la fecha y el id de la sala.
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


    public function borrarReservas($dni , $id_reserva)
    { // Prepara y ejecuta consulta

        $datos = array(':par1' => $dni , ':par2' => $id_reserva);
        $sql = ' DELETE FROM reservas WHERE dni_usu=:par1 and id_reserva= :par2';
        $q = $this->conn->prepare($sql);
        return $q->execute($datos);
    }

    //CRUD SALAS
    public function selectSalas()
    {
        try {
            $sql = ('select * from salas');
            $q = $this->conn->prepare($sql);
            $q->execute();
            if($q){
                $resultado = $q->fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            }else{
                return false;
            }

        } catch (PDOException $pe) {
            die("Error al ejecutar orden select :" . $pe->getMessage());
        }
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
  

    public function insertarSalas($id, $descripcion, $aforo)
    { // Prepara y ejecuta consulta

        $datos = array(':par1' => $id, ':par2' => $descripcion, ':par3' => $aforo);
        $sql = ' INSERT INTO salas (id_sala, descripcion, aforo) VALUES ( :par1 , :par2 , :par3)';
        $q = $this->conn->prepare($sql); //prepara la sentencia
        return $q->execute($datos); //devuelve la sentencia insert ejecutada
    }


    public function modificarSalas($id, $descripcion, $aforo)
    { // Prepara y ejecuta consulta

        $datos = array(':par1' => $id, ':par2' => $descripcion, ':par3' => $aforo);
        $sql = ' UPDATE salas SET descripcion= :par2 , aforo= :par3 WHERE id_sala= :par1 ';
        $q = $this->conn->prepare($sql);
        return $q->execute($datos);
    }


    public function borrarSalas($id)
    { // Prepara y ejecuta consulta

        $datos = array(':par1' => $id);
        $sql = ' DELETE FROM salas WHERE id_sala=:par1 ';
        $q = $this->conn->prepare($sql);
        return $q->execute($datos);
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
