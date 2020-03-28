<?php
include 'conexion.php';
$sel = $con->query("SELECT * FROM empresa");
$sel2 = $con->query("SELECT * FROM empresa");
$sel3 = $con->query("SELECT * FROM empresa");

if (isset($_GET['empresaModificar'])) {
$consulta = $con->query("SELECT * FROM empresa WHERE denominacion = '" . $_GET['empresaModificar'] . "'");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>ADMINISTRAR EMPRESA</title>
        <style type="text/css">

            @import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);

            html {
                font-family: 'Montserrat', Arial, sans-serif;
                -ms-text-size-adjust: 100%;
                -webkit-text-size-adjust: 100%;
            }

            body {
                background: #F2F3EB;
            }

            button {
                overflow: visible;
            }

            button, select {
                text-transform: none;
            }

            button, input, select, textarea {
                color: #5A5A5A;
                font: inherit;
                margin: 0;
            }

            input {
                line-height: normal;
            }

            textarea {
                overflow: auto;
            }

            #container {
                border: solid 3px #474544;
                max-width: 768px;
                margin: 60px auto;
                position: relative;
            }

            form {
                padding: 37.5px;
                margin: 50px 0;
            }

            h1 {
                color: #474544;
                font-size: 32px;
                font-weight: 700;
                letter-spacing: 7px;
                text-align: center;
                text-transform: uppercase;
            }
            h2 {
                color: #474544;
                font-size: 24px;
                font-weight: 700;
                letter-spacing: 7px;
                text-align: center;
                text-transform: uppercase;
            }

            .underline {
                border-bottom: solid 2px #474544;
                margin: -0.512em auto;
                width: 80px;
            }

            .icon_wrapper {
                margin: 50px auto 0;
                width: 100%;
            }

            .icon {
                display: block;
                fill: #474544;
                height: 50px;
                margin: 0 auto;
                width: 50px;
            }

            .email {
                float: right;
                width: 45%;
            }

            input[type='text'], [type='email'], select, textarea {
                background: none;
                border: none;
                border-bottom: solid 2px #474544;
                color: #474544;
                font-size: 1.000em;
                font-weight: 400;
                letter-spacing: 1px;
                margin: 0em 0 1.875em 0;
                padding: 0 0 0.875em 0;
                text-transform: uppercase;
                width: 100%;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                -ms-box-sizing: border-box;
                -o-box-sizing: border-box;
                box-sizing: border-box;
                -webkit-transition: all 0.3s;
                -moz-transition: all 0.3s;
                -ms-transition: all 0.3s;
                -o-transition: all 0.3s;
                transition: all 0.3s;
            }

            input[type='text']:focus, [type='email']:focus, textarea:focus {
                outline: none;
                padding: 0 0 0.875em 0;
            }

            .message {
                float: none;
            }

            .name {
                float: left;
                width: 45%;
            }

            select {
                background: url('https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-ios7-arrow-down-32.png') no-repeat right;
                outline: none;
                -moz-appearance: none;
                -webkit-appearance: none;
            }

            select::-ms-expand {
                display: none;
            }

            .subject {
                width: 100%;
            }

            .telephone {
                width: 100%;
            }

            textarea {
                line-height: 150%;
                height: 150px;
                resize: none;
                width: 100%;
            }

            ::-webkit-input-placeholder {
                color: #474544;
            }

            :-moz-placeholder { 
                color: #474544;
                opacity: 1;
            }

            ::-moz-placeholder {
                color: #474544;
                opacity: 1;
            }

            :-ms-input-placeholder {
                color: #474544;
            }

            #form_button {
                background: none;
                border: solid 2px #474544;
                color: #474544;
                cursor: pointer;
                display: inline-block;
                font-family: 'Helvetica', Arial, sans-serif;
                font-size: 0.875em;
                font-weight: bold;
                outline: none;
                padding: 20px 35px;
                text-transform: uppercase;
                -webkit-transition: all 0.3s;
                -moz-transition: all 0.3s;
                -ms-transition: all 0.3s;
                -o-transition: all 0.3s;
                transition: all 0.3s;
            }

            #form_button:hover {
                background: #474544;
                color: #F2F3EB;
            }
        </style>

        <script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>

    </head>

    <body>
        <div id="container">
            <h1>&bull; Administrar Empresa &bull;</h1>
            <div class="underline">
            </div>
<?php if (isset($_GET['empresaModificar'])): ?>
            <form action="resultado.php?modificacion=<?=$_GET['empresaModificar']?>" method="post" id="contact_form">
<?php else: ?>
            <form action="resultado.php" method="post" id="contact_form">
<?php endif; ?>
                <select id="crud_seleccion" onchange="crud()" required>
                    <option disabled hidden selected>Seleccione una opción</option>
                    <option value="create">Alta nueva empresa</option>
                    <option value="delete">Eliminar empresa</option>
                    <option value="update">Modificar empresa</option>
                    <option value="read">Consultar datos</option>
                </select>

                <div id="subrayado">
                </div>
                <center><h2 id="seleccion"></h2></center>
                <?php if (isset($_GET['empresaModificar'])): ?>
                &bull; Modificar Empresa &bull;
                <div id="eleccion">
                    <?php while ($fila = $consulta->fetch_assoc()) { ?>
                        <input type='text' value='<?= $fila['denominacion']?>' name='nombre' id='nombre' required>
                        <input type='text' value='<?= $fila['telefono']?>' name='telefono' id='telefono' required>
                        <input type='text' value='<?= $fila['horario']?>' name='horario' id='horario' required>
                        <input type='text' value='<?= $fila['quienessomos']?>' name='quienessomos' id='quienesosmos' required>
                        <input type='text' value='<?= $fila['latitud']?>' name='latitud' id='latitud' required>
                        <input type='text' value='<?= $fila['longitud']?>' name='longitud' id='longitud' required>
                        <input type='text' value='<?= $fila['domicilio']?>' name='domicilio' id='domicilio' required>
                        <input type='email' value='<?= $fila['email']?>' name='email' id='email' required>
                    <?php } ?>
                </div>
                <?php else: ?>
                <div id="eleccion" style="display: none">
                </div>
                <?php endif; ?>   
                <br><br>
                <div class="submit">
                    <input type="submit" value="Aceptar" id="form_button"/> <input type="button" value="Volver" id="form_button" onclick="volver()"/>
                </div>
            </form>
        </div>

        <script>
            function crud() {
                var x = document.getElementById("crud_seleccion").value;
                var y = document.getElementById("eleccion");
                y.style.display = "block";

                y.innerHTML = "";
                document.getElementById("subrayado").classList.add("underline");
                if (x == "create") {

                    document.getElementById("seleccion").innerHTML = "&bull; Alta Empresa &bull;";
                    y.innerHTML = "<input type='text' placeholder='Nombre' name='nombre' id='nombre' required>";
                    y.innerHTML += "<input type='text' placeholder='Telefono' name='telefono' id='telefono' required>";
                    y.innerHTML += "<input type='text' placeholder='Horario' name='horario' id='horario' required>";
                    y.innerHTML += "<input type='text' placeholder='Quienes somos' name='quienessomos' id='quienesosmos' required>";
                    y.innerHTML += "<input type='text' placeholder='latitud' name='latitud' id='latitud' required>";
                    y.innerHTML += "<input type='text' placeholder='longitud' name='longitud' id='longitud' required>";
                    y.innerHTML += "<input type='text' placeholder='domicilio' name='domicilio' id='domicilio' required>";
                    y.innerHTML += "<input type='email' placeholder='E-mail' name='email' id='email' required>";


                } else if (x == "read") {
                    document.getElementById("seleccion").innerHTML = "&bull; Consultar Empresa &bull;";

                    y.innerHTML = "<select id='empresa' onchange='consultar()'><option disabled hidden selected>Empresa</option>";
<?php while ($fila = $sel->fetch_assoc()) { ?>
                    $('#empresa').append('<option value="<?= $fila['denominacion'] ?>"><?= $fila['denominacion'] ?></option>');
<?php } ?>
                    y.insertAdjacentHTML("afterend", "</select>");

                } else if (x == "update") {

                    document.getElementById("seleccion").innerHTML = "&bull; Modificar Empresa &bull;";
                    y.innerHTML = "<select id='empresau' onchange='modificar()'><option disabled hidden selected>Empresa</option>";
<?php while ($fila = $sel3->fetch_assoc()) { ?>
                    $('#empresau').append('<option value="<?= $fila['denominacion'] ?>"><?= $fila['denominacion'] ?></option>');
<?php } ?>

                } else if (x == "delete") {

                    document.getElementById("seleccion").innerHTML = "&bull; Eliminar Empresa &bull;";

                    y.innerHTML = "<select id='empresae' onchange='eliminar()'><option disabled hidden selected>Empresa</option>";
<?php while ($fila = $sel2->fetch_assoc()) { ?>
                    $('#empresae').append('<option value="<?= $fila['denominacion'] ?>"><?= $fila['denominacion'] ?></option>');
<?php } ?>
                    y.insertAdjacentHTML("afterend", "</select>");

                }
            }

            function consultar() {
                var empJS = document.getElementById('empresa').value;
                window.location.assign("resultado.php?empresa=" + empJS);

            }

            function eliminar() {
                var empJS = document.getElementById('empresae').value;
                window.location.assign("resultado.php?empresae=" + empJS);

            }

            function modificar() {
                var empJS = document.getElementById('empresau').value;
                window.location.assign("administrarempresa.php?empresaModificar=" + empJS);

            }

            function volver() {
                window.location.href = "index.php";
            }
        </script>
    </body>
</html>
