</div>
</section>

<?php include "header.php"; ?>
<section class="col-sm-12">
     <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item">Confirmar pedido</li>
     </ol>
</section>
<section class="container d-flex justify-content-center">

	<form class="form col-sm-6" action="login.php" method="POST">
	        <h3 class="form-signin-heading">¿Ya eres usuario? <small>
			   <a href="#" class="btn btn-sm disabled"><i>Usuario nuevo</i></a></small>
		   </h3>
		   <small class="lead text-muted">Ingresa para enviar tu pedido</small><br><br><br>
			<div class="form-group">
		   		<input class="form-control" type="text" name="usuario" placeholder="Introduce tu nombre de usuario">
			</div>
			<div class="form-group">
	   		  	<input class="form-control" type="text" name="clave" placeholder="Introduce tu contraseña"> <label>
			</div>
	        <!--<div class="checkbox">
	   		  <input type="text" name="usuario" placeholder="Introduce tu nombre de usuario">
	   		  <input type="text" name="clave" placeholder="Introduce tu contraseña"> <label>
	            <input type="checkbox" value="recordar"> Mantener la sesión iniciada
	          </label>
			</div>-->
	        <button class="btn btn-info
		    btn-block" type="submit">Enviar</button>
	</form>
</section>

</div>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
</body>
</html>
