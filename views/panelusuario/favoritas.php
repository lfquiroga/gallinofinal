<?php

use cafeterias\Storage\Session;
use cafeterias\Core\Route;

if (Session::has('_errors')) {
    $_errors = Session::once('_errors');
    $_old_input = Session::once('_old_input');
}

if(isset($data['cafeterias'])){
    $cafeterias = $data['cafeterias'];
}
?>
<div class="container" >

  <div class="container">
    <h2 class="titlesection">Ranking de Cafeter&iacuteas favoritas</h2>

<?php

if(isset($cafeterias)){
    
foreach ($cafeterias as $datos) {

    $imagen = $datos->obtenerimgportada($datos->getId());

    $comentarios = $data['comentarios'][$datos->getId()];
    ?>
        <div class="row cardRanking">
          <div class="col-md-8">
            <div class="ficharank">
                <?php if ($imagen == '') { ?>
                          <img alt="Cafeterias BA" src="<?= \cafeterias\Core\App::urlTo('img/allsaints.jpg') ?>"/>
                <?php
                   } else {
                ?>
               <img width="150" alt="Cafeterias BA" src="<?= \cafeterias\Core\App::urlTo($imagen) ?>"/>
                <?php } ?>
              <br/>
              <a class="btn btncomentarios" id="actualizar_<?= $datos->getId() ?>" data-toggle="collapse" href="#comentario_<?= $datos->getId() ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                Ver comentarios 
                <?php
                
                if($data['estado_comentario'][$datos->getId()]){
                    ?>
                    <span class="glyphicon glyphicon-comment"></span> <span class="glyphicon"><?=  $data['estado_comentario'][$datos->getId()]?></span>
                    <?php
                }
                ?>
              </a>    
            </div>
            <div class="ficharank fchrnk01">
              <h3><?php echo $datos->getNombre() ?></h3>
              <p>Zona: <?php echo $datos->getSucursal() ?></p>
              <p>Categoria: Especialidad</p>
              <i class="starspoints fa fa-star" aria-hidden="true"></i>
            </div>
            <div class="clear"></div>
          </div>

          <div class="col-md-4 vermascont">
            <div class="boxbtnvmas">            
              <a class="vermasbutton" href="<?= \cafeterias\Core\App::urlTo('vercafeteria/' . $datos->getId()) ?>">Ver cafeter&iacutea <i
                    class="fawincon fa fa-angle-right" aria-hidden="true"></i>
              </a>
            </div>  
           
          </div>

          <div id="comentario_<?= $datos->getId() ?>" class="col-lg-12 collapse">

            <?php
            if($comentarios){
            foreach ($comentarios as $row) {

                ?>

                <div class="media">
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
             <div class="media">
                    <div class="media-body">
                     <h4 class="media-heading">Todavia no hay comentarios , puedes dejar el primero</h4>                     
                    </div>
                 </div>
            
            <?php
                
            }
            ?>
            
            <div class="media">
              
              <form class="dejar_comentario" method="POST" action="">
                
                <label for="nombre">Dejar un nuevo Comentario</label>
                
                <textarea name="comentario" id="<?= $datos->getId()?>" class="form-control" rows="4" cols="50"> </textarea>  
                
                <input type="button" id="<?= $datos->getId() ?>" class="comentar" value="Dejar comentario">
                
                </form> 
            </div>
            
            </div>
            
          </div>
   
            <?php
        }

      }else{
          echo('<p>Todavia no has agregado nunguna cafeteria a favoritas .</p>');
      }
        ?>

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
    
})
$(".comentar").click(function (){

        var id=this.id;
        
        var comentario=$('#'+id).val();
        
        var cafeteria_id=id;
        
          data = {
            'id': cafeteria_id,
            'comentario': comentario
          };
          
          url=location.pathname;
        
         $.ajax({
            data: data,
            url: url+'/dejarcomentario',
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
</script>