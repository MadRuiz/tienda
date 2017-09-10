<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/styles.css">
<link rel="icon" href="../img/favicon.png" type="image/png">
<title>Tienda</title>
</head>
<body>
     <header class="jumbotron">
		<h1 class="display-4"><a href="index.php">Tu tienda kúl | Panel de control</a></h1>
		<h2 class="display-4"><small>Subtítulo casi tan kúl</small></h2>
	</header>
     <section class="col-sm-12">
          <ol class="breadcrumb">
               <li class="breadcrumb-item active"><a href="../index.php">Tienda</a></li>
               <li class="breadcrumb-item active"><a href="index.php">Administración</a></li>
               <li class="breadcrumb-item">Pedidos</li>
          </ol>
     </section>
          <section class="container">
               <ul class="nav nav-tabs">
                 <li class="nav-item">
                   <a class="nav-link  active" href="pedidos.php">Pedidos</a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" href="#">Clientes</a>
                 </li>
                 <li class="nav-item">
                   <a class="nav-link" href="#">Productos</a>
                 </li>
               </ul>
          </section>
     <section class="container">
          <table class="table table-sm table-hover">
               <thead>
                    <tr>
                         <th>Nombre</th>
                         <th>Estado</th>
                         <th>Gestionar</th>
                         <th>Enviar</th>
                         <th>Cancelar</th>
                    </tr>
               </thead>
               <tbody>
               <?php
               include '../conexion.php';
               mysqli_set_charset($conexion, "utf8");
               $peticion = "SELECT pedidos.idpedido AS idpedido,fecha,estado,nombre,estado,nombre,apellidos FROM pedidos LEFT JOIN clientes ON pedidos.idcliente = clientes.idcliente ORDER BY estado,fecha ASC";
               $resultado = mysqli_query($conexion, $peticion);
               while ($fila = mysqli_fetch_array($resultado)) {
                    $estado = $fila['estado'];
                    switch ($estado) {
                         case '0': $diestado = "No enviado";break;
                         case '1': $diestado = "Enviado";break;
                         case '2': $diestado = "Anulado";break;
                    }
                    echo'
                    <tr';
                    switch ($estado) {
                         case '0': echo ' class="table-danger"';break;
                         case '1': echo ' class="table-info"';break;
                         case '2': echo ' class="table-warning"';break;
                    }
                    echo '>
                         <td>'.$fila['nombre']." ".$fila['apellidos'].'</td>
                         <td>'.$diestado.'</td>
                         <td>
                              <a href="gestionarpedido.php?id='.$fila['idpedido'].'">
                                   <button>Gestionar</button>
                              </a>
                         </td>
                         <td>
                              <a href="pedidoservido.php?id='.$fila['idpedido'].'">
                                   <button>Pedido enviado</button>
                              </a>
                         </td>
                         <td>
                              <a href="cancelarpedido.php?id='.$fila['idpedido'].'">
                                   <button>Cancelar Pedido</button>
                              </a>
                         </td>
                    </tr>';
               }
mysqli_close($conexion);
?>             </tbody>
               </table>
          </section>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>
</body>
</html>
