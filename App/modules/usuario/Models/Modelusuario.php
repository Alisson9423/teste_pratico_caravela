<?php

namespace App\modules\usuario\Models;
use App\lib\Model;


/**
 * Description of homeModel
 *
 * @author Alisson
 */
class Modelusuario extends Model{

    public function consulta(){
       return $this->Select('usuarios');
    }

    public function add($inf){
        $inf['senha'] = md5( $inf['senha']);
        echo ($this->Insert($inf,'usuarios')['sucess'])?mensagemUsuario('add'):"Ja Existe Este  Usuário"; 
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
            logar($dados_login);
            echo "1";
        }else{
            echo "Usuario ou Senha Não Confere";
        }
        
    }


    public function atualizar_adm($id){
        $sql = "select u.img from usuarios u
        where id_usuario = {$id} ";
        $result = $this->linhaLeft($sql);
        echo $result->img;
    }


}
