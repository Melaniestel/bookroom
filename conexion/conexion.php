<?php
class ConectaDB
{
    private $conn;
    private static $instancia;
    private function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost; dbname=bookroom", 'administrador', '1234');
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



    public function compruebarol($dni)
    {
        $consulta = $this->conn->prepare('select rol from usuarios where dni_usu= :par1');
        $consulta->bindParam(':par1', $dni);
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



    //MÉTODO PARA AÑADIR NUEVO USUARIO QUE SE REGISTRA Y DARLE DE ALTA
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

}
