<?php

namespace cafeterias\Controllers;

use cafeterias\Exceptions\InvalidLoginException;
use cafeterias\Models\User;
use cafeterias\core\Hash;
use cafeterias\Storage\Session;
use cafeterias\Auth\Auth;
use cafeterias\Auth\Authenticate;
use cafeterias\Validation\Validator;
use cafeterias\Core\Route;
use cafeterias\Core\App;
use cafeterias\Core\View;
use cafeterias\Core\Request;

class AuthController {

    public function login(){

        $email = $_POST['email'];
        $postPassword = $_POST['password'];


        $validator = new Validator($_POST, [
            'email' => ['required', 'min:5'],
            'password' => ['required', 'min:5']
            
        ]);
        
     
        

        if (!$validator->passes()) {

            Session::set('_old_input', $_POST);
            Session::set('_errors', $validator->getErrors());


                App::redirect('');
            
        }
        
        $checkUsuario = User::getByEmail($email);

        if ($checkUsuario) {

            $passwordUnHash = $postPassword;
            $passwordHashed = $checkUsuario->password;
            
            $checker = Hash::VerifyHash($passwordUnHash, $passwordHashed);

            if ($checker === true) {
                
                Session::set('Usuario', $checkUsuario->getEmail());
                Session::set('Rol', $checkUsuario->getRolUsuarioId());
                Session::set('id', $checkUsuario->getIdUser());
   
                if($checkUsuario->getRolUsuarioId() == 3 || $checkUsuario->getRolUsuarioId() == 4){
                 
                    App::redirect('panel_usuario');
                    
                }else if($checkUsuario->getRolUsuarioId() == 1){
                    
                    App::redirect('abmusuarios');
                    
                }


            }else{
                   
          $error['nocoincide']='El password no es correcto';
          Session::set('_errors', $error);
          Session::set('_old_input', $_POST);
          App::redirect('');
          
            }
        } else{
            
          $error['nousuario']='El usuario no existe';
          Session::set('_errors', $error);
          Session::set('_old_input', $_POST);
          App::redirect('');
        }
    }

  

    public function logout() {
        
       Session::remove('Usuario');
       Session::destroy();
        
       App::redirect('');
 
    }
    

}
