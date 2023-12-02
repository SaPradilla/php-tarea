<?php
    require('../conexion.php');

    $id = $_POST['id'];
    $nom_com= $_POST['nom_com'];
    $tlf_per= $_POST['tlf_per'];
    $direccion= $_POST['direccion'];
    $puesto_per=$_POST['puesto_per'];
    $salario_per= $_POST['salario_per'];
    $formacion= $_POST['formacion'];
    $ca_cif=$_POST['ca_cif'];

    $sql = "UPDATE personal SET Nom_com='$nom_com' , Tlf_per='$tlf_per' ,Direccion='$direccion',Puesto_per='$puesto_per',Salario_per='$salario_per',Formacion='$formacion',Ca_cif='$ca_cif' WHERE Cod_per=$id ";
    $resultado = mysqli_query($link,$sql);


    if($resultado){
        echo " <p>Actualizado con exito</p>";
        echo "<P>[ <A HREF='lista_personal.php'>Volver</A> ]</P>";

    }else{
        echo " <p> $sql </p>";
        echo " <script> console.log($resultado)</script>";

    }

?>