<?php


use cafeterias\Storage\Session;
use cafeterias\Core\Route;



if(Session::has('_errors')){
    
	$_errors = Session::once('_errors');
	$_old_input = Session::once('_old_input');
        
}

?>

<div class="container" >
 
<div class=" containertiposcargados">
  
    <h2>Usuarios cargados en el sistema</h2>

    <table id="usuariostabla" class="display" style="width:100%">
      <thead>
        <tr>
          <th>Nombre</th> 
          <th>Apellido</th> 
          <th>Email</th> 
          <th>Estado</th> 
          <th>Rol usuario</th> 
          <th>Editar</th> 
          <th>Eliminar</th> 

        </tr>
      </thead>
      <tbody>
<?php

foreach ($usuarios as $row) {
if($row->estados_id != 2){
    echo("<tr>");
    
   if(isset($row->nombre)){
        echo('<td>'.$row->nombre.'</td>'); 
    }else{
        echo('<td> - </td>');
    }
    
    if(isset($row->apellido)){
        echo('<td>'.$row->apellido.'</td>'); 
    }else{
        echo('<td> - </td>');
    }
    
    if(isset($row->email)){
        echo('<td>'.$row->email.'</td>'); 
    }else{
        echo('<td> - </td>');
    }
    
    if(isset($row->estados_id)){
        echo('<td>'.$row->estados_id.'</td>'); 
    }else{
        echo('<td> - </td>');
    }
    
    if(isset($row->rol_usuario_id)){
        echo('<td>'.$row->rol_usuario_id.'</td>'); 
    }else{
        echo('<td> - </td>');
    }
    
   
   
    echo("<td><a href='abmusuarios/editar/".$row->id."'>EDITAR</a></td>");
    echo("<td><input type='button' value ='Eliminar' class='eliminar' id='$row->id' ></td>");

    echo("</tr>");
}

    }
?>

      </tbody>

    </table>

  </div>
  

  <a class="btn btn-primary" data-toggle="collapse" href="#formulariousuario" role="button" aria-expanded="false" aria-controls="collapseExample">
    INGRESAR UNA NUEVO USUARIO
  </a>

  
  <div id="formulariousuario" class="<?php if (isset($_errors) || isset($ideditar)){

    echo('collapse in');
} else {
    echo('collapse ');
}
?>">

    <h1>Cargar nuevo  usuario</h1>
    <form method="post" action="<?= \cafeterias\Core\App::urlTo('abmusuarios/cargar') ?>"  enctype="multipart/form-data">

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
        <label for="sucursal">Password</label>
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
         <p><?php if(isset($_errors['rol'][0])){echo('Debe seleccionar un estado para el usuario');}  ?> </p>
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
         <p><?php if(isset($_errors['rol'][0])){echo('Debe seleccionar un rol para el usuario');}  ?> </p>
      </div>

     

      <input type="submit" class="login-button btn btn-default" value="Cargar Usuario"/>

    </form>
  </div>
    
    <!-- Modal -->
<div class="modal fade" id="eliminar">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="mainTitleModal">Eliminar usuario</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="<?= \cafeterias\Core\App::urlTo('abmusuarios/eliminar'); ?>" method="POST" accept-charset="utf-8" id="registrousuario">

          <p>¿Desea eliminar este usuario?</p>

          <input type="hidden" name="ideliminar" id="id_eliminar" value="">

          <input type="button" value="Cancelar" id="cancelar" class="regbutton" />
          <input type="submit" value="Aceptar" id="aceptar" class="regbutton" />


        </form>
      </div>
    </div>

  </div>
</div>
  
  <script>
  
   $('#usuariostabla').DataTable();
   
   
      $(".eliminar").click(function () {

        $('#eliminar').modal('show');
        $('#id_eliminar').val(this.id);

      });

      $("#cancelar").click(function () {

        $('#eliminar').modal('hide');

      });

   
 </script>
 
  
  

</div>
