<?php
require_once "app/models/paqueteModel.php";
class controladorController{
    private $model;

    public function __construct(){
        $this->model = new paqueteModel();
    }

    public function mostrarmenu(){
        include "app/views/menu.php";
    }

    public function registrarpaquete(){
        include "app/views/registrarpaquete.php";
    }

    public function registrartransporte(){
        include "app/views/registrartransporte.php";
    }

    public function registrartransportista(){
        include "app/views/registrartransportista.php";
    }

    public function registrarusuario(){
        include "app/views/registrarusuario.php";
    }

      public function consultarpaquete(){
        $usuarios = $this->model->consultarpaquete();
        include "app/views/consultarpaquete.php";
    }

    public function consultartrasporte(){
         $result = $this->model->consultartransporte();
        include "app/views/consultartransporte.php";
    }

    public function consultartransporista(){
         $result = $this->model->consultartransporte();
        include "app/views/consultartransportista.php";
    }

}