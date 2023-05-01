<?php 
include_once ("../sql/Conexion.php");
 include_once ("../modelo/Usuario.php");
class consulta{
  public function contardescuentos($id, $razon, $variable){
    $con = conectar();
    if ($razon== "ALL") {
      $sql = "SELECT*FROM productos WHERE descuento > 0 AND categoria=$id AND estado = 'activo'";
    }if ($razon == "empresa") {
      if (is_numeric($variable)) {
      $sql = "SELECT*FROM productos WHERE descuento > 0 AND categoria=$id AND id_empresa =$variable AND estado = 'activo'";}
      else{
        $sql = "SELECT * FROM users WHERE nombre='$variable' OR nombre REGEXP '".strtolower($variable)."' AND estado='activo'";
         $result5 = mysqli_query($con, $sql);
         if ($mostrar5 = mysqli_fetch_array($result5)) {
             $variable = $mostrar5['id'];
         }
         $sql = "SELECT*FROM productos WHERE descuento > 0 AND categoria=$id AND id_empresa=$variable AND estado = 'activo'";

      }
    }
  
    if ($razon == "search") {
      $sql = "SELECT*FROM productos WHERE descuento > 0 AND categoria=$id AND (nombre= '$variable' OR nombre REGEXP '".strtolower($variable)."' OR descripcion REGEXP '".strtolower($variable)."') AND estado = 'activo'";
    }
    if ($razon == "categoria"){
      $sql = "SELECT*FROM productos WHERE descuento > 0 AND categoria=$id AND estado = 'activo'";
    }
    
    $result = mysqli_query($con, $sql);
    $resultado = 0;
    while ($mostrar = mysqli_fetch_array($result)) {
      $resultado = $resultado + 1;
    }
    return $resultado;
    mysqli_close($con);
  }

  public function contarcomprados($id, $razon, $variable){
    $con = conectar();
      $sql = "SELECT DISTINCT id_producto FROM carrito_compras WHERE estado='activo'";

  
    $result2 = mysqli_query($con, $sql);
    $resultadocomprados = 0;
    $id_producto = [];
    while ($mostrar2 = mysqli_fetch_array($result2)) {
     
        $id_producto[] = $mostrar2['id_producto'];
    }
      for ($productos=0; $productos < count($id_producto); $productos++) { 
        if ($razon == "ALL") {
          $sql = "SELECT*FROM productos WHERE id=$id_producto[$productos] AND categoria=$id AND estado ='activo'";
        } if ($razon == "empresa") {
          if (is_numeric($variable)) {
            $sql = "SELECT*FROM productos WHERE id=$id_producto[$productos] AND categoria=$id AND id_empresa =$variable AND estado ='activo'";}
            else{
              $sql = "SELECT * FROM users WHERE nombre= '$variable' OR nombre REGEXP '".strtolower($variable)."' AND estado='activo'";
               $result5 = mysqli_query($con, $sql);
               if ($mostrar5 = mysqli_fetch_array($result5)) {
                   $variable = $mostrar5['id'];
               }
               $sql = "SELECT*FROM productos WHERE id=$id_producto[$productos] AND categoria=$id AND id_empresa =$variable AND estado ='activo'";
      
            }
        }
        if ($razon == "search") {
          $sql = "SELECT*FROM productos WHERE id=$id_producto[$productos] AND categoria=$id AND (nombre= '$variable' OR nombre REGEXP '".strtolower($variable)."' OR descripcion REGEXP '".strtolower($variable)."') AND estado ='activo'";
        }
        if ($razon == "categoria"){
          $sql = "SELECT*FROM productos WHERE id=$id_producto[$productos] AND categoria=$id AND estado ='activo'";
        }
   
    $result = mysqli_query($con, $sql);
    if($mostrar = mysqli_fetch_array($result)) {
      $resultadocomprados = $resultadocomprados + 1;
    }
 } 
 mysqli_close($con);
  return $resultadocomprados;  
  }
  
  public function contarpopulares($id, $razon, $variable){
    $con = conectar();
      $sql = "SELECT DISTINCT id_producto FROM lista_deseos WHERE estado='activo'";
    $result2 = mysqli_query($con, $sql);
    $resultadocomprados = 0;
    $id_producto = [];
    while ($mostrar2 = mysqli_fetch_array($result2)) {
     
        $id_producto[] = $mostrar2['id_producto'];
    }
      for ($productos=0; $productos < count($id_producto); $productos++) { 
    
    if ($razon == "ALL") {
      $sql = "SELECT*FROM productos WHERE id=$id_producto[$productos] AND categoria=$id AND estado ='activo'";
    } if ($razon == "empresa") {
      if (is_numeric($variable)) {
        $sql = "SELECT*FROM productos WHERE id=$id_producto[$productos] AND categoria=$id AND id_empresa=$variable AND estado ='activo'";}
        else{
          $sql = "SELECT * FROM users WHERE nombre= '$variable' OR nombre REGEXP '".strtolower($variable)."' AND estado='activo'";
           $result5 = mysqli_query($con, $sql);
           if ($mostrar5 = mysqli_fetch_array($result5)) {
               $variable = $mostrar5['id'];
           }
           $sql = "SELECT*FROM productos WHERE id=$id_producto[$productos] AND categoria=$id AND id_empresa=$variable AND estado ='activo'";
  
        }
    }
    if ($razon == "search") {
      $sql = "SELECT*FROM productos WHERE id=$id_producto[$productos] AND categoria=$id AND (nombre= '$variable' OR nombre REGEXP '".strtolower($variable)."' OR descripcion REGEXP '".strtolower($variable)."')
       AND estado ='activo'";
    }
    if ($razon == "categoria"){
      $sql = "SELECT*FROM productos WHERE id=$id_producto[$productos] AND categoria=$id AND estado ='activo'";
    }
    $result = mysqli_query($con, $sql);
    if($mostrar = mysqli_fetch_array($result)) {
      $resultadocomprados = $resultadocomprados + 1;
    }
 } 
 mysqli_close($con);
  return $resultadocomprados;  
  }

  public function contarpuntuados($id, $razon, $variable){
    $con = conectar();
    $resultadocomprados = 0;
    if ($razon == "ALL") {
      $sql = "SELECT DISTINCT id FROM productos WHERE calificacion > 3.8 AND categoria=$id AND estado = 'activo'";
    }
    if ($razon == "empresa") {

      if (is_numeric($variable)) {
        $sql = "SELECT DISTINCT id FROM productos WHERE calificacion > 3.8 AND categoria=$id AND id_empresa =$variable AND estado = 'activo'";}
        else{
          $sql = "SELECT * FROM users WHERE nombre='$variable' OR nombre REGEXP '".strtolower($variable)."' AND estado='activo'";
           $result5 = mysqli_query($con, $sql);
           if ($mostrar5 = mysqli_fetch_array($result5)) {
               $variable = $mostrar5['id'];
           }
           $sql = "SELECT DISTINCT id FROM productos WHERE calificacion > 3.8 AND categoria=$id AND id_empresa =$variable AND estado = 'activo'";
  
        }
    }
    if ($razon == "search") {
      $sql = "SELECT DISTINCT id FROM productos WHERE calificacion > 3.8 AND categoria=$id AND (nombre= '$variable' OR nombre REGEXP '".strtolower($variable)."' OR descripcion REGEXP '".strtolower($variable)."') AND estado = 'activo'";
    }
    if ($razon == "categoria"){
      $sql = "SELECT DISTINCT id FROM productos WHERE calificacion > 3.8 AND categoria=$id AND estado = 'activo'";
    }
   
    $result = mysqli_query($con, $sql);
    while($mostrar = mysqli_fetch_array($result)) {
      $resultadocomprados = $resultadocomprados + 1;
 } 
 mysqli_close($con);
  return $resultadocomprados;  


}

public function search(){

    $con = conectar();
    $sql = "SELECT * FROM categorias WHERE categoria='$_GET[search]' OR categoria  REGEXP '".strtolower($_GET['search'])."'";
     $result5 = mysqli_query($con, $sql);
     if ($mostrar5 = mysqli_fetch_array($result5)) {
         $categoria2 = $mostrar5['id'];
     }else {
        $categoria2 = "";
     }
     $sql = "SELECT * FROM users WHERE (nombre='$_GET[search]' OR nombre  REGEXP '".strtolower($_GET['search'])."') AND estado = 'activo'";
     $result5 = mysqli_query($con, $sql);
     if ($mostrar5 = mysqli_fetch_array($result5)) {
         $idempresa = $mostrar5['id'];
     }else {
        $idempresa= "";
     }
    if ($categoria2 == "" && $idempresa == "") {
      if (isset($_GET['categoria'])) {
      $con = conectar();
      $sql = "SELECT * FROM categorias WHERE categoria='$_GET[categoria]'";
     $result5 = mysqli_query($con, $sql);
     if ($mostrar5 = mysqli_fetch_array($result5)) {
         $categoria2 = $mostrar5['id'];
     }
    }
        if (isset($_GET['descuento'])) {
          if (isset($_GET['filtro'])) {
         
            if ($_GET['filtro'] == 'mayorprecio') {
          
              $sql = "SELECT id, nombre, precio, descuento, id_empresa, precio - (precio * (descuento / 100)) AS precio_con_descuento FROM productos 
              WHERE (nombre= '$_GET[search]' OR nombre REGEXP '".strtolower($_GET['search'])."' OR descripcion REGEXP '".strtolower($_GET['search'])."') 
               AND categoria=$categoria2 AND estado = 'activo' AND descuento>0 
              ORDER BY precio_con_descuento DESC";
            
          }else if ($_GET['filtro'] == 'menorprecio') {
  
            $sql = "SELECT id, nombre, precio, descuento, id_empresa, precio - (precio * (descuento / 100)) AS precio_con_descuento FROM productos 
              WHERE  (nombre= '$_GET[search]' OR nombre REGEXP '".strtolower($_GET['search'])."' OR descripcion REGEXP '".strtolower($_GET['search'])."') 
              AND categoria=$categoria2 AND  estado = 'activo' AND descuento>0 
              ORDER BY precio_con_descuento ASC";
          }
          else
          if ($_GET['filtro'] == 'recientes') {
            $sql = "SELECT * FROM productos WHERE (nombre= '$_GET[search]' OR nombre REGEXP '".strtolower($_GET['search'])."' OR descripcion REGEXP '".strtolower($_GET['search'])."') 
            AND categoria=$categoria2 AND descuento>0 AND estado = 'activo' ORDER BY id DESC";
          }
          }
          else {
          
            $sql = "SELECT * FROM productos WHERE (nombre= '$_GET[search]' OR nombre REGEXP '".strtolower($_GET['search'])."' OR descripcion REGEXP '".strtolower($_GET['search'])."') AND descuento > 0 AND categoria=$categoria2 AND estado='activo'";
            }
        }
        
        else if (isset($_GET['mascomprados'])) {

          if (isset($_GET['filtro'])) {
         
            if ($_GET['filtro'] == 'mayorprecio') {
          
              $sql = "SELECT DISTINCT productos.* FROM productos 
              JOIN carrito_compras ON productos.id = carrito_compras.id_producto 
              WHERE (nombre= '$_GET[search]' OR nombre REGEXP '".strtolower($_GET['search'])."' OR descripcion REGEXP '".strtolower($_GET['search'])."')
             AND categoria=$categoria2  AND carrito_compras.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.precio DESC";
            
          }else if ($_GET['filtro'] == 'menorprecio') {
  
            $sql = "SELECT DISTINCT productos.* FROM productos 
            JOIN carrito_compras ON productos.id = carrito_compras.id_producto 
            WHERE (nombre= '$_GET[search]' OR nombre REGEXP '".strtolower($_GET['search'])."' OR descripcion REGEXP '".strtolower($_GET['search'])."')
            AND categoria=$categoria2 AND carrito_compras.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.precio ASC";
          }
          else
          if ($_GET['filtro'] == 'recientes') {
            $sql = "SELECT DISTINCT productos.* FROM productos 
            JOIN carrito_compras ON productos.id = carrito_compras.id_producto 
            WHERE (nombre= '$_GET[search]' OR nombre REGEXP '".strtolower($_GET['search'])."' OR descripcion REGEXP '".strtolower($_GET['search'])."')
             AND categoria=$categoria2 AND carrito_compras.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.id DESC";
          }
        }else {
         $sql = "SELECT DISTINCT productos.* FROM productos 
         JOIN carrito_compras ON productos.id = carrito_compras.id_producto 
         WHERE (nombre= '$_GET[search]' OR nombre REGEXP '".strtolower($_GET['search'])."' OR descripcion REGEXP '".strtolower($_GET['search'])."')
        AND categoria=$categoria2  AND carrito_compras.estado = 'activo' AND productos.estado = 'activo'";}
        
      }
        else if (isset($_GET['populares'])) {
          if (isset($_GET['filtro'])) {
         
            if ($_GET['filtro'] == 'mayorprecio') {
          
              $sql = "SELECT DISTINCT productos.* FROM productos 
         JOIN lista_deseos ON productos.id = lista_deseos.id_producto 
         WHERE (nombre= '$_GET[search]' OR nombre REGEXP '".strtolower($_GET['search'])."' OR descripcion REGEXP '".strtolower($_GET['search'])."')
          AND categoria=$categoria2 AND lista_deseos.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.precio DESC";
            
          }else if ($_GET['filtro'] == 'menorprecio') {
  
            $sql = "SELECT DISTINCT productos.* FROM productos 
            JOIN lista_deseos ON productos.id = lista_deseos.id_producto 
            WHERE (nombre= '$_GET[search]' OR nombre REGEXP '".strtolower($_GET['search'])."' OR descripcion REGEXP '".strtolower($_GET['search'])."')
           AND categoria=$categoria2 AND lista_deseos.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.precio ASC";
          }
          else
          if ($_GET['filtro'] == 'recientes') {
            $sql = "SELECT DISTINCT productos.* FROM productos 
            JOIN lista_deseos ON productos.id = lista_deseos.id_producto 
            WHERE (nombre= '$_GET[search]' OR nombre REGEXP '".strtolower($_GET['search'])."' OR descripcion REGEXP '".strtolower($_GET['search'])."')
             AND categoria=$categoria2 AND lista_deseos.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.id DESC";
          }
        }else {
          $sql = "SELECT DISTINCT productos.* FROM productos 
         JOIN lista_deseos ON productos.id = lista_deseos.id_producto 
         WHERE (nombre= '$_GET[search]' OR nombre REGEXP '".strtolower($_GET['search'])."' OR descripcion REGEXP '".strtolower($_GET['search'])."')
         AND categoria=$categoria2 AND lista_deseos.estado = 'activo' AND productos.estado = 'activo'";
        }
      }
      else if (isset($_GET['puntuados'])) {
          if (isset($_GET['filtro'])) {
         
            if ($_GET['filtro'] == 'mayorprecio') {
            if (isset($_GET['descuento'])) {
              $sql = "SELECT*FROM productos WHERE (nombre= '$_GET[search]' OR nombre REGEXP '".strtolower($_GET['search'])."' OR descripcion REGEXP '".strtolower($_GET['search'])."') 
              AND categoria=$categoria2 AND calificacion > 3.8 AND estado='activo' ORDER BY precio DESC";
            }
          }else if ($_GET['filtro'] == 'menorprecio') {
  
            $sql = "SELECT*FROM productos WHERE (nombre= '$_GET[search]' OR nombre REGEXP '".strtolower($_GET['search'])."' OR descripcion REGEXP '".strtolower($_GET['search'])."') 
            AND categoria=$categoria2 AND calificacion > 3.8 AND estado='activo' ORDER BY precio ASC";
          }
          else
          if ($_GET['filtro'] == 'recientes') {
            $sql = "SELECT*FROM productos WHERE (nombre= '$_GET[search]' OR nombre REGEXP '".strtolower($_GET['search'])."' OR descripcion REGEXP '".strtolower($_GET['search'])."') 
            AND categoria=$categoria2 AND calificacion > 3.8 AND estado='activo' ORDER BY id DESC";
          }
          }else {
          $sql = "SELECT*FROM productos WHERE (nombre= '$_GET[search]' OR nombre REGEXP '".strtolower($_GET['search'])."' OR descripcion REGEXP '".strtolower($_GET['search'])."') 
          AND categoria=$categoria2 AND calificacion > 3.8 AND estado='activo'";}
        } 
        else if (isset($_GET['filtro'])) {
         
          if ($_GET['filtro'] == 'mayorprecio') {
            $sql = "SELECT*FROM productos WHERE (nombre= '$_GET[search]' OR nombre REGEXP '".strtolower($_GET['search'])."' OR descripcion REGEXP '".strtolower($_GET['search'])."') 
            AND estado='activo' ORDER BY precio DESC";
        }else if ($_GET['filtro'] == 'menorprecio') {

          $sql = "SELECT*FROM productos WHERE (nombre= '$_GET[search]' OR nombre REGEXP '".strtolower($_GET['search'])."' OR descripcion REGEXP '".strtolower($_GET['search'])."') 
           AND estado='activo' ORDER BY precio ASC";
        }
        else
        if ($_GET['filtro'] == 'recientes') {
          $sql = "SELECT*FROM productos WHERE (nombre= '$_GET[search]' OR nombre REGEXP '".strtolower($_GET['search'])."' OR descripcion REGEXP '".strtolower($_GET['search'])."') 
           AND estado='activo' ORDER BY id DESC";
        }
        }
        else {
          $sql = "SELECT * FROM productos 
          WHERE (nombre= '$_GET[search]' OR nombre REGEXP '".strtolower($_GET['search'])."' OR descripcion REGEXP '".strtolower($_GET['search'])."') 
          AND estado='activo'";

        }


    }else if (!$categoria2 == "" ) {
      if (isset($_GET['descuento'])) {
        if (isset($_GET['filtro'])) {
       
          if ($_GET['filtro'] == 'mayorprecio') {
        
            $sql = "SELECT id, nombre, precio, descuento,id_empresa, precio - (precio * (descuento / 100)) AS precio_con_descuento FROM productos 
            WHERE categoria = $categoria2 
            AND  estado = 'activo' AND descuento>0 
            ORDER BY precio_con_descuento DESC";
          
        }else if ($_GET['filtro'] == 'menorprecio') {

          $sql = "SELECT id, nombre, precio, descuento,id_empresa, precio - (precio * (descuento / 100)) AS precio_con_descuento FROM productos 
            WHERE categoria = $categoria2
            AND  estado = 'activo' AND descuento>0 
            ORDER BY precio_con_descuento ASC";
        }
        else
        if ($_GET['filtro'] == 'recientes') {
          $sql = "SELECT * FROM productos WHERE categoria = $categoria2 
          AND estado = 'activo' ORDER BY id DESC";
        }
        }else {
        
        $sql = "SELECT * FROM productos WHERE categoria = $categoria2
         AND descuento > 0 AND estado='activo'";
        }
      }
      else if (isset($_GET['mascomprados'])) {

        if (isset($_GET['filtro'])) {
       
          if ($_GET['filtro'] == 'mayorprecio') {
        
            $sql = "SELECT DISTINCT productos.* FROM productos 
            JOIN carrito_compras ON productos.id = carrito_compras.id_producto 
            WHERE categoria = $categoria2
            AND carrito_compras.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.precio DESC";
          
        }else if ($_GET['filtro'] == 'menorprecio') {

          $sql = "SELECT DISTINCT productos.* FROM productos 
          JOIN carrito_compras ON productos.id = carrito_compras.id_producto 
          WHERE categoria = $categoria2
          AND carrito_compras.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.precio ASC";
        }
        else
        if ($_GET['filtro'] == 'recientes') {
          $sql = "SELECT DISTINCT productos.* FROM productos 
          JOIN carrito_compras ON productos.id = carrito_compras.id_producto 
          WHERE categoria = $categoria2
          AND carrito_compras.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.id DESC";
        }
      }else {
       $sql = "SELECT DISTINCT productos.* FROM productos 
       JOIN carrito_compras ON productos.id = carrito_compras.id_producto 
       WHERE categoria = $categoria2
       AND carrito_compras.estado = 'activo' AND productos.estado = 'activo'";}
      
    }
      else if (isset($_GET['populares'])) {
        if (isset($_GET['filtro'])) {
       
          if ($_GET['filtro'] == 'mayorprecio') {
        
            $sql = "SELECT DISTINCT productos.* FROM productos 
       JOIN lista_deseos ON productos.id = lista_deseos.id_producto 
       WHERE categoria = $categoria2
       AND lista_deseos.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.precio DESC";
          
        }else if ($_GET['filtro'] == 'menorprecio') {

          $sql = "SELECT DISTINCT productos.* FROM productos 
          JOIN lista_deseos ON productos.id = lista_deseos.id_producto 
          WHERE categoria = $categoria2
          AND lista_deseos.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.precio ASC";
        }
        else
        if ($_GET['filtro'] == 'recientes') {
          $sql = "SELECT DISTINCT productos.* FROM productos 
          JOIN lista_deseos ON productos.id = lista_deseos.id_producto 
          WHERE categoria = $categoria2
          AND lista_deseos.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.id DESC";
        }
      }else {
        $sql = "SELECT DISTINCT productos.* FROM productos 
       JOIN lista_deseos ON productos.id = lista_deseos.id_producto 
       WHERE categoria = $categoria2
       AND lista_deseos.estado = 'activo' AND productos.estado = 'activo'";
      }
    }
    else if (isset($_GET['puntuados'])) {
        if (isset($_GET['filtro'])) {
       
          if ($_GET['filtro'] == 'mayorprecio') {
          if (isset($_GET['descuento'])) {
            $sql = "SELECT*FROM productos WHERE categoria = $categoria2 
            AND calificacion > 3.8 AND estado='activo' ORDER BY precio DESC";
          }
        }else if ($_GET['filtro'] == 'menorprecio') {

          $sql = "SELECT*FROM productos WHERE categoria = $categoria2
          AND calificacion > 3.8 AND estado='activo' ORDER BY precio ASC";
        }
        else
        if ($_GET['filtro'] == 'recientes') {
          $sql = "SELECT*FROM productos WHERE categoria = $categoria2
          AND calificacion > 3.8 AND estado='activo' ORDER BY id DESC";
        }
        }else {
        $sql = "SELECT*FROM productos WHERE categoria = $categoria2
        AND calificacion > 3.8 AND estado='activo'";}
      } 
      else if (isset($_GET['filtro'])) {
       
        if ($_GET['filtro'] == 'mayorprecio') {
          $sql = "SELECT*FROM productos WHERE categoria = $categoria2
          AND estado='activo' ORDER BY precio DESC";
      }else if ($_GET['filtro'] == 'menorprecio') {

        $sql = "SELECT*FROM productos WHERE categoria = $categoria2 
         AND estado='activo' ORDER BY precio ASC";
      }
      else
      if ($_GET['filtro'] == 'recientes') {
        $sql = "SELECT*FROM productos WHERE categoria = $categoria2 
         AND estado='activo' ORDER BY id DESC";
      }
      }
      else {
        $sql = "SELECT * FROM productos 
        WHERE categoria = $categoria2
        AND estado='activo'";

      }
    } else if (!$idempresa == "") {
      if (isset($_GET['descuento'])) {
        if (isset($_GET['filtro'])) {
       
          if ($_GET['filtro'] == 'mayorprecio') {
        
            $sql = "SELECT id, nombre, precio, descuento,id_empresa, precio - (precio * (descuento / 100)) AS precio_con_descuento FROM productos 
            WHERE id_empresa = $idempresa
            AND  estado = 'activo' AND descuento>0 
            ORDER BY precio_con_descuento DESC";
          
        }else if ($_GET['filtro'] == 'menorprecio') {

          $sql = "SELECT id, nombre, precio, descuento,id_empresa, precio - (precio * (descuento / 100)) AS precio_con_descuento FROM productos 
            WHERE  id_empresa = $idempresa
            AND  estado = 'activo' AND descuento>0 
            ORDER BY precio_con_descuento ASC";
        }
        else
        if ($_GET['filtro'] == 'recientes') {
          $sql = "SELECT * FROM productos 
          WHERE id_empresa = $idempresa
          AND estado = 'activo' ORDER BY id DESC";
        }
        }else {
        
        $sql = "SELECT * FROM productos WHERE id_empresa = $idempresa
         AND descuento > 0 AND estado='activo'";
        }
      }
      else if (isset($_GET['mascomprados'])) {

        if (isset($_GET['filtro'])) {
       
          if ($_GET['filtro'] == 'mayorprecio') {
        
            $sql = "SELECT DISTINCT productos.* FROM productos 
            JOIN carrito_compras ON productos.id = carrito_compras.id_producto 
            WHERE id_empresa = $idempresa
            AND carrito_compras.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.precio DESC";
          
        }else if ($_GET['filtro'] == 'menorprecio') {

          $sql = "SELECT DISTINCT productos.* FROM productos 
          JOIN carrito_compras ON productos.id = carrito_compras.id_producto 
          WHERE id_empresa = $idempresa
          AND carrito_compras.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.precio ASC";
        }
        else
        if ($_GET['filtro'] == 'recientes') {
          $sql = "SELECT DISTINCT productos.* FROM productos 
          JOIN carrito_compras ON productos.id = carrito_compras.id_producto 
          WHERE id_empresa = $idempresa
          AND carrito_compras.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.id DESC";
        }
      }else {
       $sql = "SELECT DISTINCT productos.* FROM productos 
       JOIN carrito_compras ON productos.id = carrito_compras.id_producto 
       WHERE id_empresa = $idempresa
       AND carrito_compras.estado = 'activo' AND productos.estado = 'activo'";}
      
    }
      else if (isset($_GET['populares'])) {
        if (isset($_GET['filtro'])) {
       
          if ($_GET['filtro'] == 'mayorprecio') {
        
            $sql = "SELECT DISTINCT productos.* FROM productos 
       JOIN lista_deseos ON productos.id = lista_deseos.id_producto 
       WHERE id_empresa = $idempresa
       AND lista_deseos.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.precio DESC";
          
        }else if ($_GET['filtro'] == 'menorprecio') {

          $sql = "SELECT DISTINCT productos.* FROM productos 
          JOIN lista_deseos ON productos.id = lista_deseos.id_producto 
          WHERE id_empresa = $idempresa
          AND lista_deseos.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.precio ASC";
        }
        else
        if ($_GET['filtro'] == 'recientes') {
          $sql = "SELECT DISTINCT productos.* FROM productos 
          JOIN lista_deseos ON productos.id = lista_deseos.id_producto 
          WHERE id_empresa = $idempresa
          AND lista_deseos.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.id DESC";
        }
      }else {
        $sql = "SELECT DISTINCT productos.* FROM productos 
       JOIN lista_deseos ON productos.id = lista_deseos.id_producto 
       WHERE cid_empresa = $idempresa
       AND lista_deseos.estado = 'activo' AND productos.estado = 'activo'";
      }
    }
    else if (isset($_GET['puntuados'])) {
        if (isset($_GET['filtro'])) {
       
          if ($_GET['filtro'] == 'mayorprecio') {
          if (isset($_GET['descuento'])) {
            $sql = "SELECT*FROM productos 
            WHERE id_empresa = $idempresa
            AND calificacion > 3.8 AND estado='activo' ORDER BY precio DESC";
          }
        }else if ($_GET['filtro'] == 'menorprecio') {

          $sql = "SELECT*FROM productos 
          WHERE id_empresa = $idempresa
          AND calificacion > 3.8 AND estado='activo' ORDER BY precio ASC";
        }
        else
        if ($_GET['filtro'] == 'recientes') {
          $sql = "SELECT*FROM productos 
          WHERE id_empresa = $idempresa
          AND calificacion > 3.8 AND estado='activo' ORDER BY id DESC";
        }
        }else {
        $sql = "SELECT*FROM productos 
        WHERE id_empresa = $idempresa
        AND calificacion > 3.8 AND estado='activo'";}
      } 
      else if (isset($_GET['filtro'])) {
       
        if ($_GET['filtro'] == 'mayorprecio') {
          $sql = "SELECT*FROM productos
           WHERE id_empresa = $idempresa
          AND estado='activo' ORDER BY precio DESC";
      }else if ($_GET['filtro'] == 'menorprecio') {

        $sql = "SELECT*FROM productos 
        WHERE id_empresa = $idempresa
         AND estado='activo' ORDER BY precio ASC";
      }
      else
      if ($_GET['filtro'] == 'recientes') {
        $sql = "SELECT*FROM productos 
        WHERE id_empresa = $idempresa
        AND estado='activo' ORDER BY id DESC";
      }
      }
      else {
        $sql = "SELECT * FROM productos 
        WHERE id_empresa = $idempresa
        AND estado='activo'";

      }
    }

    mysqli_close($con);
    return $sql;
}

public function categoria(){
  $con = conectar();
  $sql = "SELECT * FROM categorias WHERE categoria='$_GET[categoria]' OR categoria  REGEXP '".strtolower($_GET['categoria'])."'";
   $result5 = mysqli_query($con, $sql);
   if ($mostrar5 = mysqli_fetch_array($result5)) {
       $categoria2 = $mostrar5['id'];
   }

  if (isset($_GET['descuento'])) {
    if (isset($_GET['filtro'])) {
   
      if ($_GET['filtro'] == 'mayorprecio') {
    
        $sql = "SELECT id, nombre, precio, descuento, id_empresa ,  precio - (precio * (descuento / 100)) AS precio_con_descuento FROM productos 
        WHERE categoria = $categoria2 
        AND  estado = 'activo' AND descuento>0 
        ORDER BY precio_con_descuento DESC";
      
    }else if ($_GET['filtro'] == 'menorprecio') {

      $sql = "SELECT id, nombre, precio, descuento, id_empresa , precio - (precio * (descuento / 100)) AS precio_con_descuento FROM productos 
        WHERE categoria = $categoria2
        AND  estado = 'activo' AND descuento>0 
        ORDER BY precio_con_descuento ASC";
    }
    else
    if ($_GET['filtro'] == 'recientes') {
      $sql = "SELECT id, nombre, precio, descuento, id_empresa , precio - (precio * (descuento / 100)) AS precio_con_descuento FROM productos  
      WHERE categoria = $categoria2 
      AND estado = 'activo'  AND descuento>0  ORDER BY id DESC";
    }
    }else {
    
    $sql = "SELECT * FROM productos WHERE categoria = $categoria2
     AND descuento > 0 AND estado='activo'";
    }
  }
  else if (isset($_GET['mascomprados'])) {

    if (isset($_GET['filtro'])) {
   
      if ($_GET['filtro'] == 'mayorprecio') {
    
        $sql = "SELECT DISTINCT productos.* FROM productos 
        JOIN carrito_compras ON productos.id = carrito_compras.id_producto 
        WHERE categoria = $categoria2
        AND carrito_compras.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.precio DESC";
      
    }else if ($_GET['filtro'] == 'menorprecio') {

      $sql = "SELECT DISTINCT productos.* FROM productos 
      JOIN carrito_compras ON productos.id = carrito_compras.id_producto 
      WHERE categoria = $categoria2
      AND carrito_compras.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.precio ASC";
    }
    else
    if ($_GET['filtro'] == 'recientes') {
      $sql = "SELECT DISTINCT productos.* FROM productos 
      JOIN carrito_compras ON productos.id = carrito_compras.id_producto 
      WHERE categoria = $categoria2
      AND carrito_compras.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.id DESC";
    }
  }else {
   $sql = "SELECT DISTINCT productos.* FROM productos 
   JOIN carrito_compras ON productos.id = carrito_compras.id_producto 
   WHERE categoria = $categoria2
   AND carrito_compras.estado = 'activo' AND productos.estado = 'activo'";}
  
}
  else if (isset($_GET['populares'])) {
    if (isset($_GET['filtro'])) {
   
      if ($_GET['filtro'] == 'mayorprecio') {
    
        $sql = "SELECT DISTINCT productos.* FROM productos 
   JOIN lista_deseos ON productos.id = lista_deseos.id_producto 
   WHERE categoria = $categoria2
   AND lista_deseos.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.precio DESC";
      
    }else if ($_GET['filtro'] == 'menorprecio') {

      $sql = "SELECT DISTINCT productos.* FROM productos 
      JOIN lista_deseos ON productos.id = lista_deseos.id_producto 
      WHERE categoria = $categoria2
      AND lista_deseos.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.precio ASC";
    }
    else
    if ($_GET['filtro'] == 'recientes') {
      $sql = "SELECT DISTINCT productos.* FROM productos 
      JOIN lista_deseos ON productos.id = lista_deseos.id_producto 
      WHERE categoria = $categoria2
      AND lista_deseos.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.id DESC";
    }
  }else {
    $sql = "SELECT DISTINCT productos.* FROM productos 
   JOIN lista_deseos ON productos.id = lista_deseos.id_producto 
   WHERE categoria = $categoria2
   AND lista_deseos.estado = 'activo' AND productos.estado = 'activo'";
  }
}
else if (isset($_GET['puntuados'])) {
    if (isset($_GET['filtro'])) {
   
      if ($_GET['filtro'] == 'mayorprecio') {
      if (isset($_GET['descuento'])) {
        $sql = "SELECT*FROM productos WHERE categoria = $categoria2 
        AND calificacion > 3.8 AND estado='activo' ORDER BY precio DESC";
      }
    }else if ($_GET['filtro'] == 'menorprecio') {

      $sql = "SELECT*FROM productos WHERE categoria = $categoria2
      AND calificacion > 3.8 AND estado='activo' ORDER BY precio ASC";
    }
    else
    if ($_GET['filtro'] == 'recientes') {
      $sql = "SELECT*FROM productos WHERE categoria = $categoria2
      AND calificacion > 3.8 AND estado='activo' ORDER BY id DESC";
    }
    }else {
    $sql = "SELECT*FROM productos WHERE categoria = $categoria2
    AND calificacion > 3.8 AND estado='activo'";}
  } 
  else if (isset($_GET['filtro'])) {
   
    if ($_GET['filtro'] == 'mayorprecio') {
      $sql = "SELECT*FROM productos WHERE categoria = $categoria2
      AND estado='activo' ORDER BY precio DESC";
  }else if ($_GET['filtro'] == 'menorprecio') {

    $sql = "SELECT*FROM productos WHERE categoria = $categoria2 
     AND estado='activo' ORDER BY precio ASC";
  }
  else
  if ($_GET['filtro'] == 'recientes') {
    $sql = "SELECT*FROM productos WHERE categoria = $categoria2 
     AND estado='activo' ORDER BY id DESC";
  }
  }
  else {
    $sql = "SELECT * FROM productos 
    WHERE categoria = $categoria2
    AND estado='activo'";

  }
  return $sql;
}

public function empresa(){

  if (isset($_GET['categoria'])) {
  $con = conectar();
  $sql = "SELECT * FROM categorias WHERE categoria='$_GET[categoria]' OR categoria  REGEXP '".strtolower($_GET['categoria'])."'";
   $result5 = mysqli_query($con, $sql);
   if ($mostrar5 = mysqli_fetch_array($result5)) {
       $categoria2 = $mostrar5['id'];
   }
  }
   if ($_GET['empresa'] === "ALL" ) {

    if (isset($_GET['descuento'])) {
      if (isset($_GET['filtro'])) {
     
        if ($_GET['filtro'] == 'mayorprecio') {
      
          $sql = "SELECT id, nombre, precio, descuento, id_empresa , precio - (precio * (descuento / 100)) AS precio_con_descuento FROM productos 
          WHERE categoria = $categoria2
          AND  estado = 'activo' AND descuento>0 
          ORDER BY precio_con_descuento DESC";
        
      }else if ($_GET['filtro'] == 'menorprecio') {
  
        $sql = "SELECT id, nombre, precio, descuento, id_empresa , precio - (precio * (descuento / 100)) AS precio_con_descuento FROM productos 
          WHERE categoria = $categoria2
          AND  estado = 'activo' AND descuento>0 
          ORDER BY precio_con_descuento ASC";
      }
      else
      if ($_GET['filtro'] == 'recientes') {
        $sql = "SELECT * FROM productos 
        WHERE categoria = $categoria2
        AND estado = 'activo' ORDER BY id DESC";
      }
      }else {
      
      $sql = "SELECT * FROM productos 
      WHERE categoria = $categoria2
       AND descuento > 0 AND estado='activo'";
      }
    }
    else if (isset($_GET['mascomprados'])) {
  
      if (isset($_GET['filtro'])) {
     
        if ($_GET['filtro'] == 'mayorprecio') {
      
          $sql = "SELECT DISTINCT productos.* FROM productos 
          JOIN carrito_compras ON productos.id = carrito_compras.id_producto 
          WHERE categoria = $categoria2
          AND carrito_compras.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.precio DESC";
        
      }else if ($_GET['filtro'] == 'menorprecio') {
  
        $sql = "SELECT DISTINCT productos.* FROM productos 
        JOIN carrito_compras ON productos.id = carrito_compras.id_producto 
        WHERE categoria = $categoria2
        AND carrito_compras.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.precio ASC";
      }
      else
      if ($_GET['filtro'] == 'recientes') {
        $sql = "SELECT DISTINCT productos.* FROM productos 
        JOIN carrito_compras ON productos.id = carrito_compras.id_producto 
        WHERE categoria = $categoria2
        AND carrito_compras.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.id DESC";
      }
    }else {
     $sql = "SELECT DISTINCT productos.* FROM productos 
     JOIN carrito_compras ON productos.id = carrito_compras.id_producto 
     WHERE categoria = $categoria2
     AND carrito_compras.estado = 'activo' AND productos.estado = 'activo'";}
    
  }
    else if (isset($_GET['populares'])) {
      if (isset($_GET['filtro'])) {
     
        if ($_GET['filtro'] == 'mayorprecio') {
      
          $sql = "SELECT DISTINCT productos.* FROM productos 
     JOIN lista_deseos ON productos.id = lista_deseos.id_producto 
     WHERE categoria = $categoria2
     AND lista_deseos.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.precio DESC";
        
      }else if ($_GET['filtro'] == 'menorprecio') {
  
        $sql = "SELECT DISTINCT productos.* FROM productos 
        JOIN lista_deseos ON productos.id = lista_deseos.id_producto 
        WHERE categoria = $categoria2
        AND lista_deseos.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.precio ASC";
      }
      else
      if ($_GET['filtro'] == 'recientes') {
        $sql = "SELECT DISTINCT productos.* FROM productos 
        JOIN lista_deseos ON productos.id = lista_deseos.id_producto 
        WHERE categoria = $categoria2
        AND lista_deseos.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.id DESC";
      }
    }else {
      $sql = "SELECT DISTINCT productos.* FROM productos 
     JOIN lista_deseos ON productos.id = lista_deseos.id_producto 
     WHERE categoria = $categoria2
     AND lista_deseos.estado = 'activo' AND productos.estado = 'activo'";
    }
  }
  else if (isset($_GET['puntuados'])) {
      if (isset($_GET['filtro'])) {
        if ($_GET['filtro'] == 'mayorprecio') {
          $sql = "SELECT*FROM productos 
          WHERE categoria = $categoria2
          AND calificacion > 3.8 AND estado='activo' ORDER BY precio DESC";
      }else if ($_GET['filtro'] == 'menorprecio') {
  
        $sql = "SELECT*FROM productos 
        WHERE categoria = $categoria2
        AND calificacion > 3.8 AND estado='activo' ORDER BY precio ASC";
      }
      else
      if ($_GET['filtro'] == 'recientes') {
        $sql = "SELECT*FROM productos 
        WHERE categoria = $categoria2
        AND calificacion > 3.8 AND estado='activo' ORDER BY id DESC";
      }
      }else {
      $sql = "SELECT*FROM productos 
      WHERE categoria = $categoria2
      AND calificacion > 3.8 AND estado='activo'";}
    } 
    else if (isset($_GET['filtro'])) {
     
      if ($_GET['filtro'] == 'mayorprecio') {
        $sql = "SELECT*FROM productos
         WHERE estado='activo' ORDER BY precio DESC";
    }else if ($_GET['filtro'] == 'menorprecio') {
  
      $sql = "SELECT*FROM productos 
      WHERE estado='activo' ORDER BY precio ASC";
    }
    else
    if ($_GET['filtro'] == 'recientes') {
      $sql = "SELECT*FROM productos 
      WHERE estado='activo' ORDER BY id DESC";
    }
    }
    else {
      $sql = "SELECT * FROM productos 
      WHERE estado='activo'";
  
    }

   }else {
  if (isset($_GET['descuento'])) {
    if (isset($_GET['filtro'])) {
   
      if ($_GET['filtro'] == 'mayorprecio') {
    
        $sql = "SELECT id, nombre, precio, descuento, id_empresa, precio - (precio * (descuento / 100)) AS precio_con_descuento FROM productos 
        WHERE id_empresa = $_GET[empresa] AND categoria = $categoria2
        AND  estado = 'activo' AND descuento>0 
        ORDER BY precio_con_descuento DESC";
      
    }else if ($_GET['filtro'] == 'menorprecio') {

      $sql = "SELECT id, nombre, precio, descuento, id_empresa , precio - (precio * (descuento / 100)) AS precio_con_descuento FROM productos 
        WHERE  id_empresa = $_GET[empresa] AND categoria = $categoria2
        AND  estado = 'activo' AND descuento>0 
        ORDER BY precio_con_descuento ASC";
    }
    else
    if ($_GET['filtro'] == 'recientes') {
      $sql = "SELECT * FROM productos 
      WHERE id_empresa = $_GET[empresa] AND categoria = $categoria2  AND descuento>0
      AND estado = 'activo' ORDER BY id DESC";
    }
    }else {
    
    $sql = "SELECT * FROM productos 
    WHERE id_empresa = $_GET[empresa] AND categoria = $categoria2
     AND descuento > 0 AND estado='activo'";
    }
  }
  else if (isset($_GET['mascomprados'])) {

    if (isset($_GET['filtro'])) {
   
      if ($_GET['filtro'] == 'mayorprecio') {
    
        $sql = "SELECT DISTINCT productos.* FROM productos 
        JOIN carrito_compras ON productos.id = carrito_compras.id_producto 
        WHERE id_empresa = $_GET[empresa] AND categoria = $categoria2
        AND carrito_compras.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.precio DESC";
      
    }else if ($_GET['filtro'] == 'menorprecio') {

      $sql = "SELECT DISTINCT productos.* FROM productos 
      JOIN carrito_compras ON productos.id = carrito_compras.id_producto 
      WHERE id_empresa = $_GET[empresa] AND categoria = $categoria2
      AND carrito_compras.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.precio ASC";
    }
    else
    if ($_GET['filtro'] == 'recientes') {
      $sql = "SELECT DISTINCT productos.* FROM productos 
      JOIN carrito_compras ON productos.id = carrito_compras.id_producto 
      WHERE id_empresa = $_GET[empresa] AND categoria = $categoria2
      AND carrito_compras.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.id DESC";
    }
  }else {
   $sql = "SELECT DISTINCT productos.* FROM productos 
   JOIN carrito_compras ON productos.id = carrito_compras.id_producto 
   WHERE id_empresa = $_GET[empresa] AND categoria = $categoria2
   AND carrito_compras.estado = 'activo' AND productos.estado = 'activo'";}
  
}
  else if (isset($_GET['populares'])) {
    if (isset($_GET['filtro'])) {
   
      if ($_GET['filtro'] == 'mayorprecio') {
    
        $sql = "SELECT DISTINCT productos.* FROM productos 
   JOIN lista_deseos ON productos.id = lista_deseos.id_producto 
   WHERE id_empresa = $_GET[empresa] AND categoria = $categoria2
   AND lista_deseos.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.precio DESC";
      
    }else if ($_GET['filtro'] == 'menorprecio') {

      $sql = "SELECT DISTINCT productos.* FROM productos 
      JOIN lista_deseos ON productos.id = lista_deseos.id_producto 
      WHERE id_empresa = $_GET[empresa] AND categoria = $categoria2
      AND lista_deseos.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.precio ASC";
    }
    else
    if ($_GET['filtro'] == 'recientes') {
      $sql = "SELECT DISTINCT productos.* FROM productos 
      JOIN lista_deseos ON productos.id = lista_deseos.id_producto 
      WHERE id_empresa = $_GET[empresa] AND categoria = $categoria2
      AND lista_deseos.estado = 'activo' AND productos.estado = 'activo' ORDER BY productos.id DESC";
    }
  }else {
    $sql = "SELECT DISTINCT productos.* FROM productos 
   JOIN lista_deseos ON productos.id = lista_deseos.id_producto 
   WHERE id_empresa = $_GET[empresa] AND categoria = $categoria2
   AND lista_deseos.estado = 'activo' AND productos.estado = 'activo'";
  }
}
else if (isset($_GET['puntuados'])) {
    if (isset($_GET['filtro'])) {
   
      if ($_GET['filtro'] == 'mayorprecio') {
      if (isset($_GET['descuento'])) {
        $sql = "SELECT*FROM productos 
        WHERE id_empresa = $_GET[empresa] AND categoria = $categoria2
        AND calificacion > 3.8 AND estado='activo' ORDER BY precio DESC";
      }
    }else if ($_GET['filtro'] == 'menorprecio') {

      $sql = "SELECT*FROM productos 
      WHERE id_empresa = $_GET[empresa] AND categoria = $categoria2
      AND calificacion > 3.8 AND estado='activo' ORDER BY precio ASC";
    }
    else
    if ($_GET['filtro'] == 'recientes') {
      $sql = "SELECT*FROM productos 
      WHERE id_empresa = $_GET[empresa] AND categoria = $categoria2
      AND calificacion > 3.8 AND estado='activo' ORDER BY id DESC";
    }
    }else {
    $sql = "SELECT*FROM productos 
    WHERE id_empresa = $_GET[empresa] AND categoria = $categoria2
    AND calificacion > 3.8 AND estado='activo'";}
  } 
  else if (isset($_GET['filtro'])) {
   
    if ($_GET['filtro'] == 'mayorprecio') {
      $sql = "SELECT*FROM productos
       WHERE id_empresa = $_GET[empresa]
      AND estado='activo' ORDER BY precio DESC";
  }else if ($_GET['filtro'] == 'menorprecio') {

    $sql = "SELECT*FROM productos 
    WHERE id_empresa = $_GET[empresa]
     AND estado='activo' ORDER BY precio ASC";
  }
  else
  if ($_GET['filtro'] == 'recientes') {
    $sql = "SELECT*FROM productos 
    WHERE id_empresa = $_GET[empresa]
    AND estado='activo' ORDER BY id DESC";
  }
  }
  else {
    $sql = "SELECT * FROM productos 
    WHERE id_empresa = $_GET[empresa]
    AND estado='activo'";

  }
}
return $sql;
}

public function descuentos(){

   if (isset($_GET['filtro'])) {
     
      if ($_GET['filtro'] == 'mayorprecio') {
        $sql = "SELECT*FROM productos
         WHERE descuento>0 AND estado='activo' ORDER BY precio DESC";
    }else if ($_GET['filtro'] == 'menorprecio') {
  
      $sql = "SELECT*FROM productos 
      WHERE  descuento>0 AND estado='activo' ORDER BY precio ASC";
    }
    else
    if ($_GET['filtro'] == 'recientes') {
      $sql = "SELECT*FROM productos 
      WHERE  descuento>0 AND estado='activo' ORDER BY id DESC";
    }
    }
    else {
      $sql = "SELECT * FROM productos 
      WHERE descuento>0 AND estado='activo'";
  
    }
return $sql;
}

}
?>