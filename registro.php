<?php
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $place = $_POST['place'];
    $phone = $_POST['phone'];
    $archivo = $_FILES["archivo"]["tmp_name"]; 
    $tamanio = $_FILES["archivo"]["size"];
    $tipo    = $_FILES["archivo"]["type"];    
    $nombre  = $_FILES["archivo"]["name"];
    //echo $nombre."nombre". $archivo."<-ruta" . $tamanio."<-tamaño" . $tipo."<-tipo";
    //echo $name . $lastname . $address;
    //echo $email . $birthday . $place . $phone;
    //echo $archivo;
        $conn = mysql_connect('localhost','root','root');
        mysql_select_db('analisis');

        if ( $archivo != "none" ){
            $fp = fopen($archivo, "rb");
            $contenido = fread($fp, $tamanio);
            $contenido = addslashes($contenido);
            fclose($fp); 
            $sql = "INSERT INTO solicitudes(nombre,apellidos,direccion,correo,fecha,lugar,telefono) VALUES ('$name','$lastname','$address','$email','$birthday','$place','$phone')";//Se insertan los datos a la base de datos y el usuario ya fue registrado con exito.
            mysql_query($sql);

            $result = mysql_query("SELECT id_solicitud FROM solicitudes WHERE nombre = '$name' AND correo = '$email' AND telefono = '$phone'");
            
            while ($fila = mysql_fetch_assoc($result)) {
                $id = $fila['id_solicitud'];
            }

            $qry = "INSERT INTO scan (id_solicitud, archivo, tipo_imagen) VALUES ('$id', '$contenido', '$tipo')";
            mysql_query($qry);

            if(mysql_affected_rows() > 0){
                echo '<script language="javascript">alert("Usuario Registrado");</script> ';
                echo "<script>location.href='registro.html'</script>";
            }
            
            else{
                echo '<script language="javascript">alert("NO se ha podido guardar el archivo en la base de datos.");</script> ';
                echo "<script>location.href='registro.html'</script>";
            }
        }
        else{
            echo '<script language="javascript">alert("No se ha podido subir el archivo al servidor");</script> ';
            echo "<script>location.href='registro.html'</script>";
        }
        //header("Location: registro.html");   
?>