<!DOCTYPE html> 
<html>
	<head>
		<title>Escuelita Magica</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	</head>

<body>
	 
	<div id="div1" >
		<div id="div2">

			<div id="nav_wrapper">
				<head><h1>Escuela Magica</h1></head>
				<ul>
					<li><a href="#" class="active">Inicio</a></li>
					<li><a href="#">Nuestros Objetivos</a></li>
					<li><a href="#">Encuentranos</a></li>
					<li><a href="">Más</a>

						<ul>
							<li><a href="#" class="active1">Galeria</a></li>
							<li><a href="#">Horarios</a></li>
							<li><a href="#">Iniciar Sesion</a></li>				
						</ul>
					</li>
				</ul>

			</div>

		</div>
<div class="col-md-4">

    <center><h1>PROPIETARIO</h1></center>

    <form method="POST" action="index.php" >

    <div class="form-group">
      <label for="ID">ID</label>
      <input type="text" name="id" class="form-control" id="id">
    </div>
    <br>
    <div class="form-group">
        <label for="marca">Marca</label>
        <input type="text" name="marca" class="form-control" id="marca" >
    </div>
    <br>
    <div class="form-group">
        <label for="precio">Precio</label>
        <input type="text" name="precio" class="form-control" id="precio">
    </div>
    <br>
    <div class="form-group">
        <label for="unidades">Unidades</label>
        <input type="text" name="unidades" class="form-control" id="unidades">
    </div>
    <br>
    <center>
      <input type="submit" value="Registrar" class="btn btn-success" name="btn_registrar">
      <input type="submit" value="Consultar" class="btn btn-primary" name="btn_consultar">
      <input type="submit" value="Actualizar" class="btn btn-info" name="btn_actualizar">
      <input type="submit" value="Eliminar" class="btn btn-danger" name="btn_eliminar">
    </center>

  </form>
  <?php
    include("BD.php");

      if(isset($_POST['btn_registrar']))
      {
	      $id   	 =$_POST['id'];
	      $marca     =$_POST['marca'];
	      $precio    =$_POST['precio'];
	      $unidades  =$_POST['unidades'];
	     	 if($id=="" || $marca=="" || $precio=="" || $unidades=="")
      		{
      				echo "Llene todos los espacios";
     			 }
     			 else
     			 {
     		 		mysqli_query($conexion, "INSERT INTO productos (ID,Marca,Precio,Unidades) values ('$id','$marca','$precio','$unidades')");
      				echo "Se ha agredado correctamente el registro";
      				mysql_close($conexion);
     			 }
    		}
     
      if(isset($_POST['btn_consultar']))
      {
	       $id 		  = $_POST['id'];
	       $marca     =$_POST['marca'];
		   $precio    =$_POST['precio'];
		   $unidades  =$_POST['unidades'];
	       
	       	if ($id=="") 
	       	{
	       		echo "Se debe de colocar el ID";
	       	}
	       	else
	       	{
	       		$resultados = mysqli_query($conexion,"SELECT * FROM productos WHERE ID = '$id'");
	  			while($consulta = mysqli_fetch_array($resultados))
  				{
		    		echo $consulta['ID']."<br>";
		    		echo $consulta['Marca']."<br>";
		    		echo $consulta['Precio']."<br>";
		    		echo $consulta['Unidades']."<br>";
		  		}
	       	}
     

      }

      if(isset($_POST['btn_actualizar']))
      {
	      $id   	 =$_POST['id'];
	      $marca     =$_POST['marca'];
	      $precio    =$_POST['precio'];
	      $unidades  =$_POST['unidades'];
	     	 if($id=="" || $marca=="" || $precio=="" || $unidades=="")
      		{
      			echo "Llene todos los espacios";
     		}
     		else
     		{
     		 	$_UPDATE_SQL="UPDATE productos Set ID='$id', Marca='$marca', Precio='$precio', Unidades='$unidades' WHERE ID='$id'"; 
  				mysqli_query($conexion,$_UPDATE_SQL); 
      			echo "Se ha Actualizado correctamente";
     		}
      }

      if(isset($_POST['btn_eliminar']))
      {
        $id = $_POST['id'];
        if($id=="")
        {
        	echo "El campo ID es obligatorio";
        }
        else
        {
        	$_DELETE_SQL =  "DELETE FROM productos WHERE ID = '$id'";
  			mysqli_query($conexion,$_DELETE_SQL); 
  			echo "Se ha eliminado el registro";
 				
        }

        
      }

   
  ?>
</div>


</div>
		
</body>
</html>