
    <nav class="mainheader navbar navbar-default topNavigationBar">
<?php

use cafeterias\Storage\Session;

if(Session::has('Usuario')){?>

      <div class="container usrmn">

          <ul id="userMenu">
            <li class="regbutton"><a href="<?= \cafeterias\Core\App::urlTo('auth/logout');?>">Cerrar Sesion</a></li>
           <li><a href="<?= \cafeterias\Core\App::urlTo('panel_usuario');?>">Panel</a></li>

          </ul>
        </div>
      
<?php }else{ ?>
      <div class="container usrmn">
        <ul id="userMenu">
          <li class="regbutton"><a id="login">Acceso & Registro </a></li>
        </ul>
      </div>
<?php } ?>

    <div class="container">
      <div class="navbar-header">
        <button type="button" class="mainmncolapseresponse navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
          <span class="sr-only">Menu</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="" rel="home" class="navbar-left">
          <a id="logoCafeteriasba" class="navbar-brand" rel="home" href="">
            <img style="width: 80px;" alt="Cafeter&iacuteas BA" src="<?= \cafeterias\Core\App::urlTo('img/logoCafeteriasBA.svg') ?>"></a>
        </a>
        <span class="description-site"></span>
      </div>

      <div class="collapse navbar-collapse" id="navbar-1">
        <ul class="mainmenucentral nav navbar-nav"><li><a href="<?= \cafeterias\Core\App::urlTo('/') ?>">Home</a></li>
          <li><a href="#">Cafeter&iacuteas</a></li>
          <li><a href=""><img class="logoCafeteriasba2" alt="Cafeter&iacuteas BA" style="width: 89px; margin-top: -10px;" src="<?= \cafeterias\Core\App::urlTo('img/logoCafeteriasBA.svg') ?>"></a></li>
          <li class="fixdistnacelogo"><a href="#">Disfrut&aacute Caf&eacute</a></li>
          <li class="fixdistnacelogo"><a href="#">Accesorios</a></li>         
          <hr class="usermnresponsive hrstylemnrespond">
          <li class="usermnresponsive"><button value="Acceso & Registro" id="logi2"/></li>
        </ul>
      </div>

    </div>
    </nav>
