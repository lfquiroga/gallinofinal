<?php

namespace cafeterias\Core;

/**
 * Class Request
 * @package cafeterias\Core
 *
 * Maneja lo referente a la petición del usuario.
 * Esto incluye:
 * - Obtener la ruta pedida.
 * - Obtener el verbo de la petición.
 */
class Request
{
    /** @var string La ruta buscada a partir de public. */
    protected $requestedUrl;

    /** @var string El verbo de la petición. */
    protected $method;
    protected $data;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];


        $rutaAbsoluta = $_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'];

        $this->requestedUrl = str_replace(App::getPublicPath(), '', $rutaAbsoluta);
    }

    /**
     * @return string
     */
    public function getRequestedUrl()
    {
        return $this->requestedUrl;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    protected function dataReader()
    {
        switch($this->getMethod()){
            case 'GET':
                break;
            case 'DELETE':
                break;
            case 'POST':
                $this->postData();
                break;
            case 'PUT':
                $this->postData();
                break;
            default:
                $this->postData();
        }
    }

    protected function postData()
    {
        $postInput = file_get_contents('php://input');
        $postData = json_decode($postInput, true);
        $this->data = $postData;
    }

    public function getData()
    {
        return $this->data;
    }


}