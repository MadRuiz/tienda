<?php
 if (!isset($_SESSION['contador'])) {
  $_SESSION['contador']=0;
 }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
     <link rel="stylesheet" href="css/bootstrap.min.css">
	<title>Tu tienda Kúl</title>
</head>
<body>
	<div id="contenedor" class="">
		<header class="jumbotron">
			<h1 class="display-4"><a href="index.php">Tu tienda kúl</a></h1>
			<h2 class="display-4"><small>Subtítulo casi tan kúl</small></h2>
		</header>
		<section>
			<div id="contienecarrito">
				<div id="carrito" style="background:black;color:white;">
					Carrito
				</div>
				<a href="destruir.php"><button>Vaciar carrito</button></a>
				<a href="confirmar.php"><button>Confirma compra</button></a>
		</section>
	</div>


</body>
</html>
