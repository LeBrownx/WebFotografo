

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	 <link rel="stylesheet" href="notificacion.css" media="screen" title="no title" charset="utf-8">
</head>
<body>


	<?php 

	$correo = $_POST['correo'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];



	$conn = mysql_connect('localhost','root','root');
	        mysql_select_db('analisis');
	if((isset($_POST['aceptado']) == "ACEPTADO")){
		 $sql = "INSERT INTO respuesta(Nombre,correo,Mensaje) VALUES ('$nombre','$correo','Eres Aceptado para trabajar con nosotros') ";//Se insertan los datos a la base de datos y el usuario ya fue aceptado con exito.
	     mysql_query($sql);?>
	     <h2 id="not">fue aceptado el fotografo : <?php  echo $nombre ."  ". $apellido;?></h2>
	     <?php 
	    
	     
	}
	if((isset($_POST['rechazado']) == "RECHAZADO")){
		 $sql = "INSERT INTO respuesta(Nombre,correo,Mensaje) VALUES ('$nombre','$correo','No Fuiste Aceptado para trabajar con nosotros') ";//Se insertan los datos a la base de datos y el usuario ya fue rechazado con exito.
	     mysql_query($sql);?>
	     <h2 id="not">fue rechazado el fotografo : <?php  echo $nombre ."  ". $apellido;?></h2>
	     <?php 
	    

	}

	?>




	
</body>
</html>