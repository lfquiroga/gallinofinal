<?php

use cafeterias\Storage\Session;
use cafeterias\Core\Route;


if (isset($data['evento'])) {
    
    $evento = $data['evento'];
}

if (isset($data['asiste'])) {
    $asiste = $data['asiste'];
} else {
    $asiste = false;
}

?>

<div class="container">

  <div class="row">

    <h1><?php echo $evento->getNombre() ?></h1><br/>
  <?php

        if (Session::has('id')) {
            
            if($asiste != true){
            ?>
              <input type="button" value="Asistire al evento" id="<?= Session::get('id').'-'. $evento->getid() .'- 1'?>" class="asistir"> 
    <br/><br/>
        <?php
            }else{         
?>

              <input type="button" value="No asistir al evento" id="<?= Session::get('id').'-'. $evento->getid() .'- 0'?>" class="asistir"> 

    <br/><br/>
                <?php
            } 
            
            }else{                    
        ?>
         <p>Registrate para poder anotarte en el evento.</p>
        <?php
        }
        ?>
    <p>Fecha: <?php echo $evento->getFecha_evento() ?></p>

    <section class="" >

      <div class="row">

        <div class="col-lg-6 col-md-6 event_col_50">

          <h2><?php echo $evento->gettitulo() ?></h2><br/><br/>
          <p> <?php echo nl2br($evento->getdescripcion()) ?></p>

        </div>

        <div class="col-lg-6 col-md-6 cafe_col_50">

          <div class="evento">

            <img class="img-responsive" src="<?= \cafeterias\Core\App::urlTo($evento->getUbicacion_imagen()) ?>">

          </div>

        </div>

    </section>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="mainmodallogin">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="mainTitleModal">Ingresa ahora</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="row"> 
          <div class="col-xs-12 col-md-6">
            <form method="post" action="<?= \cafeterias\Core\App::urlTo('auth/login') ?>" >
              <h3>Iniciar Sesion</h3>
              <input type="text" class="form-control" name="email" placeholder="Email" value="<?php if (isset($_old_input['email'])) {
            echo($_old_input['email']);
        } ?>">
              <input type="password" class="form-control" name="password" placeholder="Password">
              <div class="boxbtnvmas"><input type="submit" value="Ingresar" /></div>

                <?php if (isset($_errors['nocoincide'])) {
                    echo('<p>' . $_errors['nocoincide'] . '</p>');
                }
                
                if (isset($_errors['nousuario'])) {
                  echo('<p>' . $_errors['nousuario'] . '</p>');
              }
              ?> 

            </form>	

          </div>			
          <div class="col-xs-12 col-md-6">

            <form method="POST" accept-charset="utf-8" action="<?= \cafeterias\Core\App::urlTo('/register') ?>" id="registrousuario">
              <h3>Registro</h3>

              <label for="email">email</label>
              <input type="text" id="email_re" name="email_re" class="form-control" placeholder="Email" value="
              <?php
              if (isset($_old_input['email_re'])) {
                  echo($_old_input['email_re']);
              }
              ?>" required  />

              <?php
              if (isset($_errors['email_re'][0])) {

                  echo('<p>' . $_errors['email_re'][0] . '</p>');
              }
              ?> 

              <label for="pass">password</label>
              <input type="password" id="pass" name="pass" name="pass" type="password" class="form-control" placeholder="Contrase&ntilde;a" required />
              <label for="pass2">Password repetir</label>
              <input type="password" id="pass2" name="pass2" class="form-control" placeholder="Repetir contrase&ntilde;a" required />

              <?php
              if (isset($_errors['pass'][0])) {

                  echo('<p>Los passwords  no coinciden</p>');
              }
              ?> 
              <div class="boxbtnvmas">

                <input type="submit" value="Registrarse" id="registro_usuario" />

              </div>
            </form>
            <?php
            if (Session::has('Usuario_registrado')) {
                $usuario = Session::once('Usuario_registrado');

                echo("<p>Bienvenido $usuario tu registro ha sido exitoso . ya puedes iniciar sesion.</p>");
            }
            ?>
          <!-- <div class="boxbtnvmas"><a class="vermasbutton" href="#">Registrarse <i class="fawincon fa fa-angle-right" aria-hidden="true"></i></a></div> -->
          </div>
        </div>

      </div>
    </div>
  </div>
</div>



<script>


    /**
     * Asistir al evento
     */
    $(".asistir").click(function () {

      var id_user = this.id.split('-')[0];
      
      var id_evento = this.id.split('-')[1];
      
        var asiste = this.id.split('-')[2];

        url_location=location.pathname;
          
        url_cortada= url_location.split("/");
          
        url='/'+url_cortada[1]+'/'+url_cortada[2];

      data2 = {
        'id_user'   : id_user,
        'id_evento' :id_evento,
        'asiste'    :asiste
        
      };
      
      $.ajax({
        data: data2,
        url: url+'/asistirevento',
        type: 'post',
        success: function (response) {
            
        location.reload()
         
        }

      });

    });


    $("#login").click(function () {

      $('#mainmodallogin').modal('show');

    });


    if ($('#mensaje').val() == 1 || $('#mensaje').val() == 2) {

      $('#mainmodallogin').modal('show');

    }
</script>