<?php

namespace App\modules\sorteio\Models;
use App\lib\Model;


/**
 * Description of homeModel
 *
 * @author Alisson
 */
class Modelsorteios extends Model{

    public function lista(){
        $sql = "select * from jogadores order by nome";
        return $this->SelectLeft($sql);
    }

    public function procurar($id){
        return $this->Linha("jogadores","id_jogador",$id);
    }

    public function add($inf){
        echo ($this->Insert($inf,'jogadores')['sucess'])?mensagemUsuario('add'):"Ja Existe Este  Usuário"; 
    }

    public function edit($inf,$id){
        echo ($this->Update($inf ,"jogadores" , "id_jogador" , $id)['sucess'])?mensagemUsuario('edit'):"Algo deu Errado :(";
    }

    public function del($id){
        echo ($this->Delete("jogadores","id_jogador",$id)['sucess'])? mensagemUsuario('del'):"Algo deu Errado :(";
    }

}