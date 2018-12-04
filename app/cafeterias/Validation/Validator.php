<?php
namespace cafeterias\Validation;

class Validator
{
	/** @var array Los datos a validar */
	protected $data = [];

	/** @var array Las reglas de validacion */
	protected $rules = [];

	/** @var array Los mensajes de error */
	protected $errors = [];

	/**
	 * Constructor.
	 *
	 * @param array $data La data a validar.
	 * @param array $rules Las reglas de validacion.
	 */
	public function __construct($data, $rules)
	{
		$this->data = $data;
		$this->rules = $rules;
		$this->validate();
	}

	/**
	 * Ejecuta las validaciones.
	 */
	public function validate()
	{
		// Recorremos todas las reglas.
		foreach($this->rules as $fieldName => $fieldRules) {
			// $fieldName => 'nombre'
			// $fieldRules => ['required', 'min:3']
			foreach($fieldRules as $ruleName) {
				// $ruleName => 'required'
				// $ruleName => 'min:3'

				$this->executeRule($fieldName, $ruleName);
			}
		}
	}

	/**
	 * Ejecuta una regla de validacion sobre un campo.
	 *
	 * @param string $fieldName El nombre del campo.
	 * @param string $ruleName El string de la regla de validacion.
	 * @throws Exception
	 */
	public function executeRule($fieldName, $ruleName)
	{
		// $fieldName => 'nombre'
		// Caso 1. $ruleName => 'required'
		// Caso 2. $ruleName => 'min:3'
		// Verificamos si estamos en el caso 1 o 2.
		if(strpos($ruleName, ':') === false) {
			// Caso 1.
			// En el caso de, por ejemplo, 'required',
			// tenemos que llamar al metodo que se llama
			// igual, pero con un _ de prefijo.
			$methodName = "_" . $ruleName;

			// Verificamos que el metodo exista.
			if(!method_exists($this, $methodName)) {
				throw new Exception("La regla '" . $ruleName . "' no existe.");
				
			}

			// Teniendo el nombre del metodo armado,
			// podemos ejecutarlo.
			// $methodName => '_required'
			// $this->_required($fieldName);
			$this->{$methodName}($fieldName);
		} else {
			// Caso 2.
			// En el caso de tener, por ejemplo, "min:3",
			// necesitamos cortar el nombre y el valor,
			// separados por el ":".
			$ruleData = explode(':', $ruleName);

			$methodName = "_" . $ruleData[0];
			// Verificamos que el metodo exista.
			if(!method_exists($this, $methodName)) {
				throw new Exception("La regla '" . $ruleName . "' no existe.");
				
			}

			// Teniendo el nombre del metodo armado,
			// podemos ejecutarlo.
			// $methodName => '_min'
			// $this->_min($fieldName, $ruleData[1]);
			$this->{$methodName}($fieldName, $ruleData[1]);
		}
	}

	/**
	 * Informa si la validacion fue exitosa.
	 *
	 * @return bool
	 */
	public function passes()
	{
		if(count($this->errors) == 0) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Retorna los errores.
	 *
	 * @return array
	 */
	public function getErrors()
	{
		return $this->errors;
	}

	/**
	 * Agrega un mensaje de error de la validacion.
	 *
	 * @param string $fieldName
	 * @param string $msg
	 */
	public function addError($fieldName, $msg)
	{
		// Verificamos si no existen errores para este campo.
		if(!isset($this->errors[$fieldName])) {
			$this->errors[$fieldName] = [];
		}

		// Pusheamos el dato al array.
		$this->errors[$fieldName][] = $msg;
	}

	// Metodos de validacion.
	// Por cada regla de validacion, vamos a crear un
	// metodo que sea el nombre de la regla, precedido
	// por un "_".
	// Todas esas funciones van a recibir, como mínimo,
	// el nombre del campo.

	/**
	 * Verifica que el campo no este vacío.
	 *
	 * @param string $fieldName
	 */
	protected function _required($fieldName)
	{
		$value = $this->data[$fieldName];
		if(empty($value)) {
			// Error.
			$this->addError($fieldName, 'El campo ' . $fieldName . ' no debe estar vacío.');
		}
	}

	/**
	 * Verifica que el campo sea numerico.
	 *
	 * @param string $fieldName
	 */
	public function _numeric($fieldName)
	{
		$value = $this->data[$fieldName];
		if(!is_numeric($value)) {
			$this->addError($fieldName, 'El campo ' . $fieldName . " debe tener un valor numerico.");
		}
	}
        
	/**
	 * Verifica que el campo sea numerico.
	 *
	 * @param string $fieldName
	 */
	public function _igual($fieldName)
	{
		$value1 = $this->data[$fieldName];
		$value2 = $this->data[$fieldName.'2'];
                          
                
		if($value1 != $value2) {
			$this->addError($fieldName, 'El campo ' . $fieldName . " no es igual al dato $fieldName.");
                }
	}

	/**
	 * Verifica que tenga al menos $minLength caracteres.
	 *
	 * @param string $fieldName
	 * @param int $minLength
	 */
	public function _min($fieldName, $minLength)
	{
		$value = $this->data[$fieldName];
		if(strlen($value) < $minLength) {
			$this->addError($fieldName, 'El campo ' . $fieldName . " debe tener al menos " . $minLength . " caracteres.");
		}
	}
}