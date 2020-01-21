var id_editar = 0
var elaborado = 0
var id_ = 0;

function limpiar()
{
	$("#form_prove [type='text']").val("")//limpiar formulario (todos los  type="text")
	$("#form_prove select").val(0)//loimpiar select de los formulario
  $("#form_cliente [type='text']").val("")//limpiar formulario (todos los  type="text")
	$("#form_articulo [type='text']").val("")
	$("#form_receta [type='text']").val("")
}


//_______________________________________CLIENTE__________________________________________

//=============DATA TABLE =====================

function buscar_cliente(){

	$.ajax({
		type: "POST",
		data: {
			"boton":"buscar_cliente",
		},
		url: "php/altas_bajas.php",
		dataType: "json",
		cache: false,
		success: function(resp) {
      console.log(resp);
      datos = eval(resp);
			var table = $("#busco_cliente").DataTable();
			for (var i = 0; i < resp.length; i++) {
        table.row.add([resp[i].Nombres, resp[i].Tel, resp[i].Direccion, resp[i].Fecha, 
          '<button class="btn btn-success btn-sm" onclick=ver_cliente('+i+')>Ver</button>',
          '<button class="btn btn-success btn-sm" onclick=editar_todo('+i+')>Prestaciones</button> <button class="btn btn-success btn-sm" onclick=paginaEditar('+i+')>Cliente</button>',
          '<button class="btn btn-success btn-sm" onclick=eliminar_cliente('+resp[i].Id+')>Eliminar</button>']).draw();
			}
		}
	});
}

function validarDatosCliente(){
	if($.trim($("[name='nombres']").val()) == "")return false;
	return true;
}
function guardar_cliente(){
  if(validarDatosCliente()){
    var data_form = $("#form_cliente").serialize()//esta funcion ya arma la cadena para enviar
    if(id_editar == 0){
      $.ajax({
      type: "POST",
      url: "php/altas_bajas.php",
      data: "boton=insertar_cliente&"+data_form
      }).done(function( msg ) {
          alert(msg);
          volver();
      });
    }else{
      $.ajax({
      type: "POST",
      url: "php/altas_bajas.php",
      data: "boton=upd_cliente&"+data_form+"&id="+id_editar
      }).done(function( msg ) {
          alert(msg);
          id_editar = 0;
          volver();
      });
    }
  }else{
    alert("Complete todos los datos");
  }
}
function editar_todo(i){
  id_editar = datos[i]["Id"];
  $.ajax({
    type: "POST",
    url: "php/altas_bajas.php",
    data: "boton=buscar_movimientos&"+"&id="+id_editar
    }).done(function( resp ) {
      dato = eval(resp);
        $("[name='C_Desf']").val(dato[0]["Es"]);
        $("[name='C_Dcil']").val(dato[0]["Cil"]);
        $("[name='C_Den']").val(dato[0]["Grado"]);
        $("[name='C_DTipoCristal']").val(dato[0]["Tipo"]);
        $("[name='C_Iesf']").val(dato[0]["I_es"]);
        $("[name='C_Icil']").val(dato[0]["I_cil"]);
        $("[name='C_Ien']").val(dato[0]["I_grado"]);
        $("[name='C_ITipoCristal']").val(dato[0]["I_tipo"]);

        $("[name='L_Desf']").val(dato[1]["Es"]);
        $("[name='L_Dcil']").val(dato[1]["Cil"]);
        $("[name='L_Den']").val(dato[1]["Grado"]);
        $("[name='L_DTipoCristal']").val(dato[1]["Tipo"]);
        $("[name='L_Iesf']").val(dato[1]["I_es"]);
        $("[name='L_Icil']").val(dato[1]["I_cil"]);
        $("[name='L_Ien']").val(dato[1]["I_grado"]);
        $("[name='L_ITipoCristal']").val(dato[1]["I_tipo"]);
        // buscar_prove();
        // id_editar = 0;
    });

  $("[name='nombres']").val(datos[i].Nombres);
  $("[name='dir']").val(datos[i].Direccion);
  $("[name='tel']").val(datos[i].Tel);
  $("[name='Receta']").val(datos[i].Receta);
  $("[name='Detalle']").val(datos[i].Detalle);
  $("[name='Total']").val(datos[i].Total);
  $("[name='Senia']").val(datos[i].Senia);
  $("[name='Saldo']").val(datos[i].Saldo);


  var fecha = new Date(); //Fecha actual
  var mes = fecha.getMonth()+1; //obteniendo mes
  var dia = fecha.getDate(); //obteniendo dia
  var ano = fecha.getFullYear(); //obteniendo año
  if(dia<10)
    dia='0'+dia; //agrega cero si el menor de 10
  if(mes<10)
    mes='0'+mes //agrega cero si el menor de 10
  document.getElementById('fecha').value=ano+"-"+mes+"-"+dia;

}
function ver_cliente(i){
  id = datos[i]["Id"];
  //alert(id);
	window.open(
	'lentes.php?num='+id,
	'_blank' // <- This is what makes it open in a new window.
  );
}

function paginaEditar(i){
  id = datos[i]["Id"];

  window.location="cliente.php?num="+id;
}

function editar_nombres(i){

  id_editar = i;
  
  $.ajax({
    type: "POST",
    url: "php/altas_bajas.php",
    data: "boton=buscar_nombres&"+"&id="+id_editar
    }).done(function( resp ) {
      dato = eval(resp);
      $("[name='nombres']").val(dato[0].Nombres);
      $("[name='dir']").val(dato[0].Direccion);
      $("[name='tel']").val(dato[0].Tel);
      $("[name='Receta']").val(dato[0].Receta);
      $("[name='Detalle']").val(dato[0].Detalle);
      $("[name='Total']").val(dato[0].Total);
      $("[name='Senia']").val(dato[0].Senia);
      $("[name='Saldo']").val(dato[0].Saldo);
    });

  var fecha = new Date(); //Fecha actual
  var mes = fecha.getMonth()+1; //obteniendo mes
  var dia = fecha.getDate(); //obteniendo dia
  var ano = fecha.getFullYear(); //obteniendo año
  if(dia<10)
    dia='0'+dia; //agrega cero si el menor de 10
  if(mes<10)
    mes='0'+mes //agrega cero si el menor de 10
  document.getElementById('fecha').value=ano+"-"+mes+"-"+dia;

}

function eliminar_cliente(i){
  var statusConfirm = confirm("¿Realmente desea eliminar este Cliente?");
    if (statusConfirm == true)
      {
        alert ("Eliminado");
        var eliminar = i;
        $.ajax({
        type: "POST",
        url: "php/altas_bajas.php",
        data: "id="+eliminar+"&boton=del_usuario"
        }).done(function( msg ) {
            limpiar();
            var table = $("#busco_cliente").DataTable();
            table.clear();
            buscar_cliente();
        });
      }
    else
      {
        alert("No se eliminó");
      }
}

function escribir_cliente(i){
  var num = i;
  
  if (num == null){
    num = id_;
  }else{
    id_ = i;
  }

  $.ajax({
    url:'php/altas_bajas.php',
		type:'POST',
		data: 'num='+num+"&boton=escribir"
  }).done(function( resp ) {
    dato = eval(resp);
    var listado = "";
    listado = dato[0]["Nombres"];
    $("#nombre").html(listado);
    listado = dato[0]["Direccion"];
    $("#dire").html(listado);
    listado = dato[0]["Tel"];
    $("#tel").html(listado);
    listado = dato[0]["Fecha"];
    $("#fecha").html(listado);

    //Cerca
    //derecha
    listado = dato[1]["Es"];
    $("#C_Desf").html(listado);
    listado = dato[1]["Cil"];
    $("#C_Dcil").html(listado);
    listado = dato[1]["Grado"];
    $("#C_Den").html(listado);
    listado = dato[1]["Tipo"];
    $("#C_DTipoCristal").html(listado);
    //Cerca
    //izquierda
    listado = dato[1]["I_es"];
    $("#C_Iesf").html(listado);
    listado = dato[1]["I_cil"];
    $("#C_Icil").html(listado);
    listado = dato[1]["I_grado"];
    $("#C_Ien").html(listado);
    listado = dato[1]["I_tipo"];
    $("#C_ITipoCristal").html(listado);

        //lejos
    //derecha
    listado = dato[2]["Es"];
    $("#L_Desf").html(listado);
    listado = dato[2]["Cil"];
    $("#L_Dcil").html(listado);
    listado = dato[2]["Grado"];
    $("#L_Den").html(listado);
    listado = dato[2]["Tipo"];
    $("#L_DTipoCristal").html(listado);
    //Cerca
    //izquierda
    listado = dato[2]["I_es"];
    $("#L_Iesf").html(listado);
    listado = dato[2]["I_cil"];
    $("#L_Icil").html(listado);
    listado = dato[2]["I_grado"];
    $("#L_Ien").html(listado);
    listado = dato[2]["I_tipo"];
    $("#L_ITipoCristal").html(listado);

    //PIE
    listado = dato[0]["Receta"];
    $("#Receta").html(listado);
    listado = dato[0]["Detalle"];
    $("#Detalle").html(listado);
    
    listado = dato[0]["Total"];
    $("#Total").html(listado);
    listado = dato[0]["Senia"];
    $("#Senia").html(listado);
    listado = dato[0]["Saldo"];
    $("#Saldo").html(listado);
  });
}

function anterior(){
  $.ajax({
    url:'php/altas_bajas.php',
		type:'POST',
		data: 'num='+id_+"&boton=anterior"
  }).done(function( resp ) {
    dato = eval(resp);
    if(dato == 1){
      alert("No existe registro anterior");
    }else{
      //Cerca
      //derecha
      listado = dato[0]["Es"];
      $("#C_Desf").html(listado);
      listado = dato[0]["Cil"];
      $("#C_Dcil").html(listado);
      listado = dato[0]["Grado"];
      $("#C_Den").html(listado);
      listado = dato[0]["Tipo"];
      $("#C_DTipoCristal").html(listado);
      //Cerca
      //izquierda
      listado = dato[0]["I_es"];
      $("#C_Iesf").html(listado);
      listado = dato[0]["I_cil"];
      $("#C_Icil").html(listado);
      listado = dato[0]["I_grado"];
      $("#C_Ien").html(listado);
      listado = dato[0]["I_tipo"];
      $("#C_ITipoCristal").html(listado);
  
      //lejos
      //derecha
      listado = dato[1]["Es"];
      $("#L_Desf").html(listado);
      listado = dato[1]["Cil"];
      $("#L_Dcil").html(listado);
      listado = dato[1]["Grado"];
      $("#L_Den").html(listado);
      listado = dato[1]["Tipo"];
      $("#L_DTipoCristal").html(listado);
      //Cerca
      //izquierda
      listado = dato[1]["I_es"];
      $("#L_Iesf").html(listado);
      listado = dato[1]["I_cil"];
      $("#L_Icil").html(listado);
      listado = dato[1]["I_grado"];
      $("#L_Ien").html(listado);
      listado = dato[1]["I_tipo"];
      $("#L_ITipoCristal").html(listado);
    }


  });
}
function editar_cliente(){
  if(validarDatosCliente()){
    var data_form = $("#form_cliente").serialize()//esta funcion ya arma la cadena para enviar
      $.ajax({
      type: "POST",
      url: "php/altas_bajas.php",
      data: "boton=editar_cliente&"+data_form+"&id="+id_editar
      }).done(function( msg ) {
          volver();
      });
  }else{
    alert("Complete todos los datos");
  } 
}

function volver(){
  window.location="abm.php";
}