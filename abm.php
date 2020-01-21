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
							<table>
								<tr>
									<td><b> <br> LEJOS</b> </td>
								</tr>
								<tr>
								</tr>
								<tr>
									<td><b>Derecho</b></td>
								</tr>
								<tr>
									<td>O. Esf</td>
									<td><input type="text" name="L_Desf"></td>
								</tr>
								<tr>
									<td>O. Cil</td>
									<td><input type="text" name="L_Dcil"></td>
								</tr>
								<tr>
									<td>En</td>
									<td><input type="text" name="L_Den"></td>
								</tr>
								<tr>
									<td>Tipo Cristal</td>
									<td><input type="text" name="L_DTipoCristal"></td>
								</tr>
								<tr><td><b>Izquierdo</b></td>
								</tr>
								<tr>
									<td>O. Esf</td>
									<td><input type="text" name="L_Iesf"></td>
								</tr>
								<tr>
									<td>O. Cil</td>
									<td><input type="text" name="L_Icil"></td>
								</tr>
								<tr>
									<td>En</td>
									<td><input type="text" name="L_Ien"></td>
								</tr>
								<tr>
									<td>Tipo Cristal</td>
									<td><input type="text" name="L_ITipoCristal"></td>
								</tr>
							</table>
							<br>
							<br>

							<input type="button" value="Guardar" onclick="guardar_cliente();" />
							<input type="button" value="Limpiar"  onclick="limpiar();" />

							<td style="width:20%" valign="top">
							<br>
							<table>
								<tr>
									<td><b> <br> CERCA</b> </td>
								</tr>
								<tr>
								</tr>
								<tr>
									<td><b>Derecho</b></td>
								</tr>
								<tr>
									<td>O. Esf</td>
									<td><input type="text" name="C_Desf"></td>
								</tr>
								<tr>
									<td>O. Cil</td>
									<td><input type="text" name="C_Dcil"></td>
								</tr>
								<tr>
									<td>En</td>
									<td><input type="text" name="C_Den"></td>
								</tr>
								<tr>
									<td>Tipo Cristal</td>
									<td><input type="text" name="C_DTipoCristal"></td>
								</tr>
								<tr><td><b>Izquierdo</b></td>
								</tr>
								<tr>
									<td>O. Esf</td>
									<td><input type="text" name="C_Iesf"></td>
								</tr>
								<tr>
									<td>O. Cil</td>
									<td><input type="text" name="C_Icil"></td>
								</tr>
								<tr>
									<td>En</td>
									<td><input type="text" name="C_Ien"></td>
								</tr>
								<tr>
									<td>Tipo Cristal</td>
									<td><input type="text" name="C_ITipoCristal"></td>
								</tr>
							</table>
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
	       <td style="width:50%" valign="top">
					 <fieldset>
						 <legend >Buscar Cliente</legend>
						 <!-- <table>
							 <tr>
								 <td><input type="button" value="Buscar Cliente"  onclick="buscar_cliente();" /></td>
							 </tr>
					 	 </table> -->
				 <table id="busco_cliente" class="datatables" border="1" style="width:100%">
				 	<thead>
					 <tr>
						<th>Nombre</th>
						<th>telefono</th>
						<th>dirección</th>
						<th>Fecha</th>
						<th>   Ver   </th>
						<th>Modificar</th>
						<th>eliminar</th>
					 </thead>
					 </tr>
				 </table>
			 </form>
		 </fieldset>
	      </td>
	    </tr>

	  </table>


		<div class="col-xs-100 col-sm-12 col-md-12 col-lg-100" id="mensaje" align="center"></div>
	</div>
</section>
<script type="text/javascript">
	// funcion que se inicia luego de cargar la pagina
	$(function () {
		buscar_cliente();
	})
</script>

