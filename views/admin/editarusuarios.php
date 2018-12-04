<?php


use cafeterias\Storage\Session;
use cafeterias\Core\Route;



if($user){
    
$_old_input=get_object_vars($user);

}

if(Session::has('_errors')) {
	$_errors = Session::once('_errors');
	$_old_input = Session::once('_old_input');
        
}   



?>

<div class="container" >
 
<div class=" containertiposcargados">
  


    <h1>Editar un  usuario</h1>
    <form method="post" action="<?= \cafeterias\Core\App::urlTo('abmusuarios/editar/update');?>"  enctype="multipart/form-data">

      <div class="form-group">
        <label for="nombre">Nombre </label>
        <input type="text" name="nombre" id="nombre" value="<?php if(isset($_old_input['nombre'])){echo($_old_input['nombre']);} ?>" class="form-control"/>
        <p><?php if(isset($_errors['nombre'][0])){echo($_errors['nombre'][0]);}  ?> </p>
      </div>

      <div class="form-group">
        <label for="direccion">Apellido</label>
        <input type="text" name="apellido" id="apellido" value="<?php if(isset($_old_input['apellido'])){echo($_old_input['apellido']);} ?>" class="form-control"/>
        <p><?php if(isset($_errors['apellido'][0])){echo($_errors['apellido'][0]);}  ?> </p>
      </div>
      
      <div class="form-group">
        <label for="sucursal">Email</label>
        <input type="text" name="email" id="email" value="<?php if(isset($_old_input['email'])){echo($_old_input['email']);} ?>" class="form-control"/>
         <p><?php if(isset($_errors['email'][0])){echo($_errors['email'][0]);}  ?> </p>
      </div>
      
        <div class="form-group">
        <label for="pass">Password</label>
        <input type="text" name="pass" id="pass" value="<?php if(isset($_old_input['pass'])){echo($_old_input['pass']);} ?>" class="form-control"/>
         <p><?php if(isset($_errors['pass'][0])){echo($_errors['pass'][0]);}  ?> </p>
      </div>
      
      <div class="form-group">
        <label for="estado">Estado</label>
        <select id="estado" name="estado" class="form-control">
          <option value="s">Seleccione</option>
          <option value="1">Activo</option>
          <option value="2">Inactivo</option>
          <option value="3">Pendiente</option>
        </select>
      </div>
      
      <div class="form-group">
        <label for="rol">Rol usuario</label>
        <select id="rol" name="rol" class="form-control">
          <option value="s">Seleccione</option>
          <option value="1">Admin</option>
          <option value="2">Cafeteria</option>
          <option value="3">Editor</option>
          <option value="3">Registrado</option>
        </select>
      </div>

     
      

    <input type="hidden" name="ideditar" value="<?= $_old_input['id'] ?>">

      <input type="submit" class="login-button btn btn-default" value="Cargar Usuario"/>

    </form>
  </div>
  
  
 
  
  

</div>
