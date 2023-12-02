<?php
    require('../conexion.php');


    $id = $_POST['id'];

    $nombre = $_POST['nombre'];
    $tlf_cent = $_POST['tlf_cent'];
    $direccion = $_POST['direccion'];
    $localidad = $_POST['localidad'];
    $cif = $_POST['cif'];

    $sql = "UPDATE centros SET Nombre='$nombre' , Tlf_cent='$tlf_cent', Direccion='$direccion',Localidad='$localidad', CIF='$cif' WHERE CIF='$id' ";
    $resultado = mysqli_query($link,$sql) or die("Fallo La Eliminacion");


    if($resultado){
        echo " <p>Actualizado con exito</p>";
        echo "<P>[ <A HREF='lista_centros.php'>Volver</A> ]</P>";

    }else{

    }

?>