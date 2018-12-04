<?php

namespace cafeterias\Controllers;

use cafeterias\Storage\Session;
use cafeterias\Auth\Auth;
use cafeterias\Models\User;
use cafeterias\Models\Favoritos;
use cafeterias\Validation\Validator;
use cafeterias\Models\Cafeteria;
use cafeterias\Core\View;
use cafeterias\Core\HandleImage;
use cafeterias\Core\Route;
use cafeterias\Core\App;
/*
if ($_SESSION['Rol'] != 1 || $_SESSION['Rol'] != 4 ){
    
     $cafeterias= Cafeteria::getRanking();
     
    View::render('front/inicioView', compact('cafeterias'));
}
 
*/
/**
 * 
 */
class CafeteriasController {

   public function index() {
       
        if($_SESSION['Rol'] == 1){
        // Traemos todas cafeterias.
        $cafeterias = Cafeteria::getAll();
        
        View::render('admin/abmcafeterias', compact('cafeterias'), 1);
        
        }
    }




    /**
     * obtiene id de cafeteria por url , inicia el objeto cafeteria con ese if y 
     * nos lleva a la pagina editar con los datos de esa cafeteria.
     *
     * @param $datos array
     * @return cafeteria
     * @throws Exception
     */
    public function editar() {
        
        
    if (!Session::has('Usuario') || $_SESSION['Rol'] != 1 ){

         $cafeterias= Cafeteria::getRanking();

        View::render('front/inicioView', compact('cafeterias'));
    }

        $data = Route::getUrlParameters();

        $id = $data['id'];

        // Obtenemos las cafeteria que nos piden.
        $cafeteria = new Cafeteria($id);

        View::render('admin/envento', compact('cafeteria'),1);
    }

    /**
     * Carga una nueva cafeteria o hace update segun corresponda
     *
     * 
     * @return bool
     * @throws Exception
     */
    public function cargar() {



        $validator = new Validator($_POST, [
            'nombre' => ['required', 'min:3'],
            'direccion' => ['required', 'min:5'],
            'sucursal' => ['required', 'min:3'],
            'telefono' => ['required', 'min:6'],
            'sitio' => ['required', 'min:6'],
            'email' => ['required', 'min:6'],
        ]);

        if (!$validator->passes()) {

            Session::set('_old_input', $_POST);
            Session::set('_errors', $validator->getErrors());


            if ($_POST['ideditar']) {

                App::redirect('abmcafeterias/editar/' . $_POST['ideditar']);
            } else {
                App::redirect('abmcafeterias');
            }
        }

        if (isset($_POST['ideditar'])) {

            $cafeterias = Cafeteria::update([
                        'nombre' => $_POST['nombre'],
                        'direccion' => $_POST['direccion'],
                        'sucursal' => $_POST['sucursal'],
                        'telefono' => $_POST['telefono'],
                        'sitio' => $_POST['sitio'],
                        'email' => $_POST['email'],
                        'id' => $_POST['ideditar']
            ]);
            
            $id_cafeteria=$_POST['ideditar'];

        } else {


            $id_cafeteria = Cafeteria::crear([
                        'nombre' => $_POST['nombre'],
                        'direccion' => $_POST['direccion'],
                        'sucursal' => $_POST['sucursal'],
                        'telefono' => $_POST['telefono'],
                        'sitio' => $_POST['sitio'],
                        'email' => $_POST['email']
            ]);
           
        }
        

        
            if ($_FILES["imagen"]['name'] != '' ) {
            
                $nombre = HandleImage::upImage($_FILES, $id_cafeteria,300);
              
              
                $imagen_cafeteria = Cafeteria::imagenCafeteria($nombre, $id_cafeteria, 'Portada cafeteria');

  
                if ($imagen_cafeteria){
                    // Redireccionamos
                    App::redirect('abmcafeterias');
                }
                
            } else {
                App::redirect('abmcafeterias');
            }
        
        
    }

    
    /**
     * Eliminar una cafeteria solo cambia su estado a inactiva
     *
     * @return cafeteria
     * @throws Exception
     */
    public function eliminar(){
        
        
      $user = Cafeteria::delete($_POST['ideliminar']);
      
      if($user){
           App::redirect('abmcafeterias');
      }

     
    }

    /**
     * Recibe un id de cafeteria y lo asocia con un usuario
     *
     * @return cafeteria
     * @throws Exception
     */
    public function favoritos(){
        
        $data = Route::getUrlParameters();
        
        $cafeteria_favorita =$data['id'];
        
        $user = Favoritos::cargar([
                        'id_usuario' => $_SESSION['id'] ,
                        'id_cafeteria' => $cafeteria_favorita
            ]);
          
        if($user){
            echo( 'OK');
        }
    }
    
    /**
     * Recibe un id de cafeteria y lo asocia con un usuario
     *
     * @return cafeteria
     * @throws Exception
     */
    public function quitarFavoritos(){
        
        $data = Route::getUrlParameters();
        
        $cafeteria_favorita =$data['id'];
        
        $fav = Favoritos::borrar([
                        'id_usuario' => $_SESSION['id'] ,
                        'id_cafeteria' => $cafeteria_favorita
            ]);
          
        if($fav){
            echo( 'OK');
        }
    }

    
    
    
    
  

}
