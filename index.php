<?php
session_start();
if (!isset($_SESSION['contador'])) {$_SESSION['contador']=0;
}
include 'conexion.php';
include 'header.php';
$peticion = "SELECT * FROM productos WHERE existencias > 0";
$resultado = mysqli_query($conexion, $peticion);
echo "<meta charset='UTF-8'>";
?>
<section class="col-sm-12">
     <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="index.php">Inicio</a></li>
     </ol>
</section>
<?php
while ($fila = mysqli_fetch_array($resultado)) {
     echo "<article class='col-sm-3'>
               <div class='card'>
                    <div class='card-body'>";
     $peticion2 = "SELECT * FROM imagenesproducto WHERE idproducto =".$fila['idproducto']." LIMIT 1";
     $resultado2 = mysqli_query($conexion, $peticion2)or die(mysql_error());
     while ($fila2 = mysqli_fetch_array($resultado2)) {
          echo "<img src='img/".$fila2['imagen']."' class='card-img-top'";
    }
   echo "<h5 class='card-title'>".$fila['nombreproducto']."</h5>";
   echo "<p class='card-text'> Precio: $".$fila['precio']."</p>";
   echo "<a class='btn btn-outline-info btn-block' href='producto.php?idproducto=".$fila['idproducto']."'>Más información</a>";
   echo "<button class='botoncompra btn btn-info btn-block' value='".$fila['idproducto']."' >Comprar ahora</button>";
   echo "</div>";
   echo "</div>";
   echo "</article>";
}
mysqli_close($conexion);
?>

</div>
</section>
</div>
</div>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
</body>
</html>
