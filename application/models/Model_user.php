<?php
class Model_User extends CI_Model
{


  public function guardar($dpi, $nombre, $usuario, $password, $fecha, $correo)
  {

    $this->load->database();

    $query = $this->db->query("

  insert into Usuarios(
   Dpi,
   Usuario,
   Password,
   FechaCreacion,
   Nombre,
   idTipo_Usuariofk,
   Correo,
   idEstados
   )values(
     '" . $dpi . "',
     '" . $usuario . "',
     '" . $password . "',
     STR_TO_DATE('" . $fecha . "', '%d-%m-%Y %H:%i:%s'),
     '" . $nombre . "',
     1,
     '" . $correo . "',
     1
     )

  ");
  }

  public function guardarTransportistas($dpi, $nombre, $usuario, $password, $fecha, $correo)
  {

    $this->load->database();

    $query = $this->db->query("

  insert into Usuarios(
   Dpi,
   Usuario,
   Password,
   FechaCreacion,
   Nombre,
   idTipo_Usuariofk,
   Correo,
   idEstados
   )values(
     '" . $dpi . "',
     '" . $usuario . "',
     '" . $password . "',
     STR_TO_DATE('" . $fecha . "', '%d-%m-%Y %H:%i:%s'),
     '" . $nombre . "',
     2,
     '" . $correo . "',
     1
     )

  ");
  }

  public function validar_correo($correo)
  {
    $this->load->database();
    $query = $this->db->query("
      select  Usuario, Correo, Nombre
      from Usuarios
      where Correo = '" . $correo . "'
      ");
    return $query->result();
  }

  public function  password_update($pass, $nombre, $correo, $fechaMod)
  {
    $this->load->database();
    $query = $this->db->query("
        update Usuarios
          set
            Password = '" . $pass . "',
            FechaModificacion = STR_TO_DATE('" . $fechaMod . "', '%d-%m-%Y %H:%i:%s')
          where
            Nombre ='" . $nombre . "'
          and
            Correo ='" . $correo . "'
        ");
  }

  public function clientes()
  {
    $this->load->database();
    $query = $this->db->query("
  
      select usu.Dpi, usu.Nombre, usu.Usuario, usu.FechaCreacion, tipo.Tipo, est.Nombrestado from Usuarios as usu
      inner join Tipo_Usuario tipo inner join Estados est 
      where usu.idTipo_Usuariofk = tipo.idTipo_Usuario and  usu.idTipo_Usuariofk = 1 and est.Nombrestado = 'Activo';
  
  
  
  
        ");
    return $query->result();
  }

  public function transportistas()
  {
    $this->load->database();
    $query = $this->db->query("
  
      select usu.Dpi, usu.Nombre, usu.Usuario, usu.FechaCreacion, usu.FechaModificacion, usu.correo,
      tipo.Tipo, est.Nombrestado from Usuarios as usu
      inner join Tipo_Usuario tipo inner join Estados est 
      where usu.idTipo_Usuariofk = tipo.idTipo_Usuario 
      and  usu.idTipo_Usuariofk = 2 and est.Nombrestado = 'Activo';
  

        ");
    return $query->result();
  }


  public function selectid($id)
  {

    $this->load->database();

    $query = $this->db->query("
    
      select usu.Dpi, usu.Usuario, usu.Password, usu.Nombre, usu.correo
      from Usuarios as usu inner join Tipo_Usuario tp where idTipo_Usuariofk = tp.idTipo_Usuario and usu.Dpi ='" . $id . "';
  
    
      ");

    return $query->result();
  }


  public function update($dpi, $nombre, $correo, $fechamodi)
  {

    $this->load->database();
    $query =  $this->db->query("
      update Usuarios
        set Dpi='" . $dpi . "',
            Nombre = '" . $nombre . "',
            FechaModificacion = STR_TO_DATE('" . $fechamodi . "', '%d-%m-%Y %H:%i:%s'),   
            correo = '" . $correo . "'
            where Dpi ='" . $dpi . "'
      
      ");
  }


  /*public function update($dpi,$nombre,$tipo,$usuario,$password,$fechamodi){

$this->load->database();
$query =  $this->db->query("
update Usuarios
  set Dpi='".$dpi."',
     Usuario= '".$usuario."',
     Password= '".$password."',
     FechaModificacion = STR_TO_DATE('".$fechamodi."', '%d-%m-%Y %H:%i:%s'),
     Nombre = '".$nombre."',
     idTipo_Usuariofk = '".$tipo."'
     where Dpi ='".$dpi."'

");

}*/
}
