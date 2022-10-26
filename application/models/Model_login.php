<?php
class Model_Login extends CI_Model
{

  public function login($user,$pass){

    $this->load->database();
    $query = $this->db->query("
        select Dpi, Usuario, Password, Nombre, idTipo_Usuariofk from Usuarios
        where Usuario ='".$user."'
        and Password='".$pass."'
      ");
    return $query->result();

  }



}


 ?>
