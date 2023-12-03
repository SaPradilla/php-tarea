<?php
    require('../conexion.php');

    $id = $_POST['id'];
    $nom_com_pro= $_POST['nom_com_pro'];
    $formacion_pro= $_POST['formacion_pro'];
    $direcc_pro= $_POST['direcc_pro'];
    $especialidad=$_POST['especialidad'];
    $tlf_pro= $_POST['tlf_pro'];
    $salario_pro= $_POST['salario_pro'];
    $ca1_cif=$_POST['ca1_cif'];
    $curso=$_POST['curso'];

    $sql = "UPDATE profesores SET Nom_com_pro='$nom_com_pro' , Formacion_pro='$formacion_pro' ,Direcc_pro='$direcc_pro',Especialidad='$especialidad',Tlf_pro='$tlf_pro',Salario_pro='$salario_pro',CA1_CIF='$ca1_cif',curso='$curso' WHERE Cod_pro=$id ";
    $resultado = mysqli_query($link,$sql);


    if($resultado){
        echo " <p>Actualizado con exito</p>";
        echo "<P>[ <A HREF='lista_profesores.php'>Volver</A> ]</P>";

    }else{
        echo " <p> $sql </p>";
        echo " <script> console.log($resultado)</script>";

    }

?>