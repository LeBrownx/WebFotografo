<?php
	$name = $_POST['name'];
	$lastname = $_POST['lastname'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$birthday = $_POST['birthday'];
	$place = $_POST['place'];
    $phone = $_POST['phone'];
    $archivo = !empty($_POST['archivo']);
    echo $name . $lastname . $address;
    echo $email . $birthday . $place . $phone;
    echo $archivo;

    mysql_connect('localhost','root','root')
	or die("Error al conectar " . mysql_error());
    mysql_select_db('proyecto') //aca era proyecto
	or die ("Error al seleccionar la Base de datos: " . mysql_error());

		$sql = "INSERT INTO usuarios(NOMBRE,APELLIDOS,DIRECCION,CORREO,FECHA,LUGAR,TELEFONO) VALUES ('$usuario','$pass','$name','$lastname','$address','$email','$birthday','$place','$phone')";//Se insertan los datos a la base de datos y el usuario ya fue registrado con exito.
        mysql_query($sql);
         echo '<script language="javascript">alert("Usuario Registrado");</script> ';
        echo "<script>location.href='login.html'</script>";
?>
