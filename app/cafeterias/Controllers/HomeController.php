<?php

namespace cafeterias\Controllers;


use cafeterias\Auth\Auth;
use cafeterias\Core\App;
use cafeterias\Core\View;
use cafeterias\Models\Cafeteria;
use cafeterias\Models\User;
use cafeterias\Models\Favoritos;
use cafeterias\Core\Route;
use cafeterias\Storage\Session;


class HomeController
{
    public function index(){          
        
        $cafeterias= Cafeteria::getRanking();
        
        $favoritas='';
        
      if (Session::has('id')){
            
        $favoritas= Favoritos::getById($_SESSION['id'], 'id_usuario');
                
        }        
        
       $data['cafeterias']=$cafeterias;
       
       $fav=array();
       
       if($favoritas != ''){
           
           foreach ($favoritas as $row){
               
               $fav[]=$row['id_cafeteria'];
               
           }
           
         $data['favoritas']=$fav;
         
       }
       
        View::render('front/inicioView', compact('data'));
    }
    
    public function panel()
    {   
        
        View::render('/admin/acceso');
    }
    
    /**
     * Ver una cafeteria nueva en la base con un id pasado por url.
     *
     * @param $datos array
     * @return cafeteria
     * @throws Exception
     */
    public function ver() {

        $data = Route::getUrlParameters();
        $id = $data['id'];

        // Obtenemos las peliculas que nos piden.
        $cafeteria = new Cafeteria($id);

        View::render('/front/vercafeteria', compact('cafeteria') );
    }
}