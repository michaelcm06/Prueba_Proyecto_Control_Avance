<?php

$conexion=mysqli_connect("localhost","root","","registro");

if(empty($_POST["usuario"]) and empty($_POST["password"])){
    
}else{
    $usuario=$_POST["usuario"];
    $password=$_POST["password"];
    $sql=$conexion ->query("select * FROM Personal where usuario = '$usuario' and password = '$password' "); 
    

    
    if($datos=$sql->fetch_object()){
        header("location:in.php");
    
    }else{
        include("index.html");
        ?>
        <h1>ERROR DE USUARIO O CONTRASEÑA</h1>
        <?php
        
    }
}
mysqli_close($conexion);
?>
       
