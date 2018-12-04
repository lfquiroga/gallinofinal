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

  <div class=" containertiposcargados">

    <h2>Cafeterias cargadas en el sistema</h2>

    <table id="cafeteriastabla" class="display" style="width:100%">
      <thead>
        <tr>
          <th>Nombre</th> 
          <th>Direccion</th> 
          <th>Telefono</th> 
          <th>Email</th> 
          <th>Sitio web</th> 
          <th>Sucursal</th> 
          <th>Estado</th> 
          <th>Editar</th> 
          <th>Eliminar</th> 
        </tr>
      </thead>
      <tbody>
<?php
foreach ($cafeterias as $row) {
    if ($row->id_estado != 2) {
        echo("<tr>");

        if (isset($row->nombre)) {
            echo('<td>' . $row->nombre . '</td>');
        } else {
            echo('<td> - </td>');
        }

        if (isset($row->direccion)) {
            echo('<td>' . $row->direccion . '</td>');
        } else {
            echo('<td> - </td>');
        }

        if (isset($row->telefono)) {
            echo('<td>' . $row->telefono . '</td>');
        } else {
            echo('<td> - </td>');
        }

        if (isset($row->email)) {
            echo('<td>' . $row->email . '</td>');
        } else {
            echo('<td> - </td>');
        }

        if (isset($row->sitioweb)) {
            echo('<td>' . $row->sitioweb . '</td>');
        } else {
            echo('<td> - </td>');
        }

        if (isset($row->sucursal)) {
            echo('<td>' . $row->sucursal . '</td>');
        } else {
            echo('<td> - </td>');
        }

        if (isset($row->id_estado)) {
            echo('<td>' . $row->id_estado . '</td>');
        } else {
            echo('<td> - </td>');
        }
        echo("<td><a href='abmcafeterias/editar/" . $row->id . "'>EDITAR</a></td>");
        echo("<td><input type='button' value ='Eliminar' class='eliminar' id='$row->id' ></td>");

        echo("</tr>");
    }
}
?>

      </tbody>

    </table>

  </div>


  <a class="btn btn-primary" data-toggle="collapse" href="#formulariocerveza" role="button" aria-expanded="false" aria-controls="collapseExample">
    INGRESAR UNA NUEVA CAFETERIA
  </a>


  <div id="formulariocerveza" class="<?php
          if (isset($_errors) || isset($ideditar)) {

              echo('collapse in');
          } else {
              echo('collapse ');
          }
?>">

    <h1>Cargar una nueva CAFETERIA </h1>
    <form method="post" action="abmcafeterias/cargar"  enctype="multipart/form-data">

      <div class="form-group">
        <label for="nombre">Nombre comercial</label>
        <input type="text" name="nombre" id="nombre" value="<?php if (isset($_old_input['nombre'])) {
      echo($_old_input['nombre']);
  } ?>" class="form-control"/>
        <p><?php if (isset($_errors['nombre'][0])) {
      echo($_errors['nombre'][0]);
  } ?> </p>
      </div>

      <div class="form-group">
        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" id="direccion" value="<?php if (isset($_old_input['direccion'])) {
      echo($_old_input['direccion']);
  } ?>" class="form-control"/>
        <p><?php if (isset($_errors['direccion'][0])) {
      echo($_errors['direccion'][0]);
  } ?> </p>
      </div>

      <div class="form-group">
        <label for="sucursal">Sucursal</label>
        <input type="text" name="sucursal" id="direccion" value="<?php if (isset($_old_input['sucursal'])) {
      echo($_old_input['sucursal']);
  } ?>" class="form-control"/>
        <p><?php if (isset($_errors['sucursal'][0])) {
      echo($_errors['sucursal'][0]);
  } ?> </p>
      </div>

      <div class="form-group">
        <label for="telefono">Telefono</label>
        <input type="tel" name="telefono" id="telefono" value="<?php if (isset($_old_input['telefono'])) {
      echo($_old_input['telefono']);
  } ?>" class="form-control"/>
        <p><?php if (isset($_errors['telefono'][0])) {
      echo($_errors['telefono'][0]);
  } ?> </p>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?php if (isset($_old_input['email'])) {
      echo($_old_input['email']);
  } ?>" class="form-control"/>
        <p><?php if (isset($_errors['email'][0])) {
      echo($_errors['email'][0]);
  } ?> </p>
      </div>

      <div class="form-group">
        <label for="sitio">Sitio web</label>
        <input type="text" name="sitio" id="sitio" value="<?php if (isset($_old_input['email'])) {
      echo($_old_input['email']);
  } ?>" class="form-control" />
        <p><?php if (isset($_errors['sitio'][0])) {
      echo($_errors['sitio'][0]);
  } ?> </p>
      </div>

      <div class="form-group">
        <label for="sitio">Imagen Portada</label>
        <input type="file" name="imagen" id="imagen" value="<?php if (isset($_old_input['imagen'])) {
      echo($_old_input['imagen']);
  } ?>" class="form-control" />
        <p><?php if (isset($_errors['imagen'][0])) {
      echo($_errors['imagen'][0]);
  } ?> </p>
      </div>

    <!--  <input type="hidden" name="ideditar" value="<?= $ideditar ?>">-->

      <input type="submit" class="login-button btn btn-default" value="Cargar Cafeteria"/>

    </form>
  </div>


</div>


<!-- Modal -->
<div class="modal fade" id="eliminar">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="mainTitleModal">Eliminar cafeteria</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="<?= \cafeterias\Core\App::urlTo('abmcafeterias/eliminar'); ?>" method="POST" accept-charset="utf-8" id="registrousuario">

          <p>¿Desea eliminar esta cafeteria?</p>

          <input type="hidden" name="ideliminar" id="id_eliminar" value="">

          <input type="button" value="Cancelar" id="cancelar" class="regbutton" />
          <input type="submit" value="Aceptar" id="aceptar" class="regbutton" />


        </form>
      </div>
    </div>

  </div>
</div>

<script>
    $('#cafeteriastabla').DataTable();
    
    $(document).ready(function () {



      $(".eliminar").click(function () {

        $('#eliminar').modal('show');
        $('#id_eliminar').val(this.id);

      });

      $("#cancelar").click(function () {

        $('#eliminar').modal('hide');

      });





    })
</script>