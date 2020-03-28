<?php
include 'conexion.php';

if (isset($_GET['empresa'])) {
    $empresa = $_GET['empresa'];

    $consulta = $con -> query("SELECT * FROM empresa WHERE denominacion = '$empresa'");

    while ($fila = $consulta -> fetch_assoc()) {
            echo "<b>ID:</b> " . $fila['id'];
            echo "<br><b>Denominación:</b> " . $fila['denominacion'];
            echo "<br><b>Telefono:</b> " . $fila['telefono'];
            echo "<br><b>Horario:</b> " . $fila['horario'];
            echo "<br><b>Quiénes somos:</b> " . $fila['quienessomos'];
            echo "<br><b>Latitud:</b> " . $fila['latitud'];
            echo "<br><b>Longitud:</b> " . $fila['longitud'];
            echo "<br><b>Domicilio:</b> " . $fila['domicilio'];
            echo "<br><b>E-mail:</b> " . $fila['email'];

    }
}else if(isset($_GET['modificacion'])){
    
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $horario = $_POST['horario'];
    $quienessomos = $_POST['quienessomos'];
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];
    $domicilio = $_POST['domicilio'];
    $email = $_POST['email'];
    
    $update = $con -> query("UPDATE empresa SET denominacion='$nombre', telefono='$telefono', horario='$horario', quienessomos='$quienessomos', latitud='$latitud', longitud='$longitud', domicilio='$domicilio', email='$email' WHERE denominacion = '$nombre'");
    if ($update) {
        echo "Actualizado con éxito";
    }else{
        echo "Problema al actualizar";
    }
}else if(isset($_GET['empresae'])){
    $empresae = $_GET['empresae'];

    $del = $con -> query("DELETE FROM empresa WHERE denominacion = '$empresae' ");
    if ($del) {
	echo "Registro eliminado con éxito.";
    }else{
	echo "Error: No se pudo eliminar el registro.";
    }
}else{
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $horario = $_POST['horario'];
    $quienessomos = $_POST['quienessomos'];
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];
    $domicilio = $_POST['domicilio'];
    $email = $_POST['email'];

    $ins = $con -> query("INSERT INTO empresa (id, denominacion, telefono, horario, quienessomos, latitud, longitud, domicilio, email) VALUES ('','$nombre','$telefono', '$horario','$quienessomos','$latitud', '$longitud', '$domicilio', '$email')");

    if($ins){
	echo "Guardado con éxito.";
    }else{
	echo "Error al guardar.";
    }
}
    echo "<br><br>";
    echo "<form action='administrarempresa.php'><center><input type='submit' value='Volver'/></center></form>"; 



