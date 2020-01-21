<?php
	error_reporting(E_ERROR);
	include_once('views/head.php');
?>


<section id="clientes">
	<div class="col-xs-110 col-sm-110 col-md-100 col-lg-100 well">
		<table style="width:100%">
			<tr>
				<td style="width:30%" valign="top">
					<fieldset>
						<legend >ABM Clientes</legend>
						<form id="form_cliente">
							<table>
								<tr>
									<td><b>Nombre Cliente*:</b></td>
									<td><input type="text" name="nombres" ></td>
								</tr>
								<tr>
									<td><b>Direcci&oacute;n:</b></td>
									<td><input type="text" name="dir" ></td>
								</tr>
								<tr>
									<td><b>Telef&oacute;no:</b></td>
									<td><input type="text" name="tel" ></td>
								</tr>
								<tr>
									<td><b>Fecha:</b></td>
									<td> <input type="date" name="fecha" id="fecha" value="<?php echo date("Y-m-d");?>"> </td>
								</tr>
							</table>
							<br>
							

							<input type="button" value="Guardar" onclick="editar_cliente();" />
                            <input type="button" value="volver" onclick="volver();" />
                            
							<td style="width:20%" valign="top">
							<br>

							<br>
								<table>
									<tr>
										<td>Receta DR</td>
										<td><input type="text" name="Receta"></td>
									</tr>
									<tr>
										<td>Detalle:</td>
										<td><input type="text" name="Detalle"></td>
									</tr>								
								</table>
								<br>
								<br>
								<table>
									<tr>
										<td>Total</td>
										<td><input type="number" name="Total"></td>
									</tr>
									<tr>
										<td>Seña:</td>
										<td><input type="number" name="Senia"></td>
									</tr>
									<tr>
										<td>Saldo:</td>
										<td><input type="number" name="Saldo"></td>
									</tr>								
								</table>
							</td>
						</form>
					</fieldset>
				</td>
	      <!-- ______________________________Zona de filtro______________________________ -->

	    </tr>

	  </table>


		<div class="col-xs-100 col-sm-12 col-md-12 col-lg-100" id="mensaje" align="center"></div>
	</div>
</section>
<script type="text/javascript">
	// funcion que se inicia luego de cargar la pagina
	$(function () {
		'<?php $num = $_GET['num']; ?>';
		var num = '<?php echo $num; ?>';
        editar_nombres(num);
    })
</script>