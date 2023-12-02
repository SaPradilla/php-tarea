<?php
    require('../conexion.php');

    $id = $_POST['id'];

    $Ca1_Cod_curso = $_POST['ca1_cod_curso'];
    $Ca_Cod_alum = $_POST['ca_cod_alum'];
    $Nota = $_POST['Nota'];

    $sql = "UPDATE nota SET Ca1_Cod_curso='$Ca1_Cod_curso' , Ca_Cod_alum='$Ca_Cod_alum' ,Nota=$Nota WHERE Ca1_Cod_curso='$id' ";
    $resultado = mysqli_query($link,$sql) or die("Fallo La Actualizacion");


    if($resultado){
        echo " <p>Actualizado con exito</p>";
        echo "<P>[ <A HREF='lista_notas.php'>Volver</A> ]</P>";

    }else{

    }

?>