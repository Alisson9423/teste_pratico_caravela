<?php

namespace App\modules\usuario\controllers;
use App\lib\Controller;
use App\modules\usuario\Models\Modelusuario;

class Controllerusuario extends Controller{

    public function index(){
        $db_model = new Modelusuario();

        $this->listas = $db_model->consulta();
        $this->load('usuario');
    }
    
    public function adicionar(){
        $db_model = new Modelusuario();
        $this->teste = $db_model->consulta();
        $this->load('adicionar');
    }

    public function add(){
        $db_model = new Modelusuario();
        $valor = filter_input_array(INPUT_POST,FILTER_DEFAULT);
        return $db_model->add($valor['inf']);        
    }

    public function perfil(){
        $this->load('perfil');
    }
    public function atualizar_img(){
        $db_model = new Modelusuario();
        $valor = filter_input_array(INPUT_POST,FILTER_DEFAULT);
        $id = trata_string_input($valor['id']);
        return $db_model->atualizar_adm($id);
    }
        


    
    
}
