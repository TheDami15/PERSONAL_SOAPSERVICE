<?php
/**
 * Clase Conectar para gestionar la conexión a la base de datos.
 *
 * @category Modelo
 * @package  Conectar
 * @author   Damián Gabriel Rodríguez Jiménez
 * @version  1.0
 */
class Conectar{
    /**
     * Instancia de PDO para la conexión a la base de datos.
     *
     * @var PDO $dbh
     */
    public $dbh;

    /**
     * Establece la conexión a la base de datos utilizando PDO.
     *
     * @return PDO Objeto PDO representando la conexión a la base de datos.
     */
    public function conexion(){
        try{
            $conectar = $this->dbh = new PDO('mysql:host=localhost;dbname=andercode_soap','root','');
            return $conectar;
        }catch(Exception $e){
            print "Error en la conexión" . $e->getMessage() ."<br/>";
            die();
        }
    }

    /**
     * Establece el juego de caracteres de la conexión a utf8.
     *
     * @return PDOStatement|false Retorna el resultado de la ejecución de la consulta SET NAMES 'utf8'.
     */
    public function set_names(){
        return $this->dbh->query("SET NAMES 'utf8'");
    }
}
?>
