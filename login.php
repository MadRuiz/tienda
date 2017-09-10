</div>
</section>

<?php
session_start();
include 'header.php';
include 'conexion.php';
?>
<section class="col-sm-12">
     <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item ">Confirmar pedido</li>
          <li class="breadcrumb-item">Resultado</li>
     </ol>
</section>
<?php
$contador = 0;
$peticion = "SELECT * FROM clientes WHERE usuario = '".$_POST['usuario']."' AND clave = '".$_POST['clave']."'";
$resultado = mysqli_query($conexion, $peticion);
while ($fila = mysqli_fetch_array($resultado)) {
     $contador++;
     $_SESSION['usuario'] = $fila['idcliente'];
}
if ($contador > 0) {
     $peticion = "INSERT INTO pedidos VALUES('', ".$_SESSION['usuario'].", '".date_default_timezone_set('America/El_Salvador')."','0')";
     $resultado = mysqli_query($conexion, $peticion);

     $peticion = "SELECT * FROM pedidos WHERE idcliente = '".$_SESSION['usuario']."' ORDER BY fecha DESC LIMIT 1";
     $resultado = mysqli_query($conexion, $peticion);
     while ($fila = mysqli_fetch_array($resultado)) {
          $_SESSION['idpedido'] = $fila['idcliente'];
     }
     echo "<div class='container'>
               <p>Pedidos realizados: ".$_SESSION['idpedido']."</p>
          </div>
     ";

     for ($i=0; $i < $_SESSION['contador']; $i++) {
          $peticion = "INSERT INTO lineaspedido VALUES ('', '".$_SESSION['idpedido']."','".$_SESSION['producto'][$i]."','1')";
          $resultado = mysqli_query($conexion, $peticion);

          $peticion = "SELECT * FROM productos WHERE idproducto='".$_SESSION['producto'][$i]."'";
          $resultado = mysqli_query($conexion, $peticion);
          while ($fila = mysqli_fetch_array($resultado)) {
               $existencias = $fila['existencias'];
               $peticion2 = "UPDATE productos SET existencias = '".($existencias-1)."' WHERE idproducto='".$_SESSION['producto'][$i]."'";
               $resultado2  = mysqli_query($conexion, $peticion2);
          }
     }
     echo "<div class='container-fluid'>
               <div class='alert alert-success' role='alert'>
                    <p>Tu pedido se ha realizado satisfactoriamente </p>
               </div>
          </div>";
     session_destroy();
     echo '
          <meta url="index.php">
     ';
}else {
     echo "<div class='container-fluid'>
               <div class='alert alert-danger' role='alert'>
                    <p>El usuario no existe</p>
               </div>
          </div>";
     echo '
          <meta url="confirmar.php">
     ';
}
mysqli_close($conexion);
?>
</div>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
</body>
</html>
