
<?php

use cafeterias\Storage\Session;
use cafeterias\Core\Route;


$favoritas='';

$cafeterias = $data['cafeterias']; 

    if(isset($data['favoritas'])){
        
        $favoritas=$data['favoritas'];
        
    }
    
    if(isset($data['eventos'])){
        
        $eventos=$data['eventos'];
        
    }else{
    
        $eventos = '';
    }
    
if (Session::has('_errors')){
    
    $_errors = Session::once('_errors');
    $_old_input = Session::once('_old_input');
    
    echo('<input type="hidden" value="1" name="mensaje" id="mensaje" >');
}

?>


<div class="row">
  <div class="col-md-12 bloqsearch">
    <div class="container frmsearch">
      <h1>Descubr&iacute; las mejores cafeter&iacute;as de Buenos Aires</h1>
      <form class="" action="busqueda.php" method="post" target="_self">
        <div class="col-sm-4">
          <input type="text" name="buscador" class="form-control heightsearch" placeholder="Buscar por nombre o palabra clave">
        </div>
        <div class="col-sm-4">		
          <select class="form-control heightsearch" name="opcion">
            <option>Filtrar por zona</option>
            <option>Belgrano</option>
            <option>Palermo</option>
            <option>Balvanera</option>
            <option>Colegiales</option>
            <option value="1" >Caballito</option>
            <option>Recoleta</option>
          </select>
        </div>
        <div class="col-sm-4">
          <button id="search-input" type="submit" class="searchbarbutton heightsearch">Buscar<i class="iconsearchbar fa fa-search" aria-hidden="true"></i></button><div class="clear"></div>
        </div>		
      </form>
    </div>
  </div>

</div>


<div class="container">
  <?php
    $contador = 1;
  foreach ($cafeterias as $datos) {
      
 $imagen=$datos->ObtenerImgportada($datos->getId());
 
      ?>
      <div class="row cardRanking_todas col-lg-4">
        <div class="col-md-8">
          <div class="ficharank"><span>#<?php echo $contador ?></span></div>
          <div class="ficharank"><img alt="Cafeterias BA" src="<?= \cafeterias\Core\App::urlTo($imagen) ?>"/></div>
          <div class="fchrnk01_todas">
            <h3><?php echo $datos->getNombre() ?></h3>
            <p>Zona: <?php echo $datos->getSucursal() ?></p>
            <p>Categoria: Especialidad</p>
            <a class="vermasbutton" href="<?= \cafeterias\Core\App::urlTo('vercafeteria/' . $datos->getId()) ?>">Ver cafeter&iacute;a <i
                  class="fawincon fa fa-angle-right" aria-hidden="true"></i>
            </a>
            
          </div>
          <div class="clear"></div>
          
        </div>
        
        <div class="vermascont">
            
            
           <?php
           
            if(Session::has('Rol') && $favoritas!= '' ){ 
                
              if(!in_array($datos->getId(), $favoritas)){
            ?>

            <button type="submit" class="btn btn-link favoritos" id="<?= $datos->getId() ?>">
                <span class="glyphicon glyphicon-star agregar_fav"></span>
            </button>
            <?php 
                }else{
            ?>
            
              <button type="submit" class="btn btn-link quitarfavoritos" id="<?= $datos->getId() ?>">
                <span class="glyphicon glyphicon-star  quitar_fav"></span>
            </button>

            <?php 
                }           
             }
             ?>
          </div>
       
        
      </div>
    <?php
    $contador = $contador+1;
    
    }
?>
  
  <hr class="htstyle">

  

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
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" placeholder="Email" value="<?php if (isset($_old_input['email'])) {  echo($_old_input['email']);} ?>">
                <label for="pass">Password</label>
              <input type="password" class="form-control" name="password" placeholder="Password">
              <div class="boxbtnvmas"><input type="submit" value="Ingresar" class="boton"/></div>
              
              <?php if (isset($_errors['nocoincide'])) {
                    echo('<p>'.$_errors['nocoincide'].'</p>'); } ?> 
              
              <?php if (isset($_errors['nousuario'])) {
                    echo('<p>'.$_errors['nousuario'].'</p>'); } ?> 
              
            </form>	
            
          </div>			
          <div class="col-xs-12 col-md-6">

            <form method="POST" accept-charset="utf-8" action="<?= \cafeterias\Core\App::urlTo('/register') ?>" id="registrousuario">
              <h3>Registro</h3>
              
                <label for="email">Email</label>
              <input type="text" id="email_re" name="email_re" class="form-control" placeholder="Email" value=" <?php if (isset($_old_input['email_re'])) { echo($_old_input['email_re']);} ?>" required  />
             <?php             
            if (isset($_errors['email_re'][0])) {
            
                echo('<p>'.$_errors['email_re'][0].'</p>'); 
                
            } ?> 
              
              <label for="pass">Password</label>
              
              <input id="pass" name="pass" type="password" class="form-control" placeholder="Contrase&ntilde;a" required />
             
              <label for="pass2">Repetir password </label>
             
              <input type="password" id="pass2" name="pass2" class="form-control" placeholder="Repetir contrase&ntilde;a" required />
              
            <?php if (isset($_errors['pass'][0])) {
                      
                echo('<p>Los passwords  no coinciden</p>'); }
            
            ?> 
              <div class="boxbtnvmas">

                <input type="submit" value="Registrarse" id="registro_usuario" class="boton"/>

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
   
    $(document).ready(function (){

    $("#login").click(function (){

      $('#mainmodallogin').modal('show');

    });
      

    if($('#mensaje').val() == 1 || $('#mensaje').val() == 2){

        $('#mainmodallogin').modal('show');

    }
    
    $(".favoritos").click(function (){

        var cafeteria_id=this.id;
        
          data = {
            'id': cafeteria_id
          };
          
        url=location.pathname;
        
         $.ajax({
            data: data,
            url: url+'/ajax_favoritos/'+cafeteria_id,
            type: 'post', 
            success: function (response) {
                
               if (response.indexOf("ERROR") == -1) {  
                   
                   alert('Cafeteria agregada a favoritos');
                   $('#'+cafeteria_id + ' span').css('color' , '#efef25');
                   
               }else{
                   
                   alert('No se pudo agregar');
                   
               }
            }
            
          });

    });
    
    
    $(".quitarfavoritos").click(function (){

        var cafeteria_id=this.id;
        
          data = {
            'id': cafeteria_id
          };
          
        url=location.pathname;
        
         $.ajax({
            data: data,
            url: url+'/ajax_quitar_favoritos/'+cafeteria_id,
            type: 'post', 
            success: function (response) {
                
               if (response.indexOf("ERROR") == -1) {  
                   
                   alert('Cafeteria agregada a favoritos');
                   
                   $('#'+cafeteria_id+' span').css('color' , 'lightgrey');
                   
               }else{
                   
                   alert('No se pudo agregar');
                   
               }
            }
            
          });


    });

    });

</script>
