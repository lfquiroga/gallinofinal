
<?php 

use cafeterias\Storage\Session;
use cafeterias\Core\Route;



if($cafeteria){
    
$_old_input=get_object_vars($cafeteria);

}


if(Session::has('_errors')) {
	$_errors = Session::once('_errors');
	$_old_input = Session::once('_old_input');
        
}   
   $img_cafeteria=$cafeteria->obtenerimgportada($cafeteria->id);


?>

<div class="container" >
<h1>Editar  una  CAFETERIA </h1>
    <form method="post" action="update" enctype="multipart/form-data">

      <div class="form-group">
        <label for="nombre">Nombre comercial</label>
        <input type="text" name="nombre" id="nombre" value="<?php if(isset($_old_input['nombre'])){echo($_old_input['nombre']);} ?>" class="form-control"/>
        <p><?php if(isset($_errors['nombre'][0])){echo($_errors['nombre'][0]);}  ?> </p>
      </div>

      <div class="form-group">
        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" id="direccion" value="<?php if(isset($_old_input['direccion'])){echo($_old_input['direccion']);} ?>" class="form-control"/>
        <p><?php if(isset($_errors['direccion'][0])){echo($_errors['direccion'][0]);}  ?> </p>
      </div>
      
      <div class="form-group">
        <label for="sucursal">Sucursal</label>
        <input type="text" name="sucursal" id="direccion" value="<?php if(isset($_old_input['sucursal'])){echo($_old_input['sucursal']);} ?>" class="form-control"/>
         <p><?php if(isset($_errors['sucursal'][0])){echo($_errors['sucursal'][0]);}  ?> </p>
      </div>

      <div class="form-group">
        <label for="telefono">Telefono</label>
        <input type="tel" name="telefono" id="telefono" value="<?php if(isset($_old_input['telefono'])){echo($_old_input['telefono']);} ?>" class="form-control"/>
         <p><?php if(isset($_errors['telefono'][0])){echo($_errors['telefono'][0]);}  ?> </p>
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?php if(isset($_old_input['email'])){echo($_old_input['email']);} ?>" class="form-control"/>
          <p><?php if(isset($_errors['email'][0])){echo($_errors['email'][0]);}  ?> </p>
      </div>

      <div class="form-group">
        <label for="sitio">Sitio web</label>
        <input type="text" name="sitio" id="sitio" value="<?php if(isset($_old_input['sitioweb'])){echo($_old_input['sitioweb']);} ?>" class="form-control" />
         <p><?php if(isset($_errors['sitio'][0])){echo($_errors['sitio'][0]);}  ?> </p>
      </div>
      
      <div class="form-group">
        <label for="sitio">Imagen Portada</label>
        <input type="file" name="imagen" id="imagen" value="<?php if(isset($_old_input['imagen'])){echo($_old_input['imagen']);} ?>" class="form-control" />
         <p><?php if(isset($_errors['imagen'][0])){echo($_errors['imagen'][0]);}  ?> </p>
         <label>Imagen actual</label>
         <img src="<?= \cafeterias\Core\App::urlTo($img_cafeteria) ?>">
      </div>

     <input type="hidden" name="ideditar" value="<?= $_old_input['id'] ?>">

      <input type="submit" class="login-button btn btn-default" value="Cargar Cafeteria"/>

    </form>

</fiv>