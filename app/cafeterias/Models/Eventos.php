<?php

namespace cafeterias\Models;

use cafeterias\DB\DBConnection as Connection;
use PDO;
use JsonSerializable;

/**
 * Este tipo de clases, que "mapean" una tabla de la base, se suelen conocer como "Modelos".
 */
class Eventos extends Modelo implements JsonSerializable {

    protected $table = "cafeteria";
    
    protected $primaryKey = "id";
    
    protected $attributes = [
       	'id',
        'nombre', 	
        'titulo', 	
        'descripcion', 	
        'fecha_evento', 	
        'ubicacion_imagen', 	
        'estado', 

    ];
    protected $method;

    /**
     * M�todo de serializaci�n a JSON.
     */
    public function jsonSerialize() {
       
        return [
            'id'                => $this->getId(),
            'nombre'            => $this->getUserId(),
            'titulo	'       => $this->getNombre(),
            'descripcion'       => $this->getDireccion(),
            'fecha_evento'      => $this->getTelefono(),
            'estado'             => $this->getemail()
        ];
    }

    /**
     * Carga los datos de una fila de la base a las propiedades.
     *
     * @param $fila array 	La fila de la base de datos.
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


    }