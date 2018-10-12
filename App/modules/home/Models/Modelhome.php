<?php

namespace App\modules\home\Models;
use App\lib\Model;


/**
 * Description of homeModel
 *
 * @author Alisson
 */
class Modelhome extends Model{

    public function consulta(){
        return $this->select('usuarios');
    }

    public function lista(){
        $sql = "select * from jogadores order by nome";
        return $this->SelectLeft($sql);
    }

    public function add($inf){
        $inf['senha'] = md5( $inf['senha']);
        echo ($this->Insert($inf,'usuarios')['sucess'])?mensagemUsuario('add'):"Algo de Errado Ocorreu :("; 
    }


    public function login($inf){
        
        $sql = "select * from usuarios 
        where usuario = '".$inf['usuario']."' and senha = '".md5($inf['senha'])."'";
        
        
        $result = $this->linhaLeft($sql);

        if(($result->usuario == $inf['usuario']) && ($result->senha == md5($inf['senha']))){
            $dados_login['a'] = ((!empty($result->id_usuario)?$result->id_usuario:null));
            $dados_login['b'] = ((!empty($result->usuario))?$result->usuario:null);
            $dados_login['c'] = ((!empty($result->nome))?$result->nome:null);
            $dados_login['d'] = ((!empty($result->nivel))?$result->nivel:null);
            $dados_login['e'] = ((!empty($result->img))?$result->img:null);
            logar($dados_login);
            echo "1";
        }else{
            echo "Usuario ou Senha Não Confere";
        }
        
    }


}
