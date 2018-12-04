<?php
namespace cafeterias\Models;

use cafeterias\DB\DBConnection as Connection;
use PDO;
use JsonSerializable;


/**
 * Maneja la tabla users.
 */
class User extends Modelo implements JsonSerializable 
{

    protected $table = "usuarios";
    
    protected $primaryKey = "id";
    
    protected $attributes = [
        'id',
        'rol_usuario_id',
        'email',
        'password',
        'nombre',
        'apellido',
        'estados_id',
        'ubicacion_foto'

    ];
    protected $method;

    /**
     * Metodo de serializacion a JSON.
     */
    public function JsonSerialize() {
       
        return [
            'id'                => $this->getIdUser(),
            'rol_usuario_id'    => $this->getRolUsuarioId(),
            'email'             => $this->getEmail(),
            'password'          => $this->getPassword(),
            'nombre'            => $this->getNombre(),
            'apellido'          => $this->getApellido(),
            'estados_id'        => $this->getEstado(),
            'ubicacion_foto'    => $this->getFoto()
                     
        ];
    }

    protected function cargarDatos($fila)
    {
        
                    $this->setIdUser($fila['id']);
                    $this->setRolUsuarioId($fila['rol_usuario_id']);
                    $this->setPassword($fila['pass']);
                    $this->setEmail($fila['email']);
                    $this->setNombre($fila['nombre']);
                    $this->setApellido($fila['apellido']);
                    $this->setEstado($fila['estados_id']);
                    $this->setFoto($fila['ubicacion_foto']);
    }



    public static function findAll()
    {
                    // TODO: Implement findAll() method.
                    $query = "SELECT * FROM usuarios";
                    $stmt = Connection::getStatement($query);
                    $stmt->execute();
                    $salida = [];
                    while($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    $usuario = new User();  
                                    $usuario->cargarDatos($fila);
                                    $salida[] = $usuario;
                    }
                    return $salida;

    }



	/**
	 * Obitene un usuario por su email.
	 *
	 * @param string $email
	 * @return User|null
	 */
	public static function getByEmail($email)
	{
		$db = Connection::getConnection();
		$query = "SELECT * FROM usuarios
				WHERE email = ?";
		$stmt = $db->prepare($query);
		$stmt->execute([$email]);
                
		if($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$user = new User;
			$user->cargarDatos($fila);
			return $user;
		} else {
			return null;
		}
	}

	/**
	 * Crea un nuevo usuario desde el login del front.
	 *
	 * @param array $data
	 * @return User
	 * @throws Exception
	 */
	public static function registrar($email,$pass)
	{
		$db = Connection::getConnection();
                
		$rol = '4';
                
		$query = "INSERT INTO usuarios (email,pass,rol_usuario_id,estados_id)
				VALUES (?,?,?,'1')";
		$stmt = $db->prepare($query);
		$exito = $stmt->execute([$email,$pass,$rol]);
		if(!$exito) {
				print_r($stmt->errorInfo());
				throw new Exception("Error al crear el usuario");
		}else{

				$user = new User;
                                
				$user->setIdUser($db->lastInsertId());
				$user->setEmail($email);
				$user->setPassword($pass);
				$user->setRolUsuarioId($rol);

		}
			return $user;

	}
        
        /**
	 * Crea un nuevo desde el back , con mas info.
	 *
	 * @param array $data
	 * @return User
	 * @throws Exception
	 */
	public static function cargar($datos)
	{
		$db = Connection::getConnection();
               
                
		$query = "INSERT INTO usuarios (nombre,apellido,email ,rol_usuario_id,estados_id ,pass)
				VALUES (:nombre,:apellido,:email,:rol_usuario_id ,:estados_id ,:pass)";
                
		$stmt = $db->prepare($query);

                $pass = Hash::encrypt($datos['pass']);
                
                $exito = $stmt->execute([
                    'nombre'         => $datos['nombre'],
                    'apellido'       => $datos['apellido'],
                    'email'          => $datos['email'],
                    'rol_usuario_id' => $datos['rol_usuario_id'],
                    'estados_id'     => $datos['estados_id'],
                    'pass'           => $pass,
                ]);
                
	
            if ($exito) {
                

                $usuario = new User;
                $datos['id'] = $db->lastInsertId();
                $usuario->cargarDatos($datos);

                return $db->lastInsertId();
        } else{
          throw new \Exception('Error al crear la cafeteria.');
          
            }

	}
        
         /**
	 * Update el usuario
	 *
	 * @param array $data
	 * @return User
	 * @throws Exception
	 */
		public static function update($datos)
		{ 
                    $db = Connection::getConnection();
                       
                        $query = "UPDATE usuarios SET
                            nombre = :nombre ,
                            apellido= :apellido ,
                            email = :email  ";
                        
                        
                        if(isset( $datos['rol_usuario_id'])){
                            
                        $query.="
                            , pass = :pass
                            , rol_usuario_id = :id_rol 
                            ,estados_id = :estado ";
                        
                        }        
                                
                        $query.=",ubicacion_foto = :path_foto "
                                . "where id = :id";
                        
                        
                        
                        if(isset($datos['ubicacion_foto'])){
                            
                            $path_foto= $datos['ubicacion_foto'];
                           
                        }else{
                            
                            $path_foto='img/usuarios/nopicture.png';
                            
                        }
                        
                     
                        
                        $stmt = $db->prepare($query);
                        
                       
                        if(isset($datos['estados_id'])){
                        
                        $exito = $stmt->execute([
                            'nombre' =>         $datos['nombre'],
                            'apellido' =>       $datos['apellido'],
                            'email' =>          $datos['email'],
                            'pass' =>           $datos['pass'],
                            'id_rol' =>         $datos['rol_usuario_id'],
                            'estado' =>         $datos['estados_id'],
                            'path_foto'=>       $path_foto,
                            'id' =>        $datos['id']
                          
                        ]);
                         
                        
                        }else{
                            
                        $exito = $stmt->execute([
                            'nombre' =>         $datos['nombre'],
                            'apellido' =>       $datos['apellido'],
                            'email' =>          $datos['email'],
                            'path_foto'=>       $path_foto,
                            'id' =>        $datos['id']
                          
                        ]);
                            
                        }
                 
                        
                        if ($exito) {
                            
                            $user = new User;
                            $datos['id'] = $db->lastInsertId();
                            $user->cargarDatos($datos);
                    return $user;
                    } else {
                        //return false;
                        //print_r($stmt->errorInfo());
                        throw new \Exception('Error al crear el usuario.');
                    }
                        
                      
		}
                
     /**
     *  delete
     * @return bool
     * @throws Exception
     */
    public static function delete($id_usuarios) {
        
        $db = Connection::getConnection();
        
       $query = "UPDATE usuarios SET estados_id = 2  where id =:id";
      
        $stmt = $db->prepare($query);


        $exito = $stmt->execute([
            'id' => $id_usuarios
        ]);
        
        if($exito){
            return true;
        }
      
        

    }
                

		/**
			* @return mixed
			*/
		public function getRolUsuarioId()
		{
				return $this->rol_usuario_id;
		}

		/**
			* @param mixed $rol_usuario_id
			*/
		public function setRolUsuarioId($rol_usuario_id)
		{
				$this->rol_usuario_id = $rol_usuario_id;
		}




		/**
			* @return mixed
			*/
		public function getFoto()
		{
				return $this->ubicacion_foto;
		}

		/**
			* @param mixed $email
			*/
		public function setFoto($foto)
		{
				$this->ubicacion_foto = $foto;
		}
                

		/**
			* @return mixed
			*/
		public function getEmail()
		{
				return $this->email;
		}

		/**
			* @param mixed $email
			*/
		public function setEmail($email)
		{
				$this->email = $email;
		}

		/**
			* @return mixed
			*/
		public function getIdUser()
		{
				return $this->id;
		}

		/**
			* @param mixed $id
			*/
		public function setIdUser($id)
		{
				$this->id = $id;
		}

		/**
			* @return mixed
			*/
		public function getPassword()
		{
				return $this->password;
		}

		/**
                * @param mixed $password
                */
		public function setPassword($password)
		{
				$this->password = $password;
		}
                
                
		/**
                * @param mixed nombre
                */
		public function setNombre($nombre)
		{
				$this->nombre = $nombre;
		}
                
		/**
                * @param mixed nombre
                */
		public function getNombre()
		{
				return $this->nombre;
		}
                
		/**
                * @param mixed nombre
                */
		public function setApellido($apellido)
		{
				$this->apellido = $apellido;
		}
                
		/**
                * @param mixed apellido
                */
		public function getApellido()
		{
				return $this->apellido;
		}
                
		/**
                * @param mixed estado
                */
		public function setEstado($estado)
		{
				$this->estados_id = $estado;
		}
                
		/**
                * @param mixed nombre
                */
		public function getEstado()
		{
				return $this->estados_id ;
		}





}
