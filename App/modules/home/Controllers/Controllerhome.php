<?php

namespace App\modules\home\controllers;
use App\lib\Controller;
use App\modules\home\Models\Modelhome;

class Controllerhome extends Controller{

    public function index(){
        if(!empty($_COOKIE['d'])):
            $db_model = new Modelhome();
            $this->jogadores = $db_model->lista();
            $this->load();
        else:
            $this->onePage('login');
        endif;
    }
    
    public function adicionar(){
        $db_model = new Modelhome();
        $this->teste = $db_model->consulta();
        $this->load('adicionar');
    }

    public function add(){
        $db_model = new Modelhome();
        $valor = filter_input_array(INPUT_POST,FILTER_DEFAULT);
        return $db_model->add($valor['inf']);        
    }

    public function login(){
        $db_model = new Modelhome();
        $valor = filter_input_array(INPUT_POST,FILTER_DEFAULT);
        $db_model->login($valor['inf']);
    }

    public function Logout(){
        logout($_COOKIE);
    }
        
    
    
}
