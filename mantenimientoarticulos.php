<!doctype html>
<html>
<head>
  <title>Listado de artículos</title>
  <style>
  .tablalistado {
    border-collapse: collapse;
    box-shadow: 0px 0px 8px #000;
    margin:20px;
  }
  .tablalistado th{  
    border: 1px solid #000;
    padding: 5px;
    background-color:#ffd040;	  
  }  
  .tablalistado td{  
    border: 1px solid #000;
    padding: 5px;
    background-color:#ffdd73;	  
  }
  </style>
  <meta charset="UTF-8">
</head>  
<body>
  
  <?php
  $mysql = new mysqli("localhost", "root", "", "base1");
  if ($mysql->connect_error)
    die("Problemas con la conexión a la base de datos");
  
  $registros = $mysql->query("SELECT 
                                ar.codigo AS codigoart,
                                ar.descripcion AS descripcionart,
                                ar.precio,
                                ru.descripcion AS descripcionrub 
                              FROM articulos AS ar
                              INNER JOIN rubros AS ru 
                                ON ru.codigo = ar.codigorubro") 
                                or die($mysql->error);
	 
  echo '<table class="tablalistado">';
  echo '<tr><th>Código</th><th>Descripción</th><th>Precio</th><th>Rubro</th><th>Borrar</th><th>Modificar</th></tr>';

  while ($reg = $registros->fetch_array()) {
      echo '<tr>';
      echo '<td>' . $reg['codigoart'] . '</td>';
      echo '<td>' . $reg['descripcionart'] . '</td>';
      echo '<td>' . $reg['precio'] . '</td>';
      echo '<td>' . $reg['descripcionrub'] . '</td>';
      echo '<td><a href="bajaarticulo.php?codigo='.$reg['codigoart'].'">¿Borrar?</a></td>';
      echo '<td><a href="modificacionarticulo1.php?codigo='.$reg['codigoart'].'">¿Modificar?</a></td>';
      echo '</tr>';
  }

  echo '<tr><td colspan="6">';
  echo '<a href="altaarticulo1.php">¿Agregar un nuevo artículo?</a>';
  echo '</td></tr>';
  echo '</table>';  // ← corregido el error aquí
	
  $mysql->close();
  ?>  

</body>
</html>
