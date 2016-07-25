<?php

  //Conexion a BD
  $conexion = mysql_connect('localhost', 'root', 'root')  or die('No se pudo conectar: ' . mysql_error());
  //echo "Conexion Exitosa ";

  //SELECCIONANDO DB
  mysql_select_db('analisis') or die('No se pudo seleccionar la base de datos');
  //CONSULTAS A BASE DE DATOS
  $query = 'SELECT * FROM solicitudes';
  $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
  //IMPRIMIR RESULTADOS
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
     <link rel="stylesheet" href="notificacion.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>SOLICITUDES</h1>
    <table>
      <?php
      //RECORREMOS TODO EL ARREGLO
      while ($row = mysql_fetch_row($result)){
      ?>
      <tr>
        <td>
          <?php echo $row[1]," ",$row[2]?>
          <form class="" action="RevisarSolicitud.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row[0] ?>">
            <button type="submit" name="button">Mas</button>
          </form>
        </td>
      </tr>
      <?php } ?>
    </table>
  </body>
</html>
