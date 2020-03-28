<?php
include 'conexion.php';
    $sel = $con -> query("SELECT id,denominacion FROM empresa");
?>

<table width="50%" align="center">
<tr>
<td width="50%">
<b>EMPRESA</b>
</td>
<td>
<b>VER PAGINA</b>
</td>
</tr>

<?php
while ($fila = $sel -> fetch_assoc()) {
?>
<tr>
<td>
<?=$fila['denominacion']?>
</td>
<td>
<a href="home.php?empresa=<?=$fila['id']?>">URL PAGINA HOME</a>
</td>
</tr>
<?php } ?>

</table>
<br><br>
<a href="administrarEmpresa.php">ADMINISTRAR EMPRESAS</a>