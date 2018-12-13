<?php 

use cafeterias\Storage\Session;

$comentarios=0;

if(Session::get('Rol') != 1){
    foreach ($data['estado_comentario'] as $row){

        $comentarios += $row;

    }
}else{
    $comentarios=0;
}

?>
  <nav class="mainheader navbar navbar-default topNavigationBar">
        <div class="container usrmn">
          <?php
          echo '<p style="color: #FFC501;">Bienvenido: '.$_SESSION['Usuario'].'</p>';
          ?>
          <ul id="userMenu">
            <li class="regbutton"><a href="<?= \cafeterias\Core\App::urlTo('auth/logout');?>">Cerrar Sesion</a></li>
          </ul>
        </div>

        <div class="container">
          <div class="navbar-header">
            <button type="button" class="mainmncolapseresponse navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
              <span class="sr-only">Menu</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            
              <a id="logoCafeteriasba" class="navbar-brand" rel="home" href="<?= \cafeterias\Core\App::urlTo('/');?>">
                <img style="width: 80px;" alt=" Cafeter&iacute;as BA" src="<?= \cafeterias\Core\App::urlTo('img/logoCafeteriasBA.svg') ?>"></a>
           
            <span class="description-site"></span>
          </div>

          <div class="collapse navbar-collapse" id="navbar-1">
            <ul class="mainmenuleft nav navbar-nav">
              <li>
                <a id="" class="navbar-brand" rel="home" href="<?= \cafeterias\Core\App::urlTo('/');?>">
                  <img id="menuimg" style="width: 80px;" alt=" Cafeter&iacute;as BA" src="<?= \cafeterias\Core\App::urlTo('img/logoCafeteriasBA.svg') ?>">
                </a></li>
              <li><a href="<?= \cafeterias\Core\App::urlTo('panel_usuario');?>">Mis Datos</a></li>
              <?php
              if($comentarios == 0){
                ?>
                <li><a href="<?= \cafeterias\Core\App::urlTo('favoritos');?>">Favoritos</a></li>
                <?php 
              }else{ ?>
                <li><a href="<?= \cafeterias\Core\App::urlTo('favoritos');?>">Favoritos  <span class="glyphicon glyphicon-comment"></span> <span class="glyphicon" id="comment-value"><?=$comentarios ?></span></a></li>
                <?php 
                }
                   
             if(Session::get('Rol') == 1){
             ?>
              <li><a href="<?= \cafeterias\Core\App::urlTo('abmcafeterias');?>">Abm Cafeterias</a></li>
              <li><a href="<?= \cafeterias\Core\App::urlTo('abmusuarios');?>">Abm Usuarios</a></li>
              <li><a href="<?= \cafeterias\Core\App::urlTo('crearevento');?>">Crear evento</a></li>
              <?php
             }
              ?>
              
              <hr class="usermnresponsive hrstylemnrespond">
              <li class="usermnresponsive"><button value="Acceso & Registro" id="logi2"/></li>
            </ul>
          </div>

        </div>
      </nav>