<?php
class Model_Solicitud extends CI_Model
{

  public function productos()
  {
    $this->load->database();
    $query = $this->db->query("

    select idProductos, descripcionProducto from RpCatProductos;

      ");
    return $query->result();
  }

  public function guardarSolicitud($codigoSolicitud, $usuarioAdiciono, $dpi, $correo, $telefono, $latitud, $longitud, $desc, $fecha, $productos)
  {

    $this->load->database();

    $query = $this->db->query("
      
        insert into RpPedidos(
          numeroPedido,
          UbicacionEntrega,
          usuarioIngreso,
          fechaIngreso,
          idEstados,
          descripcion,
          Dpi,
          telefono,
          correo,
          idProductos,
          latitud,
          longitud
         )values(
           '" . $usuarioAdiciono . "',
           '" . $latitud . ',' . $longitud . "',
           '" . $codigoSolicitud . "',
           STR_TO_DATE('" . $fecha . "', '%d-%m-%Y %H:%i:%s'),
           3,
           '" . $desc . "',
           '" . $dpi . "',
           '" . $telefono . "',
           '" . $correo . "',
           '" . $productos . "',
           '" . $latitud . "',
           '" . $longitud . "'
           )
      
        ");
  }

  public function datos($id)
  {
    $this->load->database();
    $query = $this->db->query("
    
        select * from RpPedidos where idRpPedidos = '" . $id . "'
    
          ");
    return $query->result();
  }

  public function datosSolicitud()
  {
    $this->load->database();
    $query = $this->db->query("
    
        select pe.idRpPedidos, pe.numeroPedido, pe.fechaEntrega, pe.Dpi, pe.usuarioIngreso, pe.latitud, pe.longitud,
	      pe.fechaIngreso, pe.descripcion, pe.telefono, pe.correo, pro.descripcionProducto, est.Nombrestado 
        from RpPedidos as pe inner join Estados est inner join RpCatProductos pro
        where pe.idEstados = est.idEstados and pe.idProductos = pro.idProductos
    
          ");
    return $query->result();
  }

  public function datosSolicitudClientes()
  {
    $this->load->database();
    $query = $this->db->query("
    
        select pe.idRpPedidos, pe.numeroPedido, pe.fechaEntrega, pe.Dpi, pe.usuarioIngreso, pe.latitud, pe.longitud,
	      pe.fechaIngreso, pe.descripcion, pe.telefono, pe.correo, pro.descripcionProducto, est.Nombrestado 
        from RpPedidos as pe inner join Estados est inner join RpCatProductos pro
        where pe.idEstados = est.idEstados and pe.idProductos = pro.idProductos and est.Nombrestado != 'Creado'
  
 
    
          ");
    return $query->result();
  }

  public function datosPorCliente($dpi)
  {
    $this->load->database();
    $query = $this->db->query("
    
        select pe.idRpPedidos, pe.numeroPedido, pe.fechaEntrega, pe.Dpi, pe.usuarioIngreso,
	      pe.fechaIngreso, pe.descripcion, pe.telefono, pe.correo, pro.descripcionProducto, est.Nombrestado 
        from RpPedidos as pe inner join Estados est inner join RpCatProductos pro
        where pe.idEstados = est.idEstados and pe.idProductos = pro.idProductos and pe.Dpi = '" . $dpi . "';
    
          ");
    return $query->result();
  }

  public function asignar($id, $asignado)
  {

    $this->load->database();
    $query =  $this->db->query("
      update RpPedidos
        set idRpPedidos='" . $id . "',
        dpiTransAsigRuta= '" . $asignado . "',
        idEstados = '4'
           where idRpPedidos ='" . $id . "'
      
      ");
  }

  public function enproceso($id)
  {

    $this->load->database();
    $query =  $this->db->query("
        update RpPedidos
          set idRpPedidos='" . $id . "',
          idEstados = '5'
             where idRpPedidos ='" . $id . "'
        
        ");
  }

  public function finalizado($id, $fechaEntrega)
  {

    $this->load->database();
    $query =  $this->db->query("
        update RpPedidos
          set idRpPedidos='" . $id . "',
          fechaEntrega = STR_TO_DATE('" . $fechaEntrega . "', '%d-%m-%Y %H:%i:%s'),
          idEstados = '6'
             where idRpPedidos ='" . $id . "'
        
        ");
  }
}
