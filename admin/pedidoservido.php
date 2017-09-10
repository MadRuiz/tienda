<?php
include '../conexion.php';
mysqli_set_charset($conexion, "utf8");
$peticion = "UPDATE pedidos SET estado=1 WHERE idpedido = '".$_GET['id']."'";
$resultado = mysqli_query($conexion, $peticion);

mysqli_close($conexion);
?>
<script>
     window.location = "pedidos.php"
</script>
