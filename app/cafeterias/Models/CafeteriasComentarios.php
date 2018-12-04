<?php

namespace cafeterias\Models;

use cafeterias\DB\DBConnection as Connection;

use PDO;

use JsonSerializable;


/**
 * Description of CafeteriasComentarios
 *
 * Maneja todo lo relacionado a las cafeterias y los comentarios de los usuarios 
 * 
 * @author lquiroga
 */


class CafeteriasComentarios extends Modelo implements JsonSerializable {
    
       
    protected $table = "cafeterias_comentarios";
    
    protected $primaryKey = "id";
    
    protected $attributes = [
        'id',
        'cafeteria_id',
        'id_usuario',
        'comentario',
        'estado',
        'fecha'

    ];

  
    
    protected $method;


    public function jsonSerialize() {
       
        return [
            'id'            => $this->getId(),
            'cafeteria_id'  => $this->getCafeteria_id(),
            'id_usuario'    => $this->getId_usuario(),
            'comentario'    => $this->getComentario(),
            'estado'        => $this->getEstado(),
            'fecha'         => $this->getFecha()
                
            
        ];
        
}


 public function cargarDatosDeArray($fila) {

        $this->setId($fila['id']);
        
        if(isset($fila['cafeteria_id'])){
         $this->setCafeteria_id($fila['cafeteria_id']);
        }
        
        if(isset($fila['id_usuario'])){
            $this->setId_usuario($fila['id_usuario']);
        }
         
        if(isset($fila['comentario'])){
        $this->setComentario($fila['comentario']);
        }
        
        if(isset($fila['estado'])){
        $this->setEstado($fila['estado']);
        }
        
        if(isset($fila['fecha'])){
        $this->setFecha($fila['fecha']);
        }
      
        
        
    }
    
    
    /**
     * Trae todos los comentarios de una cafeteria
     *
     * @param $id id de la cafeteria
     * @return array
     * @throws Exception
     */
    public static function getAllById($idcafeteria){        

        $db = Connection::getConnection();
       
        $query = "select ccom.id ,ccom.id_cafeteria , ccom.id_usuario , ccom.comentario , ccom.estado,DATE_FORMAT( ccom.fecha, '%d/%m/%Y') as fecha ,concat(usu.nombre,' ',usu.apellido ) as usuario ,"
                . "usu.ubicacion_foto from cafeterias_comentarios as ccom "
                . "JOIN usuarios as usu ON ccom.id_usuario = usu.id "
                . " where id_cafeteria = :idcafeteria";
        
        $stmt = $db->prepare($query);
        
        $exito = $stmt->execute([
            'idcafeteria' => $idcafeteria           
        ]);
    
        $comentarios=array();
        
        $exito = $stmt->execute();
        
        if ($exito) {            
            
           while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $comentarios[]=$fila;
            
           }
       
            return $comentarios;
         
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
        
        $query = "INSERT INTO cafeterias_comentarios (id_cafeteria , id_usuario	,comentario ,estado  )
		VALUES( :id_cafeteria , :id_usuario ,:comentario , 1)";

        $stmt = $db->prepare($query);
    

        $exito = $stmt->execute([
            
            'id_cafeteria' => $datos['id_cafeteria'],
            'id_usuario' => $datos['id_usuario'],
            'comentario' => $datos['comentario']            
           
        ]);
        
        if ($exito) {
            
        $query = "UPDATE usuarios_cafeterias_favoritas SET nuevo_comentario =  nuevo_comentario + 1"
                . " WHERE id_cafeteria = :id_cafeteria AND id_usuario NOT IN (:id_usuario)";
        
        $stmt = $db->prepare($query);
        
        $exito_update = $stmt->execute([
            
            'id_cafeteria' => $datos['id_cafeteria'],
            'id_usuario' => $datos['id_usuario']      
                
        ]);

        $datos['id'] = $db->lastInsertId();

        return true;
            
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
    
    
    /**
     * borra una cafeteria dew favoritos de usuarios
     *
     * @param $datos array
     * @return cafeteria
     * @throws Exception
     */
    public static function actualizarContador($datos) {
        

        $db = Connection::getConnection();


        $query = "UPDATE usuarios_cafeterias_favoritas SET nuevo_comentario =  0"
                . " WHERE id_cafeteria = :id_cafeteria AND id_usuario =:id_usuario";
        
        $stmt = $db->prepare($query);
        
        $exito_update = $stmt->execute([            
            'id_cafeteria' => $datos['id_cafeteria'],
            'id_usuario' => $datos['id_usuario']                      
        ]);

        
        if ($exito_update) {        

            return TRUE;
            
        } else {
            //return false;
            print_r($stmt->errorInfo());
            
            throw new \Exception('Error al cargar favorito.');
        }
    }
    
    



    /********SETERS/GETERS**********/ 
    
    
    function getId() {
        return $this->primaryKey;
    }

    function getCafeteria_id() {
        return $this->cafeteria_id;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getComentario() {
        return $this->comentario;
    }

    function getEstado() {
        return $this->estado;
    }
    
    function getFecha() {
        return $this->fecha;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCafeteria_id($cafeteria_id) {
        $this->cafeteria_id = $cafeteria_id;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setComentario($comentario) {
        $this->comentario = $comentario;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
    
    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

   
    
    
    
    }

    
    