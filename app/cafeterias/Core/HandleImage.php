<?php

namespace cafeterias\Core;

class HandleImage {
    
       public static function upImage($imagen, $id_item ,$ancho_img,$path='img/cafeterias/') {

           
        $tmp_file = $imagen['imagen']['tmp_name']; //ruta y nombre de archivo que creó el Apache

        //buscamos los caracteres no permitiro
        $buscar = "/[^a-zA-Z\_\-\.0-9]/";

        $poner = "-";

        $nombre_real = preg_replace($buscar, $poner, 'id_' . $id_item . '_' . $imagen['imagen']['name']);

        $nombre_real = $nombre_real;
        

        $extension = pathinfo($nombre_real, PATHINFO_EXTENSION);

        $original = imagecreatefromjpeg($tmp_file);

        
        $ancho_o = imagesx($original);

        $alto_o = imagesy($original);

        $ancho = $ancho_img;

        $alto = round($ancho * $alto_o / $ancho_o);

        $copia = imagecreatetruecolor($ancho, $alto);

        //superponemos la data
        imagecopyresampled(
                $copia, $original, 0, 0, /* donde empiezo a pastear en la copia */ 0, 0, /* donde empiezo a copiar la data en el original */ $ancho, $alto, $ancho_o, $alto_o
        );


        //exportamos la copia, como recibe toda la ruta (carpeta/nombre) le decimos que sea adentro de la carpeta que creamos a los efectos del texto subido...
        imagejpeg($copia, $path.$nombre_real, 100);

        //por ultimo limpiamos todos los archivos temporales
        imagedestroy($copia);

        imagedestroy($original);

        $e = move_uploaded_file($tmp_file, $nombre_real);


        if ($e) {

            return $nombre_real;
        } else {
            return false;
        }
    }

           
}