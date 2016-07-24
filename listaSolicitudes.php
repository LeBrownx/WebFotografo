<?php

  //Conexion a BD
  $conexion = mysql_connect('', 'root', '')  or die('No se pudo conectar: ' . mysql_error());
  echo "Conexion Exitosa ";

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
          <?php echo $row[0]," ",$row[1]," ",$row[2],$row[3]," ",$row[4],$row[5]," ",$row[6]," ",$row[7]?>
          <form class="" action="id.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row[0] ?>">
            <button type="submit" name="button">Mas</button>
          </form>
        </td>
      </tr>
      <?php } ?>
    </table>
  </body>
</html>
