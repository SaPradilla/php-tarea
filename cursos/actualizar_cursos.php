<?php
    require('../conexion.php');

    $id = $_POST['id'];

    $nombre = $_POST['nombre'];
    $cod_curso = $_POST['cod_curso'];
    $Ca_Cod_pro = $_POST['Ca_Cod_pro'];

    $sql = "UPDATE cursos SET Nom_cur='$nombre' , Cod_curso='$cod_curso' ,Ca_Cod_pro=$Ca_Cod_pro WHERE Id_curso='$id' ";
    $resultado = mysqli_query($link,$sql) or die("Fallo La Eliminacion");


    if($resultado){
        echo " <p>Actualizado con exito</p>";
        echo "<P>[ <A HREF='lista_cursos.php'>Volver</A> ]</P>";

    }else{

    }

?>