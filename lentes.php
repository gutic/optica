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
						<legend>Info Cliente</legend>
						<form id="form_cliente">
							<table border="1">
								<tr>
									<td ><b>Nombre Cliente*: &nbsp;&nbsp;&nbsp;&nbsp;   </b></td>
									<td id="nombre" width=80%></td>
								</tr>
								<tr>
									<td><b>Direcci&oacute;n:</b></td>
									<td id="dire"></td>
								</tr>
								<tr>
									<td><b>Telef&oacute;no:</b></td>
									<td id="tel"></td>
								</tr>
								<tr>
									<td><b>Fecha:</b></td>
									<td id="fecha">  </td>
								</tr>
							</table>
							<br>
							<table border="1">
								<tr>
									<td><b> <br> LEJOS</b> &nbsp;&nbsp;&nbsp;&nbsp; </td>
								</tr>
								<tr>
								</tr>
								<tr>
									<td><b>Derecho</b></td>
								</tr>
								<tr>
									<td>O. Esf &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td id="L_Desf" width=80%></td>
								</tr>
								<tr>
									<td>O. Cil</td>
									<td id="L_Dcil"></td>
								</tr>
								<tr>
									<td>En</td>
									<td id="L_Den"></td>
								</tr>
								<tr>
									<td>Tipo Cristal &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td id="L_DTipoCristal"></td>
								</tr>
								<tr><td><b>Izquierdo</b></td>
								</tr>
								<tr>
									<td>O. Esf</td>
									<td id="L_Iesf"></td>
								</tr>
								<tr>
									<td>O. Cil</td>
									<td id="L_Icil"></td>
								</tr>
								<tr>
									<td>En</td>
									<td id="L_Ien"></td>
								</tr>
								<tr>
									<td>Tipo Cristal</td>
									<td id="L_ITipoCristal"></td>
								</tr>
							</table>
							<br>
							<br>
							<input type="button" value="Anterior" onclick="anterior();" />
							<input type="button" value="Siguiente"  onclick="escribir_cliente();" />
							<td style="width:20%" valign="top">
							<br>
							<table border="1">
								<tr>
									<td><b> <br> CERCA&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
								</tr>
								<tr>
								</tr>
								<tr>
									<td><b>Derecho</b></td>
								</tr>
								<tr>
									<td>O. Esf</td>
									<td id="C_Desf" width=80%></td>
								</tr>
								<tr>
									<td>O. Cil</td>
									<td id="C_Dcil"></td>
								</tr>
								<tr>
									<td>En</td>
									<td id="C_Den"></td>
								</tr>
								<tr>
									<td>Tipo Cristal &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td id="C_DTipoCristal"></td>
								</tr>
								<tr><td><b>Izquierdo</b></td>
								</tr>
								<tr>
									<td>O. Esf</td>
									<td id="C_Iesf"></td>
								</tr>
								<tr>
									<td>O. Cil</td>
									<td id="C_Icil"></td>
								</tr>
								<tr>
									<td>En</td>
									<td id="C_Ien"></td>
								</tr>
								<tr>
									<td>Tipo Cristal</td>
									<td id="C_ITipoCristal"></td>
								</tr>
							</table>
							<br>
							<br>
								<table border="1">
									<tr>
										<td>Receta DR &nbsp;&nbsp;&nbsp;&nbsp; </td>
										<td id="Receta" width=80%></td>
									</tr>
									<tr>
										<td>Detalle:</td>
										<td id="Detalle"></td>
									</tr>								
								</table>
								<br>
								<br>
								<table border="1" >
									<tr>
										<td>Total &nbsp;&nbsp;&nbsp;&nbsp;</td>
										<td id="Total" width=80%></td>
									</tr>
									<tr>
										<td>Seña: &nbsp;&nbsp;&nbsp;&nbsp;</td>
										<td id="Senia"></td>
									</tr>
									<tr>
										<td>Saldo: &nbsp;&nbsp;&nbsp;&nbsp;</td>
										<td id="Saldo"></td>
									</tr>								
								</table>
							</td>
						</form>
					</fieldset>
				</td>
			</tr>
		</table>
	</div>
</section>


<script type="text/javascript">
	// funcion que se inicia luego de cargar la pagina
	$(function () {
		'<?php $num = $_GET['num']; ?>';
		var num = '<?php echo $num; ?>';
		escribir_cliente(num);
    })
</script>