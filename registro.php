<?php
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $place = $_POST['place'];
    $phone = $_POST['phone'];
    $archivo = !empty($_FILES['archivo']);
    //echo $name . $lastname . $address;
    //echo $email . $birthday . $place . $phone;
    //echo $archivo;
    if ( !isset($_FILES["archivo"]) || $_FILES["archivo"]["error"] > 0){
        echo "ha ocurrido un error";
    }
    else{
        mysql_connect('localhost','root','root')
        or die("Error al conectar " . mysql_error());
        mysql_select_db('analisis') //aca era proyecto
        or die ("Error al seleccionar la Base de datos: " . mysql_error());

            $permitidos = array(".pdf");
            $limite_kb = 16384;
            if (in_array($_FILES['archivo']['type'], $permitidos) && $_FILES['archivo']['size'] <= $limite_kb * 1024){                

            $sql = "INSERT INTO solicitudes(nombre,apellidos,direccion,correo,fecha,lugar,telefono) VALUES ('$name','$lastname','$address','$email','$birthday','$place','$phone')";//Se insertan los datos a la base de datos y el usuario ya fue registrado con exito.
            mysql_query($sql);
            //este es el archivo temporal
            $imagen_temporal  = $_FILES['archivo']['tmp_name'];
            //este es el tipo de archivo
            $tipo = $_FILES['archivo']['type'];
            //leer el archivo temporal en binario
                    $fp     = fopen($imagen_temporal, 'r+b');
                    $data = fread($fp, filesize($imagen_temporal));
                    fclose($fp);
                    //escapar los caracteres
                    $data = mysql_escape_string($data);
            $link = mysql_connect('localhost', 'root','root'); 
            mysql_select_db('solicitudes', $link); 
            $result = mysql_query("SELECT id_solicitud FROM solicitudes WHERE nombre = '$name' AND correo = '$email' AND telefono = '$phone'", $link);
            $resultado = mysql_query("INSERT INTO scan (id_solicitud, archivo, tipo_imagen) VALUES ('$result', $data', '$tipo')") ;

            if ($resultado){                
                echo '<script language="javascript">alert("Usuario Registrado");</script> ';
            } else {
                echo '<script language="javascript">alert("ocurrio un error al copiar el archivo.");</script> ';
            }
        } else {
            echo '<script language="javascript">alert("archivo no permitido, es tipo de archivo prohibido o excede el tamaño de $limite_kb Kilobytes");</script> ';
        }
                echo "<script>location.href='registro.html'</script>";
        }
?>