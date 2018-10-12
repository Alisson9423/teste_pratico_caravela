<?php

namespace App\modules\cadastro\controllers;
use App\lib\Controller;
use App\modules\cadastro\Models\Modeljogadores;

class Controllerjogador extends Controller{

    public function index(){
        $db_model = new Modeljogadores();
        $this->jogadores = $db_model->lista();
        $this->load('jogador');
    }
    
    public function adicionar(){
        $this->load('adicionar');
    }

    public function editar($id){
        $db_model = new Modeljogadores();
        $this->jogador = $db_model->procurar($id);
        $this->load('editar');
    }

    public function add($id){
        $db_model = new Modeljogadores();
        $valor = filter_input_array(INPUT_POST,FILTER_DEFAULT);
        return $db_model->add($valor['inf'],$id);        
    }

    public function edit($id){
        $db_model = new Modeljogadores();
        $valor = filter_input_array(INPUT_POST,FILTER_DEFAULT);
        return $db_model->edit($valor['inf'],$id); 
    }
    
    public function del($id){
        $db_model = new Modeljogadores();
        return $db_model->del($id); 
    }
    
        


    
    
}
