<?php

namespace App\Controllers;
use App\Models\usuarioModel;

class Saludos extends BaseController
{

    protected $datos=null;

    public function __construct(){
        $this->datos = new usuarioModel();
    }

    public function index()
    {

        $resp=$this->datos->selectUsuarios();
        $respRol=$this->datos->selectRoles();

        $dato['resp']=$resp;
        $dato['rol']=$respRol;

        return view('layouts/header').view('layouts/aside').view('pagina_web/usuarios', $dato).view('layouts/footer');
    }


    public function guardarUsuario(){
        $data=['nombre'=> $_POST['nombre'],
               'apellido'=> $_POST['apellido'],
               'cedula'=> $_POST['cedula'],
               'correo'=> $_POST['correo'],
               'rolUsuario'=> $_POST['rolUsuario'],

               ];

        $this->datos->insertUsuarios($data);

        return $this->index();

    }

    public function updateUsuario()
    {
        $usuId = $this->request->getPost('idU'); 
        $resp = $this->datos->getUsuarioModel($usuId);
    
        return $this->response->setJSON($resp); 
    }

    public function buscarU()
    {
        $ced = $this->request->getPost('cedU'); 
        $resp = $this->datos->buscarUsuarioModel($ced);
    
        return $this->response->setJSON($resp);

    }



    public function actualizarU(){
        $nombre= $_POST['n'];
        $apellido= $_POST['a'];
        $cedula= $_POST['c'];
        $correo= $_POST['e'];
        $rol= $_POST['r'];


        $resp = $this->datos->actualizarUModel($nombre, $apellido, $correo,$rol, $cedula);

        return $resp;

    }

    public function eliminarU(){


        $id=$_POST['id'];

        $resp=$this->datos->eliminarUModel($id);

        return $resp;

    }
}
