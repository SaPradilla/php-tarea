<?php
    require('../conexion.php');

    $id = $_POST['id'];

    $cod_alum = $_POST['cod_alum'];
    // $cod_alumNew = $_POST['cod_alum'];
    
    $nom_com_alu = $_POST['nom_com_alu'];
    $tlf_alum = $_POST['tlf_alum'];
    $direc_alum = $_POST['direc_alum'];
    $ca_cod_curso = $_POST['ca_cod_curso'];

    $sql = "UPDATE alumnos SET Cod_alum=$cod_alum , nom_com_alu='$nom_com_alu', tlf_alum='$tlf_alum',direc_alum='$direc_alum', ca_cod_curso='$ca_cod_curso' WHERE cod_alum='$id'";
    // $sql = "UPDATE technical SET dni_t='$dni_t', name_t='$name_t', lastname_t='$lastname_t',adress_t='$adress_t', phone_t='$phone_t' WHERE id_t='$id_t'";
    $resultado = mysqli_query($link,$sql) or die("Fallo La Eliminacion");


    if($resultado){
    // var_dump($cod_alum );
        echo " <p>Actualizado con exito</p>";
        echo "<P>[ <A HREF='lista_alumnos.php'>Volver</A> ]</P>";

    }else{

    }

?>