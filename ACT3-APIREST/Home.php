<?php

namespace App\Controllers;
// use App\Models

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    } 
    

    public function prueba ()
    {
        echo 'hola esto es una prueba';
    }

    public function api ()
    {


        $usuarios= array (
            "usuario"=>"Nachi",
            "nombres"=>"Michel Plaza",
            "Ciudad"=>"Pajan",
            "Direccion"=>"Cascol, Av 13 de diciembre",
            "telefono"=>"+593999368721"

        );


        return $this->response->setJSON($usuarios);

    }


    public function login(){

return view('login');
    
    }


    public function datosbd()
    {
    
        $this->db=\Config\Database::connect();
        $query=$this->db->query("SELECT idcliente, nombres, apellidos, cedula, direccion, telefono FROM public.datosclientes ");
        $result=$query->getResult();
        return $this->response->setJSON($result);

        // echo "hola";
    }

    public function testbd($cedula)
    {

        $this->db=\Config\Database::connect();
        $query=$this->db->query("SELECT idcliente, nombres, apellidos, cedula, direccion, telefono
        FROM public.datosclientes where cedula='$cedula'  ");
        $result=$query->getResult();
        return $this->response->setJSON($result);

    
    }

}
