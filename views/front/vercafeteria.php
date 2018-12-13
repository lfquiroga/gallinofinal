<?php

use cafeterias\Storage\Session;
use cafeterias\Core\Route;

if (isset($data['cafeteria'])) {
    $cafeteria = $data['cafeteria'];
}
if (isset($data['comentarios'])) {
    $comentarios = $data['comentarios'];
} else {
    $comentarios = null;
}
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 detailcafe">
      <div class="container">
        <div>
          <h1><?php echo $cafeteria->getNombre() ?></h1>
          <p>Zona: <?php echo $cafeteria->getSucursal() ?></p>
          <p>Categoria: Especialidad</p>
          <p>Calificaci&oacute;n: <img src="../img/stars5.png" alt="" /></p>
        </div>
        <div></div>
        <div class="horarios">
          <p>Lunes a viernes de 9:00 a 20:00</p>
          <p>Sabados de 10:00 a 18:00</p>
          <p>Domingos: cerrado</p>
        </div>
      </div>
    </div>



    <section class="mainwrapperC" >
      <div class="infoCafe">

        <div class="col-lg-6 col-md-6 cafe_col_50">

          <div class="detalleResumenC">
            
            <img src="../img/especificaciones.jpg" alt="" /><br/><br/>
            <p> <?php echo nl2br($cafeteria->getdescripcion())?></p>
            
          </div>

        </div>
        <div class="col-lg-6 col-md-6 cafe_col_50">
          
          <div class="mapa">

            <img class="img-responsive" src="<?= \cafeterias\Core\App::urlTo($cafeteria->obtenerimgportada($cafeteria->getId())) ?>">

          </div>

        </div>

      </div>
      

        
      <div id="comentario_<?= $cafeteria->getId() ?>" class="col-lg-12 collapse in comentarios_seccion">
 
        <?php
        
        if (Session::has('id')){
                      
            ?>
            
            <form class="dejar_comentario" method="POST" action="">
                
                <label for="nombre">Dejar un nuevo Comentario</label>

                <textarea name="comentario" id="<?= $cafeteria->getId()?>" class="form-control" rows="4" cols="50"> </textarea>  

                <input type="button" id="<?= $cafeteria->getId() ?>" class="comentar boton" value="Dejar comentario">
                
            </form> 
         
            <?php
            
              }
              
            ?>
            <?php
            
            if($comentarios){
                
            echo('<h3>Comentarios</h3>');
            
            foreach ($comentarios as $row) {
           
                ?>
        <div class="comment-box">
                    <div class="media-left">
                        <a href="#">
                          
                           <img class="media-object" src="<?= \cafeterias\Core\App::urlTo( $row["ubicacion_foto"]) ?>" alt="Foto de usuario">

                        </a>
                    </div>

                    <div class="media-body">
                     <h4 class="media-heading"><?= $row['usuario'] .' - '.$row['fecha']?></h4>
                     <?= $row['comentario']?>
                    </div>
          </div>
               

            <?php
            }}else{
            ?>
        
                    <div class="media-body">
                     <h4 class="media-heading">Todavia no hay comentarios , puedes dejar el primero</h4>                     
                    </div>
               
            
            <?php
                
            }
            
           ?>
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
              <input type="text" class="form-control" name="email" placeholder="Email" value="<?php if (isset($_old_input['email'])) {  echo($_old_input['email']);} ?>">
              <input type="password" class="form-control" name="password" placeholder="Password">
              <div class="boxbtnvmas"><input type="submit" value="Ingresar" /></div>
              
              <?php if (isset($_errors['nocoincide'])) {
                    echo('<p>'.$_errors['nocoincide'].'</p>'); } ?> 
              
              <?php if (isset($_errors['nousuario'])) {
                    echo('<p>'.$_errors['nousuario'].'</p>'); } ?> 
              
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
              } ?>" required  />
            
            <?php 
            
            if (isset($_errors['email_re'][0])) {
            
                echo('<p>'.$_errors['email_re'][0].'</p>'); 
                
            } ?> 
              
              <label for="pass">password</label>
              <input type="password" id="pass" name="pass" name="pass" type="password" class="form-control" placeholder="Contrase&ntilde;a" required />
              <label for="pass2">Password repetir</label>
              <input type="password" id="pass2" name="pass2" class="form-control" placeholder="Repetir contrase&ntilde;a" required />
              
            <?php if (isset($_errors['pass'][0])) {
                      
                echo('<p>Los passwords  no coinciden</p>'); }
            
            ?> 
              <div class="boxbtnvmas">

                <input type="submit" value="Registrarse" id="registro_usuario" />

              </div>
            </form>
            <?php
            if(Session::has('Usuario_registrado')){
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

$(".btncomentarios").click(function (){
  
  var id=this.id.split('_')[1];
  
    url=location.pathname;
    
   data = {
            'id': id
          };
          
         $.ajax({
            data: data,
            url: url+'/actualizarcomentario',
            type: 'post', 
            success: function (response) {

               if (response.indexOf("ERROR") == -1) {  
                   
                   $('.btncomentarios span').css('display', 'none');
                   
               }
            }
            
          });
    
});

$(".comentar").click(function (){

        var id=this.id;
        
        var comentario=$('#'+id).val();
        
        var cafeteria_id=id;
        
          data = {
            'id': cafeteria_id,
            'comentario': comentario
          };
          
          url_location=location.pathname;
          
          url_cortada= url_location.split("/");
          
         url='/'+url_cortada[1]+'/'+url_cortada[2]+'/favoritos/dejarcomentario';
        
         $.ajax({
            data: data,
            url: url,
            type: 'post', 
            success: function (response) {

               if (response.indexOf("ERROR") == -1) {  
                   
                   alert('Tu comentario fue agregado correctamente');
                                 
                   location.reload();
                   
               }else{
                   
                   alert('No se pudo agregar');
                   
               }
            }
            
          });

    });
    
    
      $("#login").click(function (){

      $('#mainmodallogin').modal('show');

    });
      

    if($('#mensaje').val() == 1 || $('#mensaje').val() == 2){

        $('#mainmodallogin').modal('show');

    }
</script>