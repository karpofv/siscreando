<?php

  /**
   * Clase para registrar
   */
  class UsuariosModel {

    public function registrarmensaje($nombre,$correo,$asunto,$mensaje){
      $conexion = new Conexion;
      $conectar = $conexion->obtenerConexionMy();
      $sql = "INSERT INTO mensajes (men_fecha, men_nombre, men_correo, men_asunto, men_mensaje) VALUES (now(),:nombre,:correo,:asunto,:mensaje)";


      $preparar = $conectar->prepare($sql);
      $preparar->bindValue(':nombre',$nombre);
      $preparar->bindValue(':correo',$correo);
      $preparar->bindValue(':asunto',$asunto);
      $preparar->bindValue(':mensaje',$mensaje);

      if (!$preparar) {
        return "0";
      }else{
        $preparar->execute();
        return "1";
      }
    }
  }
 ?>
