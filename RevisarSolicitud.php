<?php 
    if(!empty($_POST['id'])){
        mysql_connect('localhost','root','root')
        or die("Error al conectar " . mysql_error());
        mysql_select_db('analisis') //aca era proyecto
        or die ("Error al seleccionar la Base de datos: " . mysql_error());
        
        $informacion = mysql_query("SELECT * FROM solicitudes WHERE id_solicitud=".$_POST['id']);
        $result = mysql_query("SELECT * FROM scan WHERE id_solicitud=".$_POST['id']);
        $row = mysql_fetch_array($informacion);
        $pdf = mysql_fetch_assoc($result);
       /* header("Content-disposition: attachment; filename=$filename");
        header("Content-length: $size");
        header("Content-type:".$type["tipo_imagen"]."");
        echo $pdf["archivo"];*/
    }        
?>
<!DOCTYPE HTML>
<html>
    <head>
         <link rel="stylesheet" href="notificacion.css" media="screen" title="no title" charset="utf-8">
    </head>
    <body>
        <p>        
            Nombre(s): <?php echo $row[1]; ?> <br>
            Apellidos: <?php echo $row[2]; ?> <br>
            Direccion: <?php echo $row[3]; ?> <br>
            E-mail   : <?php echo $row[4]; ?> <br>
            Fecha de nacimiento: <?php echo $row[5]; ?> <br>
            Lugar de residencia: <?php echo $row[6]; ?> <br>
            Telefono : <?php echo $row[7]; ?> <br>
       
        <form action="notificacion.php" method="POST">
                <input type="hidden" name="nombre" value="<?php echo $row[1] ?>">
                 <input type="hidden" name="apellido" value="<?php echo $row[2] ?>">
                <input type="hidden" name="correo" value="<?php echo $row[4] ?>">
                <input type="submit" name="aceptado" value="ACEPTADO">
                <input type="submit" name="rechazado" value="RECHAZADO">
        </form>
    </p>
    </body>
</html>