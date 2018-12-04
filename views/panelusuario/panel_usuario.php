<?php

use cafeterias\Storage\Session;
use cafeterias\Core\Route;

$data = Route::getUrlParameters();

if (Session::has('_errors')) {
    $_errors = Session::once('_errors');
    $_old_input = Session::once('_old_input');
}

?>
<div class="container" >

  <div class="col-sm-12 col-md-12 col-lg-12 ">

    <h1>Bienvenido <?= $usuario->getEmail() ?></h1>

    <p>Desde esta seccion podras modificar tus datos que otros usuarios podran ver.</p>

    <h2>Modificar mis datos</h2>

  </div>
  <form method="post" action="<?= \cafeterias\Core\App::urlTo('/abmusuarios/update_registrado'); ?>"  enctype="multipart/form-data">
    <div class="col-sm-6 col-md-6 col-lg-6 misdatos">



      <div class="form-group">
        <label for="nombre">Nombre </label>
        <input type="text" name="nombre" id="nombre" value="<?php
            if (isset($_old_input['nombre'])) {

                echo($_old_input['nombre']);
            } else if ($usuario->getNombre()) {

                echo($usuario->getNombre());
            }
            ?>" class="form-control"/>
        
        <p><?php
               if (isset($_errors['nombre'][0])) {
                   echo($_errors['nombre'][0]);
               }
               ?> </p>
      </div>

      <div class="form-group">
        <label for="direccion">Apellido</label>
        <input type="text" name="apellido" id="apellido" value="<?php
        if (isset($_old_input['apellido'])) {

            echo($_old_input['apellido']);
        } else if ($usuario->getApellido()) {

            echo($usuario->getApellido());
        }
        ?>" class="form-control"/>
        <p><?php
            if (isset($_errors['apellido'][0])) {
                echo($_errors['apellido'][0]);
            }
            ?> </p>
      </div>

      <div class="form-group">
        <label for="sucursal">Email</label>
        <input type="text" name="email" id="email" value="<?php
        if (isset($_old_input['email'])) {

            echo($_old_input['email']);
        } else if ($usuario->getEmail()) {

            echo($usuario->getEmail());
        }
        ?>" class="form-control"/>
        <p><?php
            if (isset($_errors['email'][0])) {
                echo($_errors['email'][0]);
            }
        ?> </p> 

        <div class="form-group">

          <label for="sitio">Imagen de Perfil </label>
          <input type="file" name="imagen" id="imagen" value="<?php
            if (isset($_old_input['imagen'])) {
                echo($_old_input['imagen']);
            }
        ?>" class="form-control" />
          <p><?php
              if (isset($_errors['imagen'][0])) {
                  echo($_errors['imagen'][0]);
              }
        ?> </p>


        </div>

      </div>


      <input type="submit" class="login-button btn btn-default" value="Modificar Datos "/>

      <input type="hidden" name="ideditar" value="<?= $usuario->getIdUser() ?>" />

      <input type="hidden" name="urldevolver" value="panel_usuario" />


    </div>
  </form>
  
  <div class="col-sm-6 col-md-6 col-lg-6 misdatos">

    <p>Foto de perfil actual</p>

  <img src="<?= \cafeterias\Core\App::urlTo('/' . $usuario->getFoto()); ?>" alt="Foto de usuario">


  </div>



</div>