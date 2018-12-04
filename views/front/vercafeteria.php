<?php

use cafeterias\Storage\Session;
use cafeterias\Core\Route;

?>

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
        </div>

        <section class="mainwrapperC" >
          <div class="infoCafe">
            <ul class="navegacionResumen">
              <li><a href="/public">Home</a></li>
              >
              <li><a href="">Cafeter&iacute;as</a></li>
              >
              <li><a href="">Especialidad</a></li>
            </ul>
            <div>
              <h2 class="Hs">Especialistas en caf&eacute; y un ambiente &uacute;nico</h2>
              
              <div class="resumenC">
                
                <div class="detalleResumenC">
                  <p><img src="../img/especificaciones.jpg" alt="" /></p>
                  <p> <?php echo $cafeteria->getdescripcion() ?></p>
                </div>
                
                <div class="mapa">
                  <h3>Mapa</h3>
                  <img src="../img/map.jpg" alt="" />
                </div>
                
              </div>
            </div>
        </section>
