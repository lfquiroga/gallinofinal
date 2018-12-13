<?php

namespace cafeterias\Models;

use cafeterias\DB\DBConnection as Connection;
use PDO;
use JsonSerializable;

/**
 * Este tipo de clases, que "mapean" una tabla de la base, se suelen conocer como "Modelos".
 */
class Cafeteria extends Modelo implements JsonSerializable {

    protected $table = "cafeteria";
    
    protected $primaryKey = "id";
    
    protected $attributes = [
        'id',
        'usuarios_id',
        'nombre',
        'direccion',
        'telefono',
        'email',
        'sitioweb',
        'sucursal',
        'id_estado',
        'descripcion',

    ];
    protected $method;

    /**
     * M�todo de serializaci�n a JSON.
     */
    public function jsonSerialize() {
       
        return [
            'id'                  => $this->getId(),
            'usuarios_id'         => $this->getUserId(),
            'nombre	'         => $this->getNombre(),
            'direccion'           => $this->getDireccion(),
            'telefono'            => $this->getTelefono(),
            'email'               => $this->getemail(),
            'sitioweb'            => $this->getsitioweb(),
            'sucursal'            => $this->getSucursal(),
            'id_estado'           => $this->getIdestado(),
            'descripcion'         => $this->getdescripcion()
        ];
    }

    /**
     * Carga los datos de una fila de la base a las propiedades.
     *
     * @param $fila array 	La fila de la base de datos.
     */
    public function cargarDatosDeArray($fila) {

        $this->setId($fila['id']);
        
        if(isset($fila['id'])){
         $this->setUserId($fila['id']);
        }
        
        if(isset($fila['nombre'])){
            $this->setNombre($fila['nombre']);
        }
         
        if(isset($fila['direccion'])){
        $this->setDireccion($fila['direccion']);
        }
        
        if(isset($fila['telefono'])){
        $this->setTelefono($fila['telefono']);
        }
        
        if(isset($fila['email'])){
        $this->setEmail($fila['email']);
        }

        if(isset($fila['sitio'])){
            $this->setSitioweb($fila['sitio']);
        }
        
        if(isset($fila['sucursal'])){
            $this->setSucursal($fila['sucursal']);
        }
        
        if(isset($fila['ranking'])){
            $this->setRanking($fila['ranking']);
        }
        
        if(isset($fila['puntaje'])){
            $this->setPuntaje($fila['puntaje']);
        }
        
        if(isset($fila['id_estado'])){
            $this->setIdestado($fila['id_estado']);
        }
        
        if(isset($fila['descripcion'])){
            $this->setdescripcion($fila['descripcion']);
        }
        
        
    }

    /**
     * Crea una cafeteria nueva en la base.
     *
     * @param $datos array
     * @return cafeteria
     * @throws Exception
     */
    public static function crear($datos) {
        

        $db = Connection::getConnection();
        
        $query = "INSERT INTO cafeteria (usuarios_id,nombre,direccion,telefono
                ,email,sitioweb,sucursal ,descripcion ,puntaje ,id_estado  )
		VALUES( :usuarios_id , :nombre , :direccion , :telefono
                , :email , :sitioweb , :sucursal , :descripcion, 1, 1)";

        $stmt = $db->prepare($query);
    

        $exito = $stmt->execute([
            'usuarios_id' => 1,
            'nombre' => $datos['nombre'],
            'direccion' => $datos['direccion'],
            'telefono' => $datos['telefono'],
            'email' => $datos['email'],
            'sitioweb' => $datos['sitio'],
            'sucursal' => $datos['sucursal'],
            'descripcion' => $datos['descripcion']
        ]);
        

        
        if ($exito) {
            $cafeteria = new Cafeteria;
            $datos['id'] = $db->lastInsertId();
            $cafeteria->cargarDatosDeArray($datos);

            return $datos['id'];
            
        } else {
            //return false;
            print_r($stmt->errorInfo());
            throw new \Exception('Error al crear la cafeteria.');
        }
    }

    /**
     * update una cafeteria nueva en la base.
     *
     * @param $datos array
     * @return cafeteria
     * @throws Exception
     */
    public static function update($datos) {
        $db = Connection::getConnection();
        
        $query = "UPDATE cafeteria SET 
                usuarios_id = :usuarios_id ,
                nombre = :nombre,
                direccion= :direccion ,
                telefono = :telefono,
                email = :email ,
                sitioweb = :sitioweb ,
                descripcion= :descripcion,
                id_estado = :estado ,
                sucursal =:sucursal where id =:id";

        $stmt = $db->prepare($query);


        $exito = $stmt->execute([
            'usuarios_id' => 1,
            'nombre' => $datos['nombre'],
            'direccion' => $datos['direccion'],
            'telefono' => $datos['telefono'],
            'email' => $datos['email'],
            'sitioweb' => $datos['sitio'],
            'descripcion' => $datos['descripcion'],
            'estado' => $datos['id_estado'],
            'sucursal' => $datos['sucursal'],
            'id' => $datos['id']
        ]);

        if ($exito) {
            $cafeteria = new Cafeteria;
            $datos['id'] = $db->lastInsertId();
            $cafeteria->cargarDatosDeArray($datos);

            return $datos['id'];
        } else {
            //return false;
            //print_r($stmt->errorInfo());
            throw new \Exception('Error al crear la cafeteria.');
        }
    }

    /**
     * gettranking obtiene las 3 mejores puntuadas
     *
     *  @return array cafeteria
     * @throws Exception
     */
    public static function getRanking() {
        
        $db = Connection::getConnection();
        
        $query = "SELECT * FROM cafeteria where id_estado = 1 ORDER BY id ASC LIMIT 6";
        
        $stmt = $db->prepare($query);
        
        $stmt->execute();
        
        $salida = [];

        while (
            $fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $cafeteria = new Cafeteria();
            $cafeteria->cargarDatosDeArray($fila);
            $salida[] = $cafeteria;
        }
        return $salida;
    }
    
    /**
     * getimgportada la url de la imagen de portada.La imagen de portada es la primera q se 
     * carga al ingresar una cafeteria
     *
     * @return array cafeteria
     * @throws Exception
     */
    public static function obtenerimgportada($id_cafeteria) {
        
        $db = Connection::getConnection();
        
        $query = "SELECT MIN(imagenes_id) ,imagenes.ubicacion
        FROM cafeteria_has_imagenes 
        JOIN imagenes ON cafeteria_has_imagenes.imagenes_id = imagenes.id
        where cafeteria_id = :id";
       
        $stmt = $db->prepare($query);
        
      
        $exito = $stmt->execute([
            'id' => $id_cafeteria
        ]);
  
       
        
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) { 
            $img = $fila['ubicacion'];
        }
        
        if($img == null){
            
            $img = 'img/noimage.png';
            return $img;
            
        }else{
            
           return $img;  
           
        }
        
           
    

    }
    
    /**
     *  delete
     * @return bool
     * @throws Exception
     */
    public static function delete($id_cafeteria) {
        
        $db = Connection::getConnection();
        
       $query = "UPDATE cafeteria SET id_estado = 2  where id =:id";

        $stmt = $db->prepare($query);


        $exito = $stmt->execute([
            'id' => $id_cafeteria
        ]);
        
        if($exito){
            return true;
        }
      
    }
    
    /**
     * asocia imagen y cafeteria en la db
     * 
     * $param $imagen string
     * $param $idcafeteria string
     *
     * @return bool
     * @throws Exception
     */
    public static function imagenCafeteria($imagen , $idcafeteria ,$desc) {
        
        $db = Connection::getConnection();
        
        $query = "INSERT INTO imagenes  ( usuarios_id ,nombre_sistema,ubicacion,descripcion)
         VALUES (1,:imagen_nombre ,:ubicacion , :desc)";
        
        $stmt = $db->prepare($query);
        
       $exito = $stmt->execute([
            'imagen_nombre' => $imagen,
            'ubicacion' => 'img/cafeterias/'.$imagen,
            'desc' => $desc
        ]);
       
        
        if ($exito) {
            
           $id_imagen=$db->lastInsertId();
           
           $query = "INSERT INTO cafeteria_has_imagenes  ( cafeteria_id ,imagenes_id)
            VALUES (:id_caf , :img_id)";
           
            $stmt = $db->prepare($query);             
             
           $exito2 = $stmt->execute([
            'id_caf' => $idcafeteria,
            'img_id' => $id_imagen
        ]);
           
         if ($exito2) {
             return true;
         }else {
            //return false;
            print_r($stmt->errorInfo());
            throw new \Exception('Error al crear la cafeteria.');
        }

        } else {
            //return false;
            print_r($stmt->errorInfo());
            throw new \Exception('Error al crear la cafeteria.');
        }
    }
    
    
    

    /**
     * @return mixed
     */
    public function getId() {
        return $this->id;
    }
    

  
    /**
     * @param mixed $id
     */
    public function setdescripcion($descripcion) {
        
      if ($descripcion) {
          
            $this->descripcion = $descripcion;
            
        } else {
            $this->descripcion = 'Cafeteria sin descripcion';
        }
    }

    /**
     * @return mixed
     */
    public function getdescripcion() {
        
        return $this->descripcion;
        
    }

    /**
     * @param mixed $id
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @param mixed $id
     */
    public function setUserId($usuarios_id) {
        $this->id = $usuarios_id;
    }

    /**
     * @return mixed
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * @param mixed $id
     */
    public function setNombre($nombre) {
        if ($nombre) {
            $this->nombre = $nombre;
        } else {
            $this->nombre = '-';
        }
    }

    /**
     * @return mixed
     */
    public function getDireccion() {
        return $this->direccion;
    }

    /**
     * @param mixed $puntaje
     */
    public function setPuntaje($puntaje) {

        if ($puntaje) {
            $this->puntaje = $puntaje;
        } else {
            $this->puntaje = '0';
        }
    }

    /**
     * @param mixed $id
     */
    public function setDireccion($direccion) {

        if ($direccion) {
            $this->direccion = $direccion;
        } else {
            $this->direccion = '0';
        }
    }

    /**
     * @param mixed $usuarios_id
     */
    public function setUsuariosId($usuarios_id) {
        $this->usuarios_id = $usuarios_id;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono) {
        
        if ($telefono) {
            $this->telefono = $telefono;
        } else {
            $this->telefono = '-';
        }
        
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email) {
        if ($email) {
            $this->email = $email;
        } else {
            $this->email = '-';
        }
    }

    /**
     * @param mixed $sitioweb
     */
    public function setSitioweb($sitioweb) {

        if ($sitioweb) {
            $this->sitioweb = $sitioweb;
        } else {
            $this->sitioweb = '-';
        }
    }

    /**
     * @param mixed $sucursal
     */
    public function setSucursal($sucursal) {
        
        if ($sucursal) {
            $this->sucursal = $sucursal;
        } else {
            $this->sucursal = '-';
        }
    }
    
    /**
     * @param mixed $sucursal
     */
    public function getSucursal() {
        
       return $this->sucursal;
    }

    /**
     * @param mixed $ranking
     */
    public function setRanking($ranking) {
        
       if ($ranking) {
            $this->ranking = $ranking;
        } else {
            $this->ranking = '0';
        }
    }  
    /**
     * @param mixed $ranking
     */
    public function getterRanking() {
        
       if ( $this->ranking) {
             return $this->ranking;
        } else {
            return  '0';
        }
        
    }

    /**
     * @return mixed
     */
    public function getPuntaje() {
        return $this->puntaje;
    }

    /**
     * @return mixed
     */
    public function getUserId() {
        return $this->usuarios_id;
    }
    
    /**
     * @return mixed
     */
    public function getImgPortada($id) {
        return $this->puntaje;
    }

    /**
     * @return mixed
     */
    public function setImgPortada($id) {
        return $this->usuarios_id;
    }
    
    /**
     * @return mixed
     */
    public function getIdestado() {
        return $this->id_estado;
    }

    /**
     * @return mixed
     */
    public function setIdestado($estado) {
           if ($estado) {
            $this->estado = $estado;
        } else {
            $this->estado = 2;
        }
    }

}
