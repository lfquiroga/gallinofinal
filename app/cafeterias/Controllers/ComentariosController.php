<?php

namespace cafeterias\Controllers;

namespace cafeterias\Controllers;

use cafeterias\Storage\Session;
use cafeterias\Auth\Auth;
use cafeterias\Models\User;
use cafeterias\Models\CafeteriasComentarios;
use cafeterias\Models\Favoritos;
use cafeterias\Validation\Validator;
use cafeterias\Models\Cafeteria;
use cafeterias\Core\View;
use cafeterias\Core\HandleImage;
use cafeterias\Core\Route;
use cafeterias\Core\App;


 
if (!Session::has('Rol')){
    
     $data['cafeterias']= Cafeteria::getRanking();
     
    View::render('front/inicioView', compact('data'));
}
 

/**
 * 
 */
class ComentariosController {
    
    /**
     * VInserta un comentario asociandolo con una cafeteria y actualiza el contador de comentarios
     *
     * @return string
     */
    
   public function cargarComentarios() {   
       
   

        $validator = new Validator($_POST, [
            'comentario' => ['required', 'min:5'],

        ]);
        
        
        if (!$validator->passes()) {
            Session::set('_old_input', $_POST);
            Session::set('_errors', $validator->getErrors());

        }
        
          $comentario = CafeteriasComentarios::cargar([
                        'id_usuario'    => $_SESSION['id'],
                        'id_cafeteria'  => $_POST['id'],
                        'comentario'    => $_POST['comentario']
            ]);
          
          if($comentario){
            echo('OK');
        }else{
            echo('ERROR');
        }
        
    }
    
     /**
     * actualiza contador de comentarios
     *
     * @return string
     */
   public function actualizarComentarios() {   
       
        
          $comentario = CafeteriasComentarios::actualizarContador([
                        'id_usuario'    => $_SESSION['id'],
                        'id_cafeteria'  => $_POST['id']
            ]);
          
          if($comentario){
            echo('OK');
        }else{
            echo('ERROR');
        }
        
    }
    
    
}