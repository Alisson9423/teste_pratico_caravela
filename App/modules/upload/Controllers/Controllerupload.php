<?php

namespace App\modules\upload\controllers;
use App\lib\Controller;
use App\modules\upload\Models\Modelupload;


class Controllerupload extends Controller{
    public function upload(){
        $db_model = new Modelupload();
        $valor = filter_input_array(INPUT_POST,FILTER_DEFAULT);
        $file = $_FILES['myfile'];
        $id = trata_string_input($valor['id']);
        return $db_model->upload($file,$id);
        
    }
    
    public function usuario(){
        $db_model = new Modelupload();
        $file = $_FILES['myfile'];
        $valor = filter_input_array(INPUT_POST,FILTER_DEFAULT);
        $id = trata_string_input($valor['id']);
        return $db_model->usuario($file,$id);
        
    }
    
    public function usuario_adm(){
        $db_model = new Modelupload();
        $valor = filter_input_array(INPUT_POST,FILTER_DEFAULT);
        $file = $_FILES['myfile'];
        $id = trata_string_input($valor['id']);
        return $db_model->usuario_adm($file,$id);
        
    }
    
    public function produto(){
        $db_model = new Modelupload();
        $valor = filter_input_array(INPUT_POST,FILTER_DEFAULT);
        $file = $_FILES['myfile'];
        
        return $db_model->produto($file,trata_numero_input($valor['id']));
        
    }
    
}
