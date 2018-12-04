<?php
use cafeterias\Storage\Session;
use cafeterias\Core\Route;


if (Session::has('_errors')) {
    $_errors = Session::once('_errors');
    $_old_input = Session::once('_old_input');
}

if (Session::has('login')) {
    $_errors_login = Session::once('login');
}

?>

<div class="container" >
  
  <form method="post" action="auth/login">
    <h3>Iniciar Sesion</h3>
    <input type="text" class="form-control" name="email" placeholder="Email" value="<?php if (isset($_old_input['email'])) {
      echo($_old_input['email']);
  } ?>">
    
    <p><?php if (isset($_errors['email'][0])) {
      echo($_errors['email'][0]);
  } ?> </p>
     
    <input type="password" class="form-control" name="password" placeholder="Contrase&ntilde;a">
     <p><?php if (isset($_errors['password'][0])) {
      echo($_errors['password'][0]);
  } ?> </p>
     
     
     <br/>
     <br/>
         <p><?php if (isset($_errors_login)) {
      echo($_errors_login);
  } ?> </p>
    <div class="boxbtnvmas"><input type="submit" value="Ingresar" /></div>
  </form>

  <div>
    
    
    <script>
            
    $(document).ready(function (){
        $('#userMenu').css('display' , 'none');
    });
    
    </script>
        