<?php

use cafeterias\Storage\Session;
use cafeterias\Core\Route;

if (Session::has('_errors')) {

    $_errors = Session::once('_errors');
    $_old_input = Session::once('_old_input');
}
?>

<div class="container" >

  <div class=" containertiposcargados">

    <h2>Eventos cargados en el sistema</h2>



  </div>


  <a class="btn btn-primary" data-toggle="collapse" href="#formulariousuario" role="button" aria-expanded="false" aria-controls="collapseExample">
    INGRESAR UNA NUEVO EVENTO
  </a>


  <div id="formulariousuario" class="<?php
if (isset($_errors) || isset($ideditar)) {

    echo('collapse in');
} else {
    echo('collapse ');
}
?>">

    <h1>Cargar nuevo evento</h1>

    <div class="col-lg-6 col-sm-6">
      <form method="post" action="<?= \cafeterias\Core\App::urlTo('/eventos/cargar'); ?>"  enctype="multipart/form-data">

        <div class="form-group">
          <label for="nombre">Nombre </label>
          <input type="text" name="nombre" id="nombre" value="<?php if (isset($_old_input['nombre'])) {
      echo($_old_input['nombre']);
  } ?>" class="form-control"/>
          <p><?php if (isset($_errors['nombre'][0])) {
      echo($_errors['nombre'][0]);
  } ?> </p>
        </div>

        <div class="form-group">
          <label for="direccion">Titulo</label>
          <input type="text" name="titulo" id="titulo" value="<?php if (isset($_old_input['titulo'])) {
      echo($_old_input['titulo']);
  } ?>" class="form-control"/>
          <p><?php if (isset($_errors['titulo'][0])) {
      echo($_errors['titulo'][0]);
  } ?> </p>
        </div>

        <div class="form-group">
          <label for="sucursal">Descripcion</label>
          <textarea type="text" name="descripcion" id="descripcion" class="form-control">
<?php if (isset($_old_input['descripcion'])) {
    echo($_old_input['descripcion']);
} ?>
          </textarea>
          <p><?php if (isset($_errors['descripcion'][0])) {
    echo($_errors['descripcion'][0]);
} ?> </p>
        </div>


        <div class="form-group">
          <label for="estado">Estado</label>
          <select id="estado" name="estado" class="form-control">
            <option value="s">Seleccione</option>
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
            <option value="3">Pendiente</option>
          </select>
          <p><?php if (isset($_errors['rol'][0])) {
            echo('Debe seleccionar un estado para el usuario');
        } ?> </p>
        </div>
        
        

    </div>

    <div class="col-lg-6 col-sm-6">
      
      <div class="form-group">
          <label for="fecha_evento">Fecha evento</label>
          <input type="date"  name="fecha_evento" id="fecha_evento" value="<?php if (isset($_old_input['fecha_evento'])) {
                echo($_old_input['fecha']);
            } ?>" class="form-control"/>
                    <p><?php if (isset($_errors['fecha_evento'][0])) {
                echo($_errors['fecha_evento'][0]);
            } ?> </p>
         
        </div>
      
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
        <br/>
      <input type="submit" class="login-button btn btn-default" value="Cargar Evento"/>
      
    </div>
    </form>



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
