<?php
  require("../config/config.php");
  $boton = $_POST['boton'];

  switch ($boton) {
  //ABM Clientes //
    case 'insertar_cliente':
      $nombres = $_POST["nombres"];
      $dir = $_POST["dir"];
      $tel = $_POST["tel"];
      $fecha = $_POST["fecha"];
      $receta = $_POST["Receta"]; 
      $detalle = $_POST["Detalle"];
      $total = $_POST["Total"];
      $senia = $_POST["Senia"];
      $saldo = $_POST["Saldo"];
      
      //cerca

      //der
      $C_Desf = $_POST["C_Desf"];
      $C_Dcil = $_POST["C_Dcil"];
      $C_Den = $_POST["C_Den"];
      $C_DTipoCristal = $_POST["C_DTipoCristal"];
      //izq
      $C_Iesf = $_POST["C_Iesf"];
      $C_Icil = $_POST["C_Icil"];
      $C_Ien = $_POST["C_Ien"];
      $C_ITipoCristal = $_POST["C_ITipoCristal"];

      //lejos

      //der
      $L_Desf = $_POST["L_Desf"];
      $L_Dcil = $_POST["L_Dcil"];
      $L_Den = $_POST["L_Den"];
      $L_DTipoCristal = $_POST["L_DTipoCristal"];
      //izq
      $L_Iesf = $_POST["L_Iesf"];
      $L_Icil = $_POST["L_Icil"];
      $L_Ien = $_POST["L_Ien"];
      $L_ITipoCristal = $_POST["L_ITipoCristal"];
      
      $registros=mysqli_query($conexion,"SELECT MAX(Id) FROM cliente;") or
      die("Problemas en el select:".mysqli_error($conexion));
      $id=mysqli_fetch_array($registros);
      $id_cliente = $id[0];
      

      mysqli_query($conexion,"INSERT INTO cliente(Nombres, Direccion, Tel, fecha, Receta, Detalle, 
      Total, Senia, Saldo)
      VALUES('$nombres', '$dir', '$tel', '$fecha','$receta','$detalle','$total','$senia','$saldo')") or
      die("Problemas en insertar cliente:".mysqli_error($conexion));
      
      $registros=mysqli_query($conexion,"SELECT MAX(Id) FROM cliente;") or
      die("Problemas en el select:".mysqli_error($conexion));
      $id=mysqli_fetch_array($registros);
      $id_cliente = $id[0];

      mysqli_query($conexion,"INSERT INTO cerca(Id_Cliente, Es, Cil, Grado, Tipo, I_es, I_cil, I_grado, I_tipo)
      VALUES('$id_cliente','$C_Desf','$C_Dcil','$C_Den','$C_DTipoCristal','$C_Iesf','$C_Icil','$C_Ien','$C_ITipoCristal')") or
      die("Problemas en insertar cliente: cerca ".mysqli_error($conexion));
      
      mysqli_query($conexion,"INSERT INTO lejos(Id_Cliente, Es, Cil, Grado, Tipo, I_es, I_cil, I_grado, I_tipo)
      VALUES('$id_cliente','$L_Desf','$L_Dcil','$L_Den','$L_DTipoCristal','$L_Iesf','$L_Icil','$L_Ien','$L_ITipoCristal')") or
      die("Problemas en insertar cliente: lejos ".mysqli_error($conexion));
      
      echo "ok";
      break;
    case 'buscar_cliente':
      $consulta = $_POST['consulta'];
      $salida ="";
      	$query = "SELECT * FROM cliente WHERE activo ='1'";
      $resultado = $conexion -> query($query);
      if($resultado->num_rows > 0){
        while ($reg = mysqli_fetch_assoc($resultado)) {
          $data[] = $reg;
        }
        echo json_encode($data);
      }else{
      	echo 0;
      }
      break;
    case 'upd_cliente':
      $id = $_POST["id"];

      $nombres = $_POST["nombres"];
      $dir = $_POST["dir"];
      $tel = $_POST["tel"];
      $fecha = $_POST["fecha"];
      $receta = $_POST["Receta"]; 
      $detalle = $_POST["Detalle"];
      $total = $_POST["Total"];
      $senia = $_POST["Senia"];
      $saldo = $_POST["Saldo"];

            //cerca

      //der
      $C_Desf = $_POST["C_Desf"];
      $C_Dcil = $_POST["C_Dcil"];
      $C_Den = $_POST["C_Den"];
      $C_DTipoCristal = $_POST["C_DTipoCristal"];
      //izq
      $C_Iesf = $_POST["C_Iesf"];
      $C_Icil = $_POST["C_Icil"];
      $C_Ien = $_POST["C_Ien"];
      $C_ITipoCristal = $_POST["C_ITipoCristal"];

      //lejos

      //der
      $L_Desf = $_POST["L_Desf"];
      $L_Dcil = $_POST["L_Dcil"];
      $L_Den = $_POST["L_Den"];
      $L_DTipoCristal = $_POST["L_DTipoCristal"];
      //izq
      $L_Iesf = $_POST["L_Iesf"];
      $L_Icil = $_POST["L_Icil"];
      $L_Ien = $_POST["L_Ien"];
      $L_ITipoCristal = $_POST["L_ITipoCristal"];

      mysqli_query($conexion,"UPDATE cliente SET Nombres = '$nombres', Tel = '$tel', Direccion = '$dir', Fecha = '$fecha', Receta = '$receta',
      Detalle = '$detalle', Total = '$total', Senia = '$senia', Saldo = '$saldo' WHERE Id = '$id';")or
      die("Problemas en el update:".mysqli_error($conexion));
      
      mysqli_query($conexion,"INSERT INTO cerca(Id_Cliente, Es, Cil, Grado, Tipo, I_es, I_cil, I_grado, I_tipo)
      VALUES('$id','$C_Desf','$C_Dcil','$C_Den','$C_DTipoCristal','$C_Iesf','$C_Icil','$C_Ien','$C_ITipoCristal')") or
      die("Problemas en insertar cliente: cerca ".mysqli_error($conexion));
      
      mysqli_query($conexion,"INSERT INTO lejos(Id_Cliente, Es, Cil, Grado, Tipo, I_es, I_cil, I_grado, I_tipo)
      VALUES('$id','$L_Desf','$L_Dcil','$L_Den','$L_DTipoCristal','$L_Iesf','$L_Icil','$L_Ien','$L_ITipoCristal')") or
      die("Problemas en insertar cliente: lejos ".mysqli_error($conexion));
      
      echo "ok";
      break;
    case 'del_usuario':
        $id = $_POST["id"];
        mysqli_query($conexion,"UPDATE Cliente SET activo = 0 WHERE Id = '$id';") or
        die("Problemas en el delete:".mysqli_error($conexion));
        break;
    case 'upd_nombres':
      // $id = $_POST["id"];

      // $nombres = $_POST["nombres"];
      // $dir = $_POST["dir"];
      // $tel = $_POST["tel"];
      // $fecha = $_POST["fecha"];
      // $receta = $_POST["Receta"]; 
      // $detalle = $_POST["Detalle"];
      // $total = $_POST["Total"];
      // $senia = $_POST["Senia"];
      // $saldo = $_POST["Saldo"];

      // mysqli_query($conexion,"UPDATE cliente SET Nombres = '$nombres', Tel = '$tel', Direccion = '$dir', Fecha = '$fecha', Receta = '$receta',
      // Detalle = '$detalle', Total = '$total', Senia = '$senia', Saldo = '$saldo' WHERE Id = '$id';")or
      // die("Problemas en el update:".mysqli_error($conexion));
       break;

    case 'buscar_movimientos':
      $id = $_POST["id"];
      
      $registros=mysqli_query($conexion,"SELECT MAX(c.Id), MAX(l.Id)
      from lejos as l, cerca as c 
      where c.Id_cliente = l.Id_Cliente
      AND c.Id_Cliente = '$id';") or
      die("Problemas en el select:".mysqli_error($conexion));
      $id_mov=mysqli_fetch_array($registros);
      
      // echo $id_mov[0];

      $query = "SELECT * from cerca WHERE Id = '$id_mov[0]'";

      $resultado = $conexion -> query($query);
      if($resultado->num_rows > 0){
        while ($reg = mysqli_fetch_assoc($resultado)) {
          $data[] = $reg;
        }
      }

      $query2 = "SELECT * from lejos WHERE Id = '$id_mov[1]'";

      $resultado = $conexion -> query($query2);
      if($resultado->num_rows > 0){
        while ($reg = mysqli_fetch_assoc($resultado)) {
          $data[] = $reg;
        }
      }

      echo json_encode($data);

    //   while ($reg = mysqli_fetch_assoc($resultado)) {
    //     $data[] = $reg;
    //   }
      break;
    case 'escribir':
      $id = $_POST['num'];
      
      $query1="SELECT * FROM cliente WHERE Id = '$id'";

      $resultado = $conexion -> query($query1);
      if($resultado->num_rows > 0){
        while ($reg = mysqli_fetch_assoc($resultado)) {
          $data[] = $reg;
        }
      }

      $registros=mysqli_query($conexion,"SELECT MAX(c.Id), MAX(l.Id)
      from lejos as l, cerca as c 
      where c.Id_cliente = l.Id_Cliente
      AND c.Id_Cliente = '$id';") or
      die("Problemas en el select:".mysqli_error($conexion));
      $id_mov=mysqli_fetch_array($registros);
      
      // echo $id_mov[0];

      $query = "SELECT * from cerca WHERE Id = '$id_mov[0]'";

      $resultado = $conexion -> query($query);
      if($resultado->num_rows > 0){
        while ($reg = mysqli_fetch_assoc($resultado)) {
          $data[] = $reg;
        }
      }

      $query2 = "SELECT * from lejos WHERE Id = '$id_mov[1]'";

      $resultado = $conexion -> query($query2);
      if($resultado->num_rows > 0){
        while ($reg = mysqli_fetch_assoc($resultado)) {
          $data[] = $reg;
        }
      }
      
      echo json_encode($data);
      break;
    case 'anterior':
      $id = $_POST['num'];
      
      $registro = mysqli_query($conexion,"SELECT count(c.Id) as cuenta
      from lejos as l, cerca as c 
      where c.Id_cliente = l.Id_Cliente
      AND c.Id_Cliente = '$id';")or
      die("Problemas en el select:".mysqli_error($conexion));

      $ant = mysqli_fetch_array($registro);

      if($ant[0] > 1){

        // $registros=mysqli_query($conexion,"SELECT MAX(c.Id), MAX(l.Id)
        // from lejos as l, cerca as c 
        // where c.Id_cliente = l.Id_Cliente
        // AND c.Id_Cliente = '$id';") or
        // die("Problemas en el select:".mysqli_error($conexion));
        // $id_mov=mysqli_fetch_array($registros);
        
        // $cerca = $id_mov[0];

        $reg=mysqli_query($conexion,"SELECT Max(Id) FROM cerca 
        WHERE Id_Cliente = '$id' AND Id != (SELECT MAX(c.Id)
        from lejos as l, cerca as c 
        where c.Id_cliente = l.Id_Cliente
        AND c.Id_Cliente = '$id')")or
        die("Problemas en el select:".mysqli_error($conexion));
        $cid=mysqli_fetch_array($reg);
  
        $query = "SELECT * from cerca WHERE Id = '$cid[0]'";
  
        $resultado = $conexion -> query($query);
        if($resultado->num_rows > 0){
          while ($reg = mysqli_fetch_assoc($resultado)) {
            $data[] = $reg;
          }
        }
        
        $lejos = $id_mov[1];

        $reg2=mysqli_query($conexion,"SELECT Max(Id) FROM lejos WHERE Id_Cliente = '$id' AND Id != (SELECT MAX(l.Id)
        from lejos as l, cerca as c 
        where c.Id_cliente = l.Id_Cliente
        AND l.Id_Cliente = '$id')")or
        die("Problemas en el select:".mysqli_error($conexion));
        $lid=mysqli_fetch_array($reg2);
  
        $query2 = "SELECT * from lejos WHERE Id = '$lid[0]'";
  
        $resultado = $conexion -> query($query2);
        if($resultado->num_rows > 0){
          while ($reg = mysqli_fetch_assoc($resultado)) {
            $data[] = $reg;
          }
        }
        echo json_encode($data);

      }else{
        echo json_encode($ant[0]);
      };


    break;
    case 'buscar_nombres':
      $consulta = $_POST['id'];
      $salida ="";
      	$query = "SELECT * FROM cliente WHERE Id = '$consulta'";
      $resultado = $conexion -> query($query);
      if($resultado->num_rows > 0){
        while ($reg = mysqli_fetch_assoc($resultado)) {
          $data[] = $reg;
        }
        echo json_encode($data);
      }else{
      	echo 0;
      }
      break;
    case 'editar_cliente':
      $id = $_POST["id"];

      $nombres = $_POST["nombres"];
      $dir = $_POST["dir"];
      $tel = $_POST["tel"];
      $fecha = $_POST["fecha"];
      $receta = $_POST["Receta"]; 
      $detalle = $_POST["Detalle"];
      $total = $_POST["Total"];
      $senia = $_POST["Senia"];
      $saldo = $_POST["Saldo"];


      mysqli_query($conexion,"UPDATE cliente SET Nombres = '$nombres', Tel = '$tel', Direccion = '$dir', Fecha = '$fecha', Receta = '$receta',
      Detalle = '$detalle', Total = '$total', Senia = '$senia', Saldo = '$saldo' WHERE Id = '$id';")or
      die("Problemas en el update:".mysqli_error($conexion));
      
      echo "ok";
      break;
  }

 ?>
