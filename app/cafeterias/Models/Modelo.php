<?php

namespace cafeterias\Models;

use cafeterias\DB\DBConnection;
use PDO;
use Exception;

/**
 * Clase base de Modelo que incluya las funcionalidades de un ABM.
 */
class Modelo
{
	/** @var string La tabla del modelo. */
	protected $table = "";

	/** @var string El nombre de la PK. */
	protected $primaryKey = "";
	
	/** @var array La lista de los atributos de la tabla. */
	protected $attributes = [];

	/**
	 * Constructor.
	 *
	 * @param int|null $pk
	 */
	public function __construct($pk = null)
	{
		if(!is_null($pk)) {
			$this->getByPk($pk);
		}
	}

	/**
	 * Obtiene un registro por su llave primaria.
	 *
	 * @param int $pk
	 */
	public function getByPk($pk)
	{
		$db = DBConnection::getConnection();
		$query = "SELECT * FROM " . $this->table . "
				WHERE " . $this->primaryKey . " = ?";
		$stmt = $db->prepare($query);

		$exito = $stmt->execute([$pk]);

		if($exito) {
			$this->loadDataFromRow($stmt->fetch(PDO::FETCH_ASSOC));
		} else {
			throw new Exception("Error al crear el objeto.");
		}
	}

	/**
	 * Carga los datos del objeto en base al array proporcionado.
	 *
	 * @param array $data
	 */
	public function loadDataFromRow($data)
	{
		foreach($this->attributes as $attr) {
			
                    if(isset($data[$attr])) {
				$this->{$attr} = $data[$attr];
		}
		}
	}

	/**
	 * Obtiene una array con todos los modelos.
	 *
	 * @return array
	 */
	public static function getAll()
	{
		
		$self = new static;
                
		$db = DBConnection::getConnection();
		$query = "SELECT * FROM " . $self->table;

		$stmt = $db->prepare($query);

		$stmt->execute();

		$salida = [];

		while($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$obj = new static;
			$obj->loadDataFromRow($fila);
			$salida[] = $obj;
		}

		return $salida;
	}
}