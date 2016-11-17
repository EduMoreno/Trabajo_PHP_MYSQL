<?php
//inicio sesion
class sesion {
    //inicio constructor
  function __construct() {
     session_start (); //inicio la sesion
  }
  public function set($nombre, $valor) {
     $_SESSION [$nombre] = $valor; // guarda un valor en este caso el valor del usuario
  }
  public function get($nombre) {
     if (isset ( $_SESSION [$nombre] )) {
        return $_SESSION [$nombre]; //devuelve el valor del usuario
     } else {
         return false; // en caso de fallo no devuelve el valor del usuario
     }
  }
 
  public function termina_sesion() {
      $_SESSION = array();
      session_destroy (); //Termina la sesion
  }
}
?>