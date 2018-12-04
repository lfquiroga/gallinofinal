<?php

namespace cafeterias\Models;

use cafeterias\DB\DBConnection as Connection;

use PDO;

use JsonSerializable;

/**
 * Este tipo de clases, que "mapean" una tabla de la base, se suelen conocer como "Modelos".
 */
class Favoritos extends Modelo implements JsonSerializable {

    protected $table = "usuarios_cafeterias_favoritas";
    
    protected $primaryKey = "id";
    
    protected $attributes = [
        'id',
        'id_usuario',
        'id_cafeteria',
        'fecha',
        'nuevo_comentario'

    ];
    
    protected $method;


    public function jsonSerialize() {
       
        return [
            'id'                    => $this->getId(),
            'id_usuario'            => $this->getUserId(),
            'id_cafeteria'          => $this->getCafeteriaId(),
            'fecha'                 => $this->getfecha(),
            'nuevo_comentario'      => $this->getNuevoComentario()
            
        ];
        
}


 public function cargarDatosDeArray($fila) {

        $this->setId($fila['id']);
        
        if(isset($fila['id_usuario'])){
         $this->setUserId($fila['id_usuario']);
        }
        
        if(isset($fila['id_cafeteria'])){
            $this->setCafeteriaId($fila['id_cafeteria']);
        }
         
        if(isset($fila['fecha'])){
        $this->setFecha($fila['fecha']);
        }
         
        if(isset($fila['nuevo_comentario'])){
        $this->setNuevoComentario($fila['nuevo_comentario']);
        }
      
        
        
    }
    
    
    /**
     * Asocia una cafeteria con un usuario
     *
     * @param $id id del campo que queremos traer (usuarios o cafeterias)
     * @param $campo nombre del campo para usar en el where (usuario o afeteria)
     * @return array
     * @throws Exception
     */
    public static function getById($id ,$campo) {
        

        $db = Connection::getConnection();
        
        $query = "select * from usuarios_cafeterias_favoritas where  $campo = $id";
           
        $stmt = $db->prepare($query);

        $exito = $stmt->execute();
        
        $favoritas=array();        
        
        if ($exito) {            
            
           while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $favoritas[]=$fila;
            
           }
           
           return $favoritas;
           
        } else {
            
            print_r($stmt->errorInfo());
            
            throw new \Exception('Error al cargar favorito.');
        }
    }
    
    /**
     * Asocia una cafeteria con un usuario
     *
     * @param $datos array
     * @return cafeteria
     * @throws Exception
     */
    public static function cargar($datos) {
        

        $db = Connection::getConnection();
        
        $query = "INSERT INTO usuarios_cafeterias_favoritas (id_usuario,id_cafeteria )
		VALUES( :id_usuario , :id_cafeteria)";

        $stmt = $db->prepare($query);
    

        $exito = $stmt->execute([
            'id_usuario' => $datos['id_usuario'],
            'id_cafeteria' => $datos['id_cafeteria'],
           
        ]);
        
        if ($exito) {
         
            $datos['id'] = $db->lastInsertId();

            return $datos['id'];
            
        } else {
            //return false;
            print_r($stmt->errorInfo());
            
            throw new \Exception('Error al cargar favorito.');
        }
    }
    
    /**
     * borra una cafeteria dew favoritos de usuarios
     *
     * @param $datos array
     * @return cafeteria
     * @throws Exception
     */
    public static function borrar($datos) {
        

        $db = Connection::getConnection();
        
        $query = "DELETE FROM  usuarios_cafeterias_favoritas "
                . "WHERE id_cafeteria = :id_cafeteria AND id_usuario = :id_usuario";

        $stmt = $db->prepare($query);
    

        $exito = $stmt->execute([
            'id_usuario' => $datos['id_usuario'],
            'id_cafeteria' => $datos['id_cafeteria'],
           
        ]);
        
        if ($exito) {        

            return TRUE;
            
        } else {
            //return false;
            print_r($stmt->errorInfo());
            
            throw new \Exception('Error al cargar favorito.');
        }
    }
    
    



    /********SETERS/GETERS**********/ 
    
    
    
     /**
     * @return mixed
     */
    public function setId($id) {
        
         $this->id = $id;
         
    }
    
     /**
     * @return mixed
     */
    public function setUserId($id) {
        $this->id_usuario=$id;
    }
    
     /**
     * @return mixed
     */
    public function setCafeteriaId($id) {
         $this->id_cafeteria = $id;
    }
    
     /**
     * @return mixed
     */
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    
     /**
     * @return mixed
     */
    public function setNuevoComentario($nuevo_comentario) {
        $this->nuevo_comentario = $nuevo_comentario;
    }
    
    
    
        
     /**
     * @return mixed
     */
    public function getNuevoComentario() {
        
          return $this->nuevo_comentario;
         
    }
    
     /**
     * @return mixed
     */
    public function getId() {
        
          return $this->id;
         
    }
    
     /**
     * @return mixed
     */
    public function getUserId() {
        return $this->id_usuario;
    }
    
     /**
     * @return mixed
     */
    public function getCafeteriaId() {
           return $this->cafeteria_id;
    }
    
     /**
     * @return mixed
     */
    public function getFecha() {
          return $this->fecha;
    }
    
    
    
    
    
    }