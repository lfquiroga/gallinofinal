<?php

namespace cafeterias\Controllers;

use cafeterias\Storage\Session;
use cafeterias\Auth\Auth;
use cafeterias\Models\User;
use cafeterias\Models\Eventos;
use cafeterias\Models\Favoritos;
use cafeterias\Validation\Validator;
use cafeterias\Models\Cafeteria;
use cafeterias\Core\View;
use cafeterias\Core\HandleImage;
use cafeterias\Core\Route;
use cafeterias\Core\App;

/**
 * Description of EventosController
 *
 * @author lquiroga
 */

class EventosController {
    
    /*
     * Obtengo los eventos de la db
     * 
     * @return Eventos
     */
    
    
      public function index() {
       
        if($_SESSION['Rol'] == 1){
        // Traemos todas cafeterias.
        $eventos = Eventos::getAll();
        
        View::render('admin/abmeventos', compact('eventos'), 1);
        
        }
    }
    
    
     /**
     * Carga un nuevo evento
     *
     * 
     * @return bool
     * @throws Exception
     */
    public function cargar() {
        
        $validator = new Validator($_POST, [
            'nombre' => ['required', 'min:3'],
            'titulo' => ['required', 'min:10'],
            'descripcion' => ['required', 'min:50']

        ]);
        

        
        if (!$validator->passes()) {

            Session::set('_old_input', $_POST);
            Session::set('_errors', $validator->getErrors());


            if (isset($_POST['ideditar'])){

                App::redirect('crearevento' . $_POST['ideditar']);
                
            } else {

                App::redirect('crearevento');
                
            }
        }
        
         $path_imagen='img/usuarios/nopicture.png';
        
        /*if ($_FILES) {
            
                $nombre = HandleImage::upImage($_FILES, $_POST['ideditar'], 200 ,'img/usuarios/');
                
                $path_imagen='img/eventos/'.$nombre;
               
            }*/

        if (isset($_POST['ideditar'])){

            
          $pass = Hash::encrypt($_POST['pass']);
             
          $usuario = User::update([
                        'nombre'        => $_POST['nombre'],
                        'titulo'        => $_POST['titulo'],
                        'descripcion'   => $_POST['descripcion'],
                        'fecha_evento'  => $_POST['fecha_evento'],
                        'estado'        => $_POST['estado'],
               
            ]);

            // Redireccionamos.
            App::redirect('abmusuarios');
            
        } else {

            $evento = Eventos::crear([
                        'nombre'        => $_POST['nombre'],
                        'titulo'        => $_POST['titulo'],
                        'descripcion'   => $_POST['descripcion'],
                        'fecha_evento'  => $_POST['fecha_evento'],
                        'estado'        => $_POST['estado']

               
            ]);
            
            
            if($evento){
                
                if ($_FILES) {   

                $nombre = HandleImage::upImage($_FILES,$evento, 355 ,'img/eventos/');
                

                $path_imagen='img/eventos/'.$nombre;
                
                 $usuario = Eventos::updateImagen([
                      'idevento'              => $evento,
                        'ubicacion_imagen'      => $path_imagen
                    ]);
               
                }
            }
                        

            App::redirect('crearevento');
          
            
        }
        
    }
    
    
    /**
     * obtiene id de evento por url ,y nos lleva a editarlo
     *
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
        $evento = new Eventos($id);

        View::render('admin/editarevento', compact('evento'),1);
    }
    

}
