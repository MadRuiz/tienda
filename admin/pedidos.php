<!DOCTYPE html>
<html>
     <head>
          <meta charset="utf-8">
          <title>Pedidos</title>
     </head>
     <body>
          <table border="2">
               <tr>
                    <td>Nombre</td>
                    <td>Estado</td>
                    <td>Gestionar</td>
                    <td>Enviar</td>
                    <td>Cancelar</td>
               </tr>
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
                         case '0': echo ' style="background-color:rgb(255,200,200);"';break;
                         case '1': echo ' style="background-color:rgb(200,255,200);"';break;
                         case '2': echo ' style="background-color:rgc(255,255,255);"';break;
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
?>
          </table>
     </body>
</html>
