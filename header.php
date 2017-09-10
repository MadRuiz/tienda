<?php
 if (!isset($_SESSION['contador'])) {
  $_SESSION['contador']=0;
 }
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/styles.css">
<link rel="icon" href="img/favicon.png" type="image/png">
<title>Sweets Store</title>
</head>
<body>
	<header class="jumbotron">
		<h1 class="display-4"><a href="index.php">Tu tienda kúl</a></h1>
		<h2 class="display-4"><small>Subtítulo casi tan kúl</small></h2>
	</header>
     <div class="container-fluid">
          <div class="row">
     		<aside class="col-sm-3 order-3">
               	<div id="contienecarrito">
               		<div id="carrito" class="">

               		</div>
               		<a href="destruir.php" class="btnbtn-outline-light">
                              <button class="btn btn-info">Vaciar </button>
                         </a>
               		<a href="confirmar.php" class="btnbtn-outline-light">
                              <button class="btn btn-info">Confirmar compra</button>
                         </a>
                     </div>
     		</aside>
               <section class="col-sm-9 order-2 align-self-sm-start">
                    <div class="row">
