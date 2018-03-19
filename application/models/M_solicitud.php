<?php

class M_solicitud extends  CI_Model{
    function __construct(){
        parent::__construct();
    }

    function insertarDatos($arrayInsert, $tabla){
        $this->db->insert($tabla, $arrayInsert);
        $sol = $this->db->insert_id();
        if($this->db->affected_rows() != 1) {
            throw new Exception('Error al insertar');
            $data['error'] = EXIT_ERROR;
        }
        return array("error" => EXIT_SUCCESS, "msj" => MSJ_INS, "Id" => $sol);
    }

    function updateDatos($arrayData, $id, $tabla){
        $this->db->where('Id'  , $id);
        $this->db->update($tabla, $arrayData);
        if ($this->db->trans_status() == false) {
            throw new Exception('No se pudo actualizar los datos');
        }
        return array('error' => EXIT_SUCCESS,'msj' => MSJ_UPT);
    }

    function getTotal($id_user) {
        $sql = "SELECT SUM(a.monto) AS total
                  FROM anotacion a,
                       users u
                 WHERE a.Id_user = u.Id
                   AND a.documento IS NOT NULL
                   AND a.Id_user = ?";
        $result = $this->db->query($sql, $id_user);
        return $result->result();
    }

    function getDatosTabla($id_user) {
        $sql = "SELECT a.*,
                       u.Nombre
                  FROM anotacion a,
                       users u
                 WHERE a.Id_user = u.Id
                   AND a.Id_user = ?";
        $result = $this->db->query($sql, $id_user);
        return $result->result();
    }

    function get5Primeros() {
        $sql = "SELECT a.*,
                       u.Nombre,
                       u.Nombre_canal AS Canal
                  FROM anotacion a,
                       users u
                 WHERE a.Id_user = u.Id
                 GROUP BY a.Id_user
                ORDER BY SUM(a.monto) DESC
                LIMIT 5";
        $result = $this->db->query($sql);
        return $result->result();
    }

    function get5PrimerosMes($mes) {
        $sql = "SELECT a.*,
                       u.Nombre
                  FROM anotacion a,
                       users u
                 WHERE a.Id_user = u.Id
                   AND SUBSTRING(a.fecha, 6, 2) = ?
                 GROUP BY a.Id_user
                ORDER BY SUM(a.monto) DESC
                LIMIT 5";
        $result = $this->db->query($sql, $mes);
        return $result->result();
    }

    function getTotalMes($id_user, $mes) {
        $sql = "SELECT SUM(a.monto) AS total
                  FROM anotacion a,
                       users u
                 WHERE a.Id_user = u.Id
                   AND a.documento IS NOT NULL
                   AND SUBSTRING(a.fecha, 6, 2) = '".$mes."'
                   AND a.Id_user = ".$id_user."";
        $result = $this->db->query($sql);
        return $result->result();
    }

    function rankingTotal(){
      $sql = "SELECT    p.Nombre, p.Id,
                        @curRank := @curRank + 1 AS rank
              FROM      users p, (SELECT @curRank := 0) r
              GROUP BY p.Id
              ORDER BY  p.total DESC";
      $result = $this->db->query($sql);
       return $result->result();
    }
}