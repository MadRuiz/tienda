<?php
include 'conexion.php';
session_start();
if(!isset($_SESSION['contador'])){$_SESSION['contador']=0;}
$suma=0;
if (isset($_GET['p'])) {
	$_SESSION['producto'][$_SESSION['contador']]=$_GET['p'];
	$_SESSION['contador']++;
}
echo "<h5>Carrito de compra</h5>";
echo "<table class='table'>
  <thead>
    <tr>
      <th>#</th>
      <th>Producto</th>
      <th>Precio</th>
    </tr>
  </thead>";
$num = 1;
for ($i=0; $i < ($_SESSION['contador']); $i++) {
	$peticion = "SELECT * FROM productos WHERE idproducto=".$_SESSION['producto'][$i]."";
	$resultado = mysqli_query($conexion, $peticion);
	echo "<meta charset='UTF-8'>";
	while ($fila = mysqli_fetch_array($resultado)) {
		echo "<tr>
				<th>".$num."</th>
				<td>".$fila['nombreproducto']."</td>
				<td>$".$fila['precio']."</td>
			</tr>";
		$suma += $fila['precio'];
		$num++;
	}
}
echo "<tr>
		<td>Subtotal</td>
		<td></td>
		<td>$".number_format($suma, 2)."</td>
	</tr>";
echo "</table>";
?>
