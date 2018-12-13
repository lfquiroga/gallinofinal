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
    
    <form method="post" action="<?= \cafeterias\Core\App::urlTo('/eventos/cargar'); ?>"  enctype="multipart/form-data">
    
      <div class="col-lg-6 col-sm-6">
     
        <div class="form-group">
          <label for="nombre">Nombre </label>
          <input type="text" name="nombre" id="nombre" value="<?php if (isset($_old_input['nombre'])) { echo($_old_input['nombre']);}?>" class="form-control"/>
          <p class="error" ><?php  if(isset($_errors['nombre'][0])){echo($_errors['nombre'][0]);}?> </p>
        </div>

        <div class="form-group">
          <label for="direccion">Titulo</label>
          <input type="text" name="titulo" id="titulo" value=" <?php if (isset($_old_input['titulo'])){echo($_old_input['titulo']);}?> " class="form-control"/>
          <p  class="error" ><?php
            if (isset($_errors['titulo'][0])) {
                echo($_errors['titulo'][0]);
            }
            ?> </p>
        </div>

        <div class="form-group">
          <label for="sucursal">Descripcion</label>
          <textarea type="text" name="descripcion" id="descripcion" class="form-control"><?php if (isset($_old_input['descripcion'])) {echo($_old_input['descripcion']);}?></textarea>
            <p  class="error" ><?php
            if (isset($_errors['descripcion'][0])) {
                echo($_errors['descripcion'][0]);
            }
            ?>
          </p>
        </div>


        <div class="form-group">
          <label for="estado">Estado</label>
          <select id="estado" name="estado" class="form-control">
            <option value="s">Seleccione</option>
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
            <option value="3">Pendiente</option>
          </select>
          <p  class="error" ><?php
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
            echo($_old_input['fecha']);
        }
        ?>" class="form-control"/>
        <p class="error" ><?php
            if (isset($_errors['fecha_evento'][0])) {
                echo($_errors['fecha_evento'][0]);
            }
            ?> </p>

      </div>

      <div class="form-group">

        <label for="sitio">Imagen de Perfil </label>
        <input type="file" name="imagen" id="imagen" value="<?php
            if (isset($_old_input['imagen'])) {
                echo($_old_input['imagen']);
            }
            ?>" class="form-control" />
        <p  class="error" ><?php
            if (isset($_errors['imagen'][0])) {
                echo($_errors['imagen'][0]);
            }
            ?> </p>
      </div>
      <br/>
      <input type="submit" class="login-button btn btn-default boton" value="Cargar Evento"/>

    </div>
    
   </form>


  </div>
   
   <div class="col-lg-12 col-md-6">
     
    <h2>Eventos cargados en el sistema</h2>

    <table id="eventostabla" class="display" style="width:100%">
      <thead>
        <tr>
          <th>Nombre</th> 
          <th>Titulo</th> 
          <th>Descripcion</th> 
          <th>Fecha</th> 
          <th>Estado</th>          
          <th>Editar</th> 
          <th>Eliminar</th> 
        </tr>
      </thead>
      <tbody>
        
<?php

if($eventos){
    
foreach ($eventos as $row) {
    
    if ($row->estado != 2) {
        
        echo("<tr>");

        if (isset($row->nombre)) {
            echo('<td>' . $row->nombre . '</td>');
        } else {
            echo('<td> - </td>');
        }

        if (isset($row->titulo)) {
            echo('<td>' . $row->titulo. '</td>');
        } else {
            echo('<td> - </td>');
        }

        if (isset($row->descripcion)) {
            echo('<td>' . substr($row->descripcion , 0, 70). '....</td>');
        } else {
            echo('<td> - </td>');
        }

        if (isset($row->fecha_evento)) {
            echo('<td>' . $row->fecha_evento . '</td>');
        } else {
            echo('<td> - </td>');
        }

        if (isset($row->estado)) {
            echo('<td>' . $row->estado . '</td>');
        } else {
            echo('<td> - </td>');
        }

        echo("<td><a href='crearevento/" . $row->id . "'  class='login-button btn btn-default boton2'>EDITAR</a></td>");
        
        echo("<td><input type='button' value ='Eliminar' class='eliminar boton' id='$row->id' ></td>");

        echo("</tr>");
        }
    }
}
?>

      </tbody>

    </table>

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

        <form action="<?= \cafeterias\Core\App::urlTo('crearevento/eliminar'); ?>" method="POST" accept-charset="utf-8" id="registrousuario">

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

      $('#eventostabla').DataTable();


      $(".eliminar").click(function () {

        $('#eliminar').modal('show');
        $('#id_eliminar').val(this.id);

      });

      $("#cancelar").click(function () {

        $('#eliminar').modal('hide');

      });


  </script>




</div>
