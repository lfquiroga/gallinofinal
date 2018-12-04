<?php

namespace cafeterias\Controllers;

use cafeterias\Storage\Session;
use cafeterias\Auth\Auth;
use cafeterias\Models\User;
use cafeterias\Models\Favoritos;
use cafeterias\Models\CafeteriasComentarios;
use cafeterias\Validation\Validator;
use cafeterias\Models\Cafeteria;
use cafeterias\Core\View;
use cafeterias\Core\Route;
use cafeterias\Core\App;



if (!Session::has('Rol')){
    
     $data['cafeterias']= Cafeteria::getRanking();
     
    View::render('front/inicioView', compact('data'));
}
 

/**
 * 
 */
class FavoritosController {

   public function index() {       
        $favoritas='';
        // Traemos todas cafeterias en favoritos.      
        $favoritas= Favoritos::getById($_SESSION['id'], 'id_usuario');

        if($favoritas != ''){
            
         foreach ($favoritas as $row){
            
            $cafeteria_obj= new Cafeteria($row['id_cafeteria']);
             
            $comen=CafeteriasComentarios::getAllById($cafeteria_obj->getId());
            
            $data['cafeterias'][]=$cafeteria_obj;
            $data['comentarios'][$cafeteria_obj->getId()]= $comen;
            $data['estado_comentario'][$cafeteria_obj->getId()]= $row['nuevo_comentario'];
         }
         
           View::render('panelusuario/favoritas', compact('data'), 4);
           
        }else{
            
           View::render('panelusuario/favoritas','', 4);
        }
        
      
        
    }
    
}