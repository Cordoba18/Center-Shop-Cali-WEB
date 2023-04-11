<?php 
include_once ("../sql/Conexion.php");
 include_once ("../modelo/Usuario.php");
class consulta{


    public function ingresar($correo, $contrasena){

        $con = conectar();
      $sql = "SELECT*FROM user WHERE correo='".$correo."' AND contraseña='".$contrasena."' AND estado='activado'";  
      $query = mysqli_query($con,$sql);
      $filas = mysqli_num_rows($query);
      $mostrar = mysqli_fetch_array($query);
      if($filas){
        header("location: Tabla.php?id=".$mostrar['id']."");
       
      }else{
        echo "<center><p> <font color ='red'>USUARIO NO EXISTENTE O INACTIVO</font></p><center/>";
    
      }
      mysqli_close($con);
      
    }

    public function consultarU($correo){

      $con = conectar();
    $sql = "SELECT*FROM user WHERE correo='".$correo."' AND estado='activado'";  
    $query = mysqli_query($con,$sql);
    $filas = mysqli_num_rows($query);
    $mostrar = mysqli_fetch_array($query);
    if($filas){
      return true;
     
    }else{
      return false;
  
  
    }
    mysqli_close($con);
    
  }
    public function consultarcontra(Usuario $u){

        $con = conectar();
      $sql = "SELECT*FROM user WHERE contraseña='".$u ->getContrasena()."' AND id='".$u->getId()."'";  
      $query = mysqli_query($con,$sql);
      $filas = mysqli_num_rows($query);
      if($filas){
            return true;
       
      }else{
            return false;
    
      }
      mysqli_close($con);
      
    }


    public function verreserva(Usuario $u){
        $fecha = date('m/d/Y');
        $con = conectar();
      $sql = "SELECT*FROM reservas WHERE cedula='".$u->getCedula()."' AND discoteca='".$u->getDiscoteca()."' AND fecha='$fecha'";  
      $query = mysqli_query($con,$sql);
      $filas = mysqli_num_rows($query);
      if($filas){
            return true;
       
      }else{
            return false;
    
      }
      mysqli_close($con);
    }
    public function limitereserva(Usuario $u)
    {
        $fecha = date('m/d/Y');
        $con = conectar();
        $sql = "SELECT*FROM reservas WHERE discoteca='" . $u->getDiscoteca() . "' AND fecha='$fecha'";
        $query = mysqli_query($con, $sql);
        $filas = mysqli_num_rows($query);
        $numero = 0;
        while ($filas) {
            $numero = $numero + 1;
            echo $numero;
           if($numero>19){
                return true;
                

           } else
           {
            return false;
           }
        }
        mysqli_close($con);
    }

    public function insertar($correo, $contrasena, $nombre){

      $con = conectar();
      $sql = "INSERT INTO user (nombre, correo, contraseña, estado) VALUES ('".$nombre."', '".$correo."', '".$contrasena."', 'activado')";  
      $query = mysqli_query($con,$sql);
      if($query){

        header("location: Tabla.php");
       
      }else{
        echo "<center>NO SE PUDO CREAR<center/>";
    
      }
      mysqli_close($con);
    }
    public function Editar(Usuario $u){

        $con = conectar();
        $sql = "UPDATE `user` SET `nombre` = '".$u ->getNombre()."', `correo` = '".$u ->getCorreo()."' WHERE `id` = ".$u ->getId()."";  
        $query = mysqli_query($con,$sql);
        if($query){

            return true;
         
        }else{
            return false;
      
        }
        mysqli_close($con);
      }

    public function Eliminar($id){
      $con = conectar();
    $sql = "UPDATE `user` SET `estado` = 'inactivo' WHERE `user`.`id` =".$id."";  
    $query = mysqli_query($con,$sql);
    $resultado = false; 
    if($query){
      $resultado = true;
      return $resultado;
     
    }else{
      return $resultado;
  
    }
    mysqli_close($con);
  }
  public function Activar($id){
    $con = conectar();
  $sql = "UPDATE `user` SET `estado` = 'activado' WHERE `user`.`id` =".$id."";  
  $query = mysqli_query($con,$sql);
  $resultado = false; 
  if($query){
    $resultado = true;
    return $resultado;
   
  }else{
    return $resultado;

  }
  mysqli_close($con);
}

  public function verusuario($id){
    $u = new Usuario();
    $con = conectar();
  $sql = "SELECT*FROM user WHERE id=".$id." AND estado='activado'";  
  $result = mysqli_query($con, $sql);
   $mostrar = mysqli_fetch_array($result);
   $u ->setNombre($mostrar['nombre']);
   $u -> setCorreo($mostrar['correo']);
    return $u; 
    mysqli_close($con);
  
}
public function reserva(Usuario $u){
        $fecha = date('m/d/Y');
    $con = conectar();
    $sql = "INSERT INTO reservas (nombre,cedula, personas, cumpleanos, correo, discoteca, fecha) VALUES ('".$u->getNombre()."', '".$u->getCedula()."',
     '".$u->getPersonas()."', '".$u->getCumpleaños()."', '".$u->getCorreo()."', '".$u->getDiscoteca()."','$fecha')";  
    $query = mysqli_query($con,$sql);
    if($query){

      header("location: ../index.php");
     
    }else{
      echo "<center>NO SE PUDO CREAR<center/>";
  
    }
        mysqli_close($con);
  }

}
?>