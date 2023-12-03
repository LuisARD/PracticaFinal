<?php
class DBGestLib {

     private function getConexion(){
       $servidor = 'sql213.infinityfree.com';
       $dataBase = 'if0_35533273_db_libreria';
       $dns = "mysql:host=$servidor;dbname=$dataBase";
       $user = 'if0_35533273';
       $password = 'nitPNddNbZQ';

        $obPDO = new PDO ($dns, $user, $password);
        return $obPDO;
     }

     public function getUsuarios($id){
      $id = intval($id);

      $objBD = $this->getConexion();
      $sql = "SELECT * FROM usuarios WHERE id = :id";
      $stmt = $objBD->prepare($sql);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT); 

      try {
          $stmt->execute();
          $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
          if ($resultados && count($resultados) > 0) {
              return $resultados;
          } else {
              return array();
          }
      } catch (PDOException $e) {
          return false; // Si hay algún error, devuelve falso
      }
     }

     public function getLastInsertedID() {
      $conexion = $this->getConexion();
    $sql = "SELECT LAST_INSERT_ID() AS id";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['id'];
     }

     public function insertContacto($nombre, $correo, $asunto, $fecha, $comentario) {
        $objBD = $this->getConexion();
        $sql = "INSERT INTO Contactos (fecha, correo, asunto, nombre, comentario) VALUES (:fecha, :correo, :asunto, :nombre, :comentario)";
        $stmt = $objBD->prepare($sql);

        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':correo', $correo);
         $stmt->bindParam(':asunto', $asunto);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':comentario', $comentario);

        try {
            $stmt->execute();
            $nuevoUsuarioID = $objBD->lastInsertId();
            return $nuevoUsuarioID;
        } catch (PDOException $e) {
            return false; // Si hay algún error, devuelve falso
        }
        $conexion = $this->getConexion();

        return $conexion->lastInsertId();
     }
     public function getAutores() {
        $objBD = $this->getConexion();
        $sql = "SELECT nombre, apellido, id_autor, telefono, ciudad, pais FROM autores";
    
        try {
            $statement = $objBD->prepare($sql);
            $statement->execute();
            $resultados = $statement->fetchAll(PDO::FETCH_ASSOC);
    
            return $resultados;
        } catch (PDOException $e) {
            return false; // Si hay algún error, devuelve falso
        }
    }
    
    public function getObras() {
        $objBD = $this->getConexion();
        $sql = "SELECT titulo, precio, notas, fecha_pub FROM titulos";
    
        try {
            $statement = $objBD->prepare($sql);
            $statement->execute();
            $resultados = $statement->fetchAll(PDO::FETCH_ASSOC);
    
            return $resultados;
        } catch (PDOException $e) {
            return false; // Si hay algún error, devuelve falso
        }
    }
    
    

}
?>