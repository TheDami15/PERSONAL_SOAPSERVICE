<?php
/**
 * Clase Usuario que extiende la clase Conectar para interactuar con la base de datos.
 *
 * @category Modelo
 * @package  Usuario
 * @author   Damián Gabriel Rodríguez Jiménez
 * @version  1.0
 */
class Usuario extends Conectar{
    /**
     * Inserta un nuevo usuario en la base de datos.
     *
     * @param string $usu_nom    Nombre del usuario.
     * @param string $usu_ape    Apellido del usuario.
     * @param string $usu_correo Correo electrónico del usuario.
     *
     * @return void
     */
    public function insert_usuario($usu_nom, $usu_ape, $usu_correo){
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO tm_usuario (usu_id, usu_nom, usu_ape, usu_correo, est) VALUES (NULL, ?, ?, ?, '1');";
        $stmt = $conectar->prepare($sql);
        $stmt->bindParam(1, $usu_nom);
        $stmt->bindParam(2, $usu_ape);
        $stmt->bindParam(3, $usu_correo);
        $stmt->execute();
    }

    /**
     * Lee todos los datos de usuarios de la base de datos.
     *
     * @return array Datos de usuarios en formato de array asociativo.
     */
    public function Leer_Datos(){
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM tm_usuario ";
        $stmt = $conectar->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
