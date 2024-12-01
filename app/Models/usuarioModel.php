<?php

namespace App\Models;

use CodeIgniter\Model;

class usuarioModel extends Model
{
    protected $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function selectUsuarios()
    {
        $sql = "SELECT USU_NOMBRE as Nombre, USU_APELLIDO as Apellido, USU_IDENTIFICACION as Cédula,USU_CORREO as correo, USU_ID,r.ROL_NOMBRE as rol,r.ROL_ID
                    FROM tbl_usuarios as u
                    JOIN tbl_rol as r on r.ROL_ID=u.ROL_ID
                    WHERE USU_ESTADO=1;";

        $query = $this->db->query($sql);

        return $query->getResult(); 
    }


    public function selectRoles()
    {
        $sql = "SELECT r.ROL_ID, r.ROL_NOMBRE
FROM tbl_rol as r
WHERE r.ROL_ESTADO=1;";

        $query = $this->db->query($sql);

        return $query->getResult(); 
    }

    



    public function insertUsuarios($data){
        $sql="INSERT INTO tbl_usuarios (USU_NOMBRE, USU_APELLIDO, USU_IDENTIFICACION, USU_CORREO,ROL_ID) VALUES (?,?,?,?,?)";
        

        $this->db->query($sql,[$data['nombre'],$data['apellido'],$data['cedula'],$data['correo'],$data['rolUsuario']]);

        return $this->db->affectedRows() > 0;

    }


    public function getUsuarioModel($id)
    {
        $sql = "SELECT a.USU_NOMBRE, a.USU_APELLIDO, a.USU_IDENTIFICACION, a.USU_CORREO FROM tbl_usuarios as a WHERE USU_ID = ?";
        $query = $this->db->query($sql, [$id]); 
        return $query->getResult(); 
    }


    public function buscarUsuarioModel($ced)
    {
        $sql = "SELECT 
    USU_NOMBRE, USU_APELLIDO
    FROM tbl_usuarios 
    WHERE USU_IDENTIFICACION=?;";
        $query = $this->db->query($sql, [$ced]); 
        return $query->getResult(); 
    }

    
    
    public function actualizarUModel($nombre, $apellido, $correo,$rol, $cedula){

        $sql= "UPDATE tbl_usuarios SET USU_NOMBRE=?, USU_APELLIDO = ?, USU_CORREO=?,ROL_ID=? WHERE USU_IDENTIFICACION = ?";
        $query = $this->db->query($sql, array($nombre, $apellido, $correo,$rol,$cedula)); 
        return "Dato actualizado";
    }

    public function eliminarUModel($id){

        
     $sql="UPDATE tbl_usuarios SET USU_ESTADO = 0 WHERE USU_ID = ?;";


         $this->db->query($sql,[$id]);
         return "ha sido dao de baja";
    }

}