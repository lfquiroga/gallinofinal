<?php

namespace cafeterias\Controllers;

use cafeterias\Storage\Session;
use cafeterias\Auth\Auth;
use cafeterias\Core\Hash;
use cafeterias\Models\User;
use cafeterias\Validation\Validator;
use cafeterias\Core\HandleImage;
use cafeterias\Models\Cafeteria;
use cafeterias\Core\View;
use cafeterias\Core\Route;
use cafeterias\Core\App;


class UserController{

  public static function traerTodos(){
            
    if (!Session::has('Usuario') || $_SESSION['Rol'] != 1 ){
    
     $cafeterias= Cafeteria::getRanking();
     
    View::render('front/inicioView', compact('cafeterias'));
}

            if($_SESSION['Rol'] == 1 ){
                
                $usuarios = User::getAll();
              
                View::render('admin/abmusuarios', compact('usuarios'),1);
                
                
            }
			
	}
        
     /**
     * panelUsuarios
     *
     *Datos de usuario y redirecciona al panel
     * 
     * @return bool
     * @throws Exception
     */  
    public static function panelUsuarios(){

         if (!Session::has('Rol')){

          $cafeterias= Cafeteria::getRanking();

         View::render('front/inicioView', compact('cafeterias'));
    }

                $usuario=new User($_SESSION['id']);
                

                View::render('panelusuario/panel_usuario', compact('usuario'),4);
			
    }
       
        
     /**
     * register
     *
     *Valida los datos del usuario y lo registra en la base de datos 
     * 
     * @return bool
     * @throws Exception
     */
 public function register(){
         
   
        $postEmail = $_POST['email_re'];
        $postPassword = $_POST['pass'];
        $postPassword1 = $_POST['pass2'];
        
        $email = $postEmail;
        
        
        $validator = new Validator($_POST, [
            'email_re' => ['required', 'min:5'],
            'pass' => ['required', 'min:5','igual:pass']
            
        ]);
          
         
        if (!$validator->passes()) {

            Session::set('_old_input', $_POST);
            Session::set('_errors', $validator->getErrors());


                App::redirect('');
            
        }

            $pass = Hash::encrypt($postPassword);

            $crearUsuario = User::registrar($email, $pass);

            if ($crearUsuario){

                Session::set('Usuario_registrado', $email);
           
                    App::redirect('');

            
                
            } 
       
    }
    
    
     /**
     * Carga un nuevo usuario
     *
     * 
     * @return bool
     * @throws Exception
     */
    public function cargar() {
        
        $validator = new Validator($_POST, [
            'nombre' => ['required', 'min:3'],
            'apellido' => ['required', 'min:5'],
            'email' => ['required', 'min:6'],
            'estado' => ['required', 'numeric'],
            'rol' => ['required', 'numeric'],
            'pass' => ['required', 'min:6'],

        ]);

        if (!$validator->passes()) {

            Session::set('_old_input', $_POST);
            Session::set('_errors', $validator->getErrors());


            if ($_POST['ideditar']) {

                App::redirect('abmusuarios/editar/' . $_POST['ideditar']);
            } else {
                App::redirect('abmusuarios');
            }
        }

        if (isset($_POST['ideditar'])){

            
          $pass = Hash::encrypt($_POST['pass']);
             
          $usuario = User::update([
                        'nombre' => $_POST['nombre'],
                        'apellido' => $_POST['apellido'],
                        'email' => $_POST['email'],
                        'rol_usuario_id' => $_POST['rol'],
                        'estados_id' => $_POST['estado'],
                        'id' => $_POST['ideditar'],
                        'pass' => $pass
               
            ]);

            // Redireccionamos.
            App::redirect('abmusuarios');
            
        } else {


            $usuario = User::cargar([
                        'nombre' => $_POST['nombre'],
                        'apellido' => $_POST['apellido'],
                        'email' => $_POST['email'],
                        'rol_usuario_id' => $_POST['rol'],
                        'estados_id' => $_POST['estado'],
                        'pass' => $_POST['pass'],
               
            ]);

            App::redirect('abmusuarios');
          
            
        }
        
    }
    
    
    /**
     * obtiene id de usuario por url , inicia el objeto user con ese id y 
     * nos lleva a la pagina editar con los datos de ese usuario.
     *
     * @throws Exception
     */
     public function editar() {

        $data = Route::getUrlParameters();

        $id = $data['id'];

        // Obtenemos las cafeteria que nos piden.
        $user = new User($id);

        View::render('admin/editarusuarios', compact('user'));
    }
    
    /**
     * Eliminar una cafeteria solo cambia su estado a inactiva
     *
     * @return cafeteria
     * @throws Exception
     */
    public function eliminar(){
        
      $user = User::delete($_POST['ideliminar']);

      if($user){
           App::redirect('abmusuarios');
      }

     
    }
    
    
    
    
    
    
    /**
     * Edita el perfil de cualuier usuario registrado que no sea administrador
     *
     * 
     * @return bool
     * @throws Exception
     */
    public function EditarUsuarioRegistrado() {
        
      
        $validator = new Validator($_POST, [
            'nombre'    => ['required', 'min:3'],
            'apellido'  => ['required', 'min:5'],
            'email'     => ['required', 'min:6']

        ]);
        
       
        
        if (!$validator->passes()) {

            Session::set('_old_input', $_POST);
            Session::set('_errors', $validator->getErrors());


           
            App::redirect('panel_usuario');
            
        }
        
        $path_imagen='img/usuarios/nopicture.png';
        
        if ($_FILES) {
            
                $nombre = HandleImage::upImage($_FILES, $_POST['ideditar'], 200 ,'img/usuarios/');
                
                $path_imagen='img/usuarios/'.$nombre;
               
            }
            
             
          $usuario = User::update([
                        'nombre'         => $_POST['nombre'],
                        'apellido'       => $_POST['apellido'],
                        'email'          => $_POST['email'],
                        'id'             => $_POST['ideditar'],
                        'ubicacion_foto' => $path_imagen
               
            ]);

            // Redireccionamos.
            App::redirect('panel_usuario');
            
         
        
    }

}

