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

    public function index()     {

        if (!Session::has('Usuario') || $_SESSION['Rol'] != 1) {

           App::redirect('home');
           
        }

        
        if ($_SESSION['Rol'] == 1) {
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
        
        if(!Session::has('Usuario') || $_SESSION['Rol'] != 1) {

           App::redirect('home');
        }

        $validator = new Validator($_POST, [
            'nombre' => ['required', 'min:3'],
            'titulo' => ['required', 'min:10', 'max:55'],
            'descripcion' => ['required', 'min:50']
        ]);

        if (!$validator->passes()) {

            Session::set('_old_input', $_POST);
            
            Session::set('_errors', $validator->getErrors());

            if (isset($_POST['ideditar'])) {

                App::redirect('crearevento/' . $_POST['ideditar']);
            } else {

                App::redirect('crearevento');
            }
        }


        if (isset($_POST['ideditar'])) {

            $evento = Eventos::update([
                        'ideditar' => $_POST['ideditar'],
                        'nombre' => $_POST['nombre'],
                        'titulo' => $_POST['titulo'],
                        'descripcion' => $_POST['descripcion'],
                        'fecha_evento' => $_POST['fecha_evento'],
                        'estado' => $_POST['estado'],
            ]);
            
        } else {

            $evento = Eventos::crear([
                        'nombre' => $_POST['nombre'],
                        'titulo' => $_POST['titulo'],
                        'descripcion' => $_POST['descripcion'],
                        'fecha_evento' => $_POST['fecha_evento'],
                        'estado' => $_POST['estado']
            ]);
        }
        

        if ($evento) {

                if($_FILES["imagen"]['name'] != '' && $_FILES["imagen"]['name'] != 'image/png'){                   
                
                    $nombre = HandleImage::upImage($_FILES, $evento, 355, 'img/eventos/');
         
                    $path_imagen = 'img/eventos/' . $nombre;

                    $usuario = Eventos::updateImagen([
                                'idevento' => $evento,
                                'ubicacion_imagen' => $path_imagen
                    ]);
                
            }
            
        }

        if (isset($_POST['ideditar'])) {

            App::redirect('crearevento/' . $_POST['ideditar']);
            
        } else {

            App::redirect('crearevento');
        }
    }

    /**
     * obtiene id de evento por url ,y nos lleva a editarlo
     *
     * @throws Exception
     */
    public function editar() {

        if (!Session::has('Usuario') || $_SESSION['Rol'] != 1) {

           App::redirect('home');
           
        }

        $data = Route::getUrlParameters();

        $id = $data['id'];

        // Obtenemos las cafeteria que nos piden.
        $evento = new Eventos($id);

        View::render('admin/editarevento', compact('evento'), 1);
    }
    
    
        
    /**
     * Eliminar una cafeteria solo cambia su estado a inactiva
     *
     * @return cafeteria
     * @throws Exception
     */
    public function eliminar(){
        
        
      $user = Eventos::delete($_POST['ideliminar']);
      
      if($user){
          
           App::redirect('crearevento');
           
      }

    }
    
    /**
     * Obtengo cafeteria en base al id pasado por url
     */
        public function ver() {

        $data = Route::getUrlParameters();

        $id = $data['id'];
        
        // Obtenemos las cafeteria que nos piden.
        $evento = new Eventos($id);
        
         $anotado=false;
        
       if(Session::has('Usuario') ){
            
            $asiste = $evento->asistentes($evento->getId());
            
            $anotado=false;
            
        foreach ($asiste as $row){

           if($row['id_usuario'] == Session::get('id')){

                $anotado = true;
          }  
        }
        
      }
      
      $data['asiste']=$anotado;
      $data['evento']=$evento;
        

      View::render('front/verevento', compact('data'));



    }
    
    /**
     * Recibe por post id de usuario y de evento y 
     * los inserta en la tabla correspondiente
     * 
     */
     public function asistir() {

      $evento = Eventos::asistir([
                        'idusuario' => $_POST['id_user'],
                        'idevento' => $_POST['id_evento'],
                        'asiste' => $_POST['asiste'],
            ]);
      
       

    }

}
