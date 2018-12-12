<?php

namespace cafeterias\Models;

use cafeterias\DB\DBConnection as Connection;
use PDO;
use JsonSerializable;

/**
 * Este tipo de clases, que "mapean" una tabla de la base, se suelen conocer como "Modelos".
 */
class Eventos extends Modelo implements JsonSerializable {

    protected $table = "eventos";
    
    protected $primaryKey = "id";
    
    protected $attributes = [
       	'id',
        'nombre', 	
        'titulo', 	
        'descripcion', 	
        'fecha_evento', 	
        'ubicacion_imagen', 	
        'estado'
    ];
    
    protected $method;

    /**
     * Metodo de serializacion a JSON.
     */
    public function jsonSerialize() {
       
        return [
            'id'                => $this->getId(),
            'nombre'            => $this->getNombre(),
            'titulo	'       => $this->getTitulo(),
            'descripcion'       => $this->getDescripcion(),
            'fecha_evento'      => $this->getFecha_evento(),
            'estado'            => $this->getEstado()
        ];
    }

    /**
     * Carga los datos de una fila de la base a las propiedades.
     *
     * @param $fila array La fila de la base de datos.
     */
    public function cargarDatosDeArray($fila) {
        
        if(isset($fila['id'])){
         $this->setId($fila['id']);
        }
        
        if(isset($fila['nombre'])){
            $this->setNombre($fila['nombre']);
        }
         
        if(isset($fila['titulo'])){
        $this->setTitulo($fila['titulo']);
        }
        
        if(isset($fila['descripcion'])){
        $this->setDescripcion($fila['descripcion']);
        }
        
        if(isset($fila['ubicacion_imagen'])){
        $this->setUbicacion_imagen($fila['ubicacion_imagen']);
        }
        
        if(isset($fila['fecha'])){
        $this->setFecha_evento($fila['fecha']);
        }
        
        if(isset($fila['estado'])){
        $this->setEstado($fila['estado']);
        }
        
      }
      
      
     /**
     * Creaun evento
     *
     * @param $datos array
     * @return cafeteria
     * @throws Exception
     */
    public static function crear($datos) {
            
        $db = Connection::getConnection();
        
        $query = "INSERT INTO eventos (	nombre ,titulo ,descripcion , fecha_evento  , estado )
		VALUES( :nombre , :titulo , :descripcion , :fecha_evento , :estado)";           
      
        $stmt = $db->prepare($query);
    

        $exito = $stmt->execute([
            'nombre' => $datos['nombre'],
            'titulo' => $datos['titulo'],
            'descripcion' => $datos['descripcion'],
            'fecha_evento' => $datos['fecha_evento'],
            'estado' => $datos['estado']
        ]);
        

        
        if ($exito) {
            
            $evento = new Eventos;
            
            $datos['id'] = $db->lastInsertId();
            
            $evento->cargarDatosDeArray($datos);

            return $datos['id'];
            
        } else {
            //return false;
            print_r($stmt->errorInfo());
            throw new \Exception('Error al crear el evento .');
        }
    }
    
    
     /**
     * Modificar evento
     *
     * @param $datos array
     * @return evento
     * @throws Exception
     */
    public static function update($datos) {
            
        $db = Connection::getConnection();
        
        $query = "UPDATE eventos SET 	nombre = :nombre ,titulo = :titulo,
            descripcion = :descripcion , fecha_evento = :fecha_evento  , estado =  :estado
		where id = ".$datos['ideditar'];           
      
        $stmt = $db->prepare($query);
    

        $exito = $stmt->execute([
            'nombre' => $datos['nombre'],
            'titulo' => $datos['titulo'],
            'descripcion' => $datos['descripcion'],
            'fecha_evento' => $datos['fecha_evento'],
            'estado' => $datos['estado']
        ]);
        

        
        if ($exito) {
            
          return $datos['ideditar'];
            
        } else {
            //return false;
            print_r($stmt->errorInfo());
            throw new \Exception('Error al crear el evento .');
        }
    }
      

      
      /**
     * Creaun evento
     *
     * @param $datos array
     * @return cafeteria
     * @throws Exception
     */
    public static function updateImagen($datos) {
        
        
        $db = Connection::getConnection();
        
        $query = "UPDATE eventos SET 
               ubicacion_imagen = :ubicacion_imagen
               where id = ".$datos['idevento'];
        
         $stmt = $db->prepare($query);         

        $exito = $stmt->execute([
            'ubicacion_imagen'  => $datos['ubicacion_imagen']
            
        ]);
        
    }
    

    /**
     *  delete
     * @return bool
     * @throws Exception
     */
    public static function delete($id_evento) {
        
        $db = Connection::getConnection();
        
       $query = "UPDATE eventos SET estado = 2  where id =:id";

        $stmt = $db->prepare($query);


        $exito = $stmt->execute([
            'id' => $id_evento
        ]);
        
        if($exito){
            return true;
        }
      
        

    }
    
    
     /**
     * Inserta un registro en la tabla eventos_usuario
     *
     * @param $datos array
     * @return cafeteria
     * @throws Exception
     */
    public static function asistir($datos) {
            
        $db = Connection::getConnection();
        
        if($datos['asiste'] == 1){
            
        $query = "INSERT INTO eventos_usuarios (id_usuario , id_evento) 
            VALUES (:id_usuario , :id_evento)";	
        
        }else{
            
        $query = "DELETE FROM  eventos_usuarios 
            WHERE (id_usuario = :id_usuario AND  id_evento =:id_evento)";		
        }
        $stmt = $db->prepare($query);

        $exito = $stmt->execute([
            'id_usuario' => $datos['idusuario'],
            'id_evento' => $datos['idevento']            
        ]);
        
        if ($exito) {
          
            return 'OK';
            
        } else {
            //return false;
            print_r($stmt->errorInfo());
            throw new \Exception('Error en la inscripcion .');
        }
    }
    
    
     /**
     * Devuelve una lista de usuarios que asisten a un evento
     *
     * @param $id int
     * @return bool
     * @throws Exception
     */
    public static function asistentes($id) {
           
        $db = Connection::getConnection();
        
        $query = "SELECT * FROM eventos_usuarios WHERE id_evento = :id";		
      
        $stmt = $db->prepare($query);

        $exito = $stmt->execute([
            'id' =>$id            
        ]);
        
        $salida = [];
        
         while (
            $fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $salida[] = $fila;
        }
       
          
            return $salida;
            
       
    }
      
    /****** GETER ******/
      
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getFecha_evento() {
        return $this->fecha_evento;
    }

    function getUbicacion_imagen() {
        return $this->ubicacion_imagen;
    }

    function getEstado() {
        return $this->estado;
    }
    
    function getUsuarioAsiste() {
        return $this->asiste ;
    }

    /******SETER******/
    
    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setFecha_evento($fecha_evento) {
        $this->fecha_evento = $fecha_evento;
    }

    function setUbicacion_imagen($ubicacion_imagen) {
        $this->ubicacion_imagen = $ubicacion_imagen;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
    
    function setUsuarioAsiste($asiste) {
        $this->asiste = $asiste;
    }


    }