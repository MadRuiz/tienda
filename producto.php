<?php
session_start();
if(!isset($_SESSION['contador'])){$_SESSION['contador']=0;}
include 'conexion.php';
include 'header.php';
$peticion = "SELECT * FROM productos WHERE idproducto=".$_GET['idproducto']." LIMIT 1";
$resultado = mysqli_query($conexion, $peticion);
?>
<section class="col-sm-12">
     <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item">Información del producto</li>
     </ol>
</section>
<?php
while ($fila = mysqli_fetch_array($resultado)) {
     echo "<article class='container justify-content-between'>";
     $peticion2 = "SELECT * FROM imagenesproducto WHERE idproducto =".$fila['idproducto']."";
     $resultado2 = mysqli_query($conexion, $peticion2)or die(mysql_error());
     while ($fila2 = mysqli_fetch_array($resultado2)) {
          echo "<img src='img/".$fila2['imagen']." 'class='' width='200'>";
     }
   echo "<h5 class=''>".$fila['nombreproducto']."</h5>";
   echo "<p class=''> Precio: $".$fila['precio']."</p>";
   echo "<button class='botoncompra btn btn-info' value='".$fila['idproducto']."' >Comprar ahora</button>";
   echo "<br><hr>
   </div></article>
   ";
}
mysqli_close($conexion);
?>

</section>
</div>
</div>
     <footer class="footer">
          <div class="container">
               <span class="text-muted">Portafolio de prácticas / WYCE II / Madelyn Ruíz </span>
          </div>
     </footer>
     <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
</body>
</html>
