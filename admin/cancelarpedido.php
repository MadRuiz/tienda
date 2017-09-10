<?php
include '../conexion.php';
mysqli_set_charset($conexion, "utf8");
$peticion = "UPDATE pedidos SET estado=2 WHERE idpedido = '".$_GET['id']."'";
$resultado = mysqli_query($conexion, $peticion);

mysqli_close($conexion);
?>
<script>
     window.location = "pedidos.php"
</script>
