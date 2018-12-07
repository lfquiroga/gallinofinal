<?php

namespace cafeterias\Core;
use cafeterias\Storage\Session;

class View {

    /**
     * Imprime la vista indicada.
     *
     * @param string $__vista   La ruta de la vista, sin el php.
     * @param array $__data     Los datos a proporcionale a la vista. El índice va a ser el nombre de la variable, y el valor, el dato asignado.
     */
    public static function render($__vista, $__data = [], $admin = null) {

        if(Session::has('Rol')){
            $admin = $_SESSION['Rol'];
        }
        
        foreach ($__data as $key => $value) {
            ${$key} = $value;
        }

        // Incluimos el header.
        require App::getViewsPath() . '/templates/header.php';

        if ($admin == 1) {
            
            require App::getViewsPath() . '/templates/menuadmin.php';
            
        } else if($admin == 4){
            
            require App::getViewsPath() . '/templates/menu_usuario.php';
            
        }else{
            
           require App::getViewsPath() . '/templates/menu.php'; 
           
        }
        
        require App::getViewsPath() . '/' . $__vista . ".php";

        // Incluimos el footer.
        require App::getViewsPath() . '/templates/footer.php';
    }

    /**
     * Retorna la $data con formato JSON.
     *
     * @param mixed $data
     */
    public static function renderJson($data) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

}
