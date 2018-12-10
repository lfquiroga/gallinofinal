
<?php

use cafeterias\Storage\Session;
use cafeterias\Core\Route;

if ($evento) {

    $_old_input = get_object_vars($evento);
}


if (Session::has('_errors')) {

    $_errors = Session::once('_errors');
    $_old_input = Session::once('_old_input');
}

//$img_cafeteria = $evento->obtenerimgportada($evento->id);
?>

<div class="container" >
  
  <div id="formulariousuario" class="collapse in">

    <h1>Editar nuevo evento</h1>

    <div class="col-lg-6 col-sm-6">
      
      <form method="post" action="<?= \cafeterias\Core\App::urlTo('/eventos/cargar'); ?>"  enctype="multipart/form-data">

        <div class="form-group">
          
          <label for="nombre">Nombre </label>
          <input type="text" name="nombre" id="nombre" value="<?php
          if (isset($_old_input['nombre'])) {
              echo($_old_input['nombre']);
          }
          ?>" class="form-control"/> <p><?php
                 if (isset($_errors['nombre'][0])) {
                     echo($_errors['nombre'][0]);
                 }
          ?> </p>
          
        </div>

        <div class="form-group">
          <label for="direccion">Titulo</label>
          <input type="text" name="titulo" id="titulo" value="<?php
                 if (isset($_old_input['titulo'])) {
                     echo($_old_input['titulo']);
                 }
          ?>" class="form-control"/> <p><?php
                 if (isset($_errors['titulo'][0])) {
                     echo($_errors['titulo'][0]);
                 }
          ?> </p>
        </div>

        <div class="form-group">
          <label for="sucursal">Descripcion</label>
          
          <textarea type="text" name="descripcion" id="descripcion" class="form-control" rows="8" cols="10"><?php
              if (isset($_old_input['descripcion'])) {
                  echo($_old_input['descripcion']);
              }
              ?></textarea>
          <p><?php
              if (isset($_errors['descripcion'][0])) {
                  echo($_errors['descripcion'][0]);
              }
              ?>
          </p>
        </div>


        <div class="form-group">
          <label for="estado">Estado</label>
          
          <select id="estado" name="estado" class="form-control" style="margin-top: 20px;">

            <option value="s" >Seleccione</option>
            <option value="1" <?php
              if ($_old_input['estado'] == 1) {
                  echo 'selected';
              }
              ?>>Activo</option>
            <option value="2" <?php
              if ($_old_input['estado'] == 2) {
                  echo 'selected';
              }
              ?>>Inactivo</option>
            <option value="3" <?php
              if ($_old_input['estado'] == 3) {
                  echo 'selected';
              }
              ?>>Pendiente</option>

          </select>
          <p><?php
              if (isset($_errors['rol'][0])) {
                  echo('Debe seleccionar un estado para el usuario');
              }
              ?> </p>
        </div>



    </div>

    <div class="col-lg-6 col-sm-6">

      <div class="form-group">
        <label for="fecha_evento">Fecha evento</label>
        <input type="date"  name="fecha_evento" id="fecha_evento" value="<?php
        if (isset($_old_input['fecha_evento'])) {
            echo($_old_input['fecha_evento']);
        }
              ?>" class="form-control"/>
        <p><?php
              if (isset($_errors['fecha_evento'][0])) {
                  echo($_errors['fecha_evento'][0]);
              }
              ?> </p>

      </div>

      <div class="form-group">

        <label for="sitio">Imagen del evento </label>
        <div class="form-group">


          <p><?php
            if (isset($_errors['imagen'][0])) {
                echo($_errors['imagen'][0]);
            }
            ?> </p>
          <label>Imagen actual</label>
          <img src="<?= \cafeterias\Core\App::urlTo($_old_input['ubicacion_imagen']) ?>">
        </div>

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

<?php
if (isset($_old_input['id'])) {
    ?>

          <input type="hidden" name="ideditar" value="<?= $_old_input['id'] ?>">
<?php } else {
    ?>
          <input type="hidden" name="ideditar" value="<?= $evento->getId() ?>">
    <?php
}
?>


          <input type="submit" class="login-button btn btn-default" value="Cargar Evento" style="margin-top: 10px;"/>

    </div>
    </form>



  </div>

</div>