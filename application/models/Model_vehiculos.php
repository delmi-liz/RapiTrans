<?php
class Model_Vehiculos extends CI_Model
{
    public function guardarVehiculos($placa, $marca, $tipo, $modelo, $color, $usuarioAdiciono, $ip, $fecha)
    {

        $this->load->database();

        $query = $this->db->query("
      
        insert into RpCatVehiculos(
         placaVehiculo,
         marcaVehiculo,
         tipoVehiculo,
         modeloVehiculo,
         colorVehiculo,
         usuarioIngreso,
         fechaIngreso,
         idEstados,
         ipIngreso
         )values(
           '" . $placa . "',
           '" . $marca . "',
           '" . $tipo . "',
           '" . $modelo . "',
           '" . $color . "',
           '" . $usuarioAdiciono . "',
           STR_TO_DATE('" . $fecha . "', '%d-%m-%Y %H:%i:%s'),
           1,
           '" . $ip . "'
           )
      
        ");
    }

    public function datosVehículos()
    {
        $this->load->database();
        $query = $this->db->query("
    
        select vehi.idVehiculos, vehi.marcaVehiculo, vehi.placaVehiculo, vehi.tipoVehiculo, 
		vehi.modeloVehiculo, vehi.colorVehiculo, vehi.usuarioIngreso,
        vehi.fechaIngreso, vehi.ipIngreso, est.Nombrestado
        from RpCatVehiculos as vehi 
        inner join Estados est    
        where est.Nombrestado = 'Activo';
    
          ");
        return $query->result();
    }
}
