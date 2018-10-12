<?php

namespace App\modules\upload\Models;
use App\lib\Model;

/**
 * Description of homeModel
 *
 * @author Alisson
 */
class Modelupload extends Model{
   
    
    public function upload($arq,$id){
        $permisão = array('image/jpg','image/jpeg','image/pjpeg','image/png');
        $ext = (($arq['type'] == 'image/png')?'.jpg':'.jpg');
        $tamanho = 1024*1024*2;
        
        $pasta = 'Upload/Imagens/'.$id;
        $nome = md5(time()).$ext;
        
        if(!file_exists($pasta)){
            mkdir($pasta,0777);
            if($arq['size'] > $tamanho){
                echo 'Arquivo não pode ser maior que 2MB';
                }elseif(!in_array($arq['type'], $permisão)){
                    echo 'Apenas  imagens ';
                }else{
                    if(move_uploaded_file($arq['tmp_name'],$pasta.'/'.$nome)){
                        echo 'Arquivo enviado com sucesso !!!';
                        $this->Update(array("img"=>$nome), 'funcionario', 'id_funcionario', $id);
                    }else{
                        echo 'Errou ao enviar arquivo ';
                    }
            }
        }elseif(file_exists($pasta)){
            $scan = scandir($pasta);
            if(count($scan) > 2) {
                echo 'Usuario deve ter apenas uma  foto :D';
            }else{
                if($arq['size'] > $tamanho){
                echo 'Arquivo não pode ser maior que 2MB';
                }elseif(!in_array($arq['type'], $permisão)){
                    echo 'Apenas  imagens ';
                }else{
                    if(move_uploaded_file($arq['tmp_name'],$pasta.'/'.$nome)){
                        echo 'Arquivo enviado com sucesso !!!';
                        $this->Update(array("img"=>$nome), 'funcionario', 'id_funcionario', $id);
                    }else{
                        echo 'Errou ao enviar arquivo ';
                    }
                }
            }
        }
        

    }
    
    public function usuario($arq,$id){
        $permisão = array('image/jpg','image/jpeg','image/pjpeg','image/png');
        $ext = (($arq['type'] == 'image/png')?'.jpg':'.jpg');
        $tamanho = 1024*1024*2;
        
        
        $sql = "select p.img from pessoa_fisica p
	where id_pessoa_fisica = {$id}";
        
        $result = $this->Linha($sql);
        
        $caminho = 'Upload/Usuario/'.$id.'/'.((!empty($result->img))?$result->img:"");
        
        $pasta = 'Upload/Usuario/'.$id;
        $nome = md5(time()).$ext;
        
        if(!file_exists($pasta)){
            mkdir($pasta,0777);
            if($arq['size'] > $tamanho){
                echo 'Arquivo não pode ser maior que 2MB';
                }elseif(!in_array($arq['type'], $permisão)){
                    echo 'Apenas  imagens ';
                }else{
                    if(move_uploaded_file($arq['tmp_name'],$pasta.'/'.$nome)){
                        echo 'Arquivo enviado com sucesso !!!';
                        $this->Update(array("img"=>$nome), 'pessoa_fisica', 'id_pessoa_fisica', $id);
                        setcookie('img',base64_encode($nome),time()+3600,'/');
                    }else{
                        echo 'Errou ao enviar arquivo ';
                    }
            }
        }elseif(file_exists($pasta)){
            $scan = scandir($pasta);
            if(count($scan) > 2) {
                
                if($arq['size'] > $tamanho){
                echo 'Arquivo não pode ser maior que 2MB';
                }elseif(!in_array($arq['type'], $permisão)){
                    echo 'Apenas  imagens ';
                }else{
                    if(move_uploaded_file($arq['tmp_name'],$pasta.'/'.$nome)){
                        @unlink($caminho);
                        $this->Update(array("img"=>$nome), 'pessoa_fisica', 'id_pessoa_fisica', $id);
                        setcookie('img',base64_encode($nome),time()+3600,'/');
                        echo 'Foto Atualizada !!!';
                    }else{
                        echo 'Errou ao enviar arquivo ';
                    }
                }
                
                
            }else{
                if($arq['size'] > $tamanho){
                echo 'Arquivo não pode ser maior que 2MB';
                }elseif(!in_array($arq['type'], $permisão)){
                    echo 'Apenas  imagens ';
                }else{
                    if(move_uploaded_file($arq['tmp_name'],$pasta.'/'.$nome)){
                        echo 'Arquivo enviado com sucesso !!!';
                        $this->Update(array("img"=>$nome), 'pessoa_fisica', 'id_pessoa_fisica', $id);
                    }else{
                        echo 'Errou ao enviar arquivo ';
                    }
                }
            }
        }
        

    }
    
    public function usuario_adm($arq,$id){
        $permisão = array('image/jpg','image/jpeg','image/pjpeg','image/png');
        $ext = (($arq['type'] == 'image/png')?'.jpg':'.jpg');
        $tamanho = 1024*1024*2;
        
        $sql = "select u.img from usuarios u 
                where id_usuario = {$id}"; 
        
        $result = $this->linhaLeft($sql);
        
        $caminho = 'Upload/Usuario/'.$id.'/'.$result->img;
        
        $pasta = 'Upload/Usuario/'.$id;
        $nome = md5(time()).$ext;
        
        if(!file_exists($pasta)){
            mkdir($pasta,0777);
            if($arq['size'] > $tamanho){
                echo 'Arquivo não pode ser maior que 2MB';
                }elseif(!in_array($arq['type'], $permisão)){
                    echo 'Apenas  imagens ';
                }else{
                    if(move_uploaded_file($arq['tmp_name'],$pasta.'/'.$nome)){
                        echo 'Arquivo enviado com sucesso !!!';
                        $this->Update(array("img"=>$nome), 'usuarios', 'id_usuario', $id);
                        setcookie('e',base64_encode($nome),time()+3600,'/');
                    }else{
                        echo 'Errou ao enviar arquivo ';
                    }
            }
        }elseif(file_exists($pasta)){
            $scan = scandir($pasta);
            if(count($scan) > 2) {
                
                if($arq['size'] > $tamanho){
                echo 'Arquivo não pode ser maior que 2MB';
                }elseif(!in_array($arq['type'], $permisão)){
                    echo 'Apenas  imagens ';
                }else{
                    if(move_uploaded_file($arq['tmp_name'],$pasta.'/'.$nome)){
                        @unlink($caminho);
                        $this->Update(array("img"=>$nome), 'usuarios', 'id_usuario', $id);
                        setcookie('e',base64_encode($nome),time()+3600,'/');
                        echo 'Foto Atualizada !!!';
                    }else{
                        echo 'Errou ao enviar arquivo ';
                    }
                }
                
                
            }else{
                if($arq['size'] > $tamanho){
                echo 'Arquivo não pode ser maior que 2MB';
                }elseif(!in_array($arq['type'], $permisão)){
                    echo 'Apenas  imagens ';
                }else{
                    if(move_uploaded_file($arq['tmp_name'],$pasta.'/'.$nome)){
                        echo 'Arquivo enviado com sucesso !!!';
						
                        $this->Update(array("img"=>$nome), 'usuarios', 'id_usuario', $id);
						setcookie('e',base64_encode($nome),time()+3600,'/');
                    }else{
                        echo 'Errou ao enviar arquivo ';
                    }
                }
            }
        }
        

    }
    
   
    public function produto($arq,$id){
        $permisão = array('image/jpg','image/jpeg','image/pjpeg','image/png');
        $ext = (($arq['type'] == 'image/png')?'.jpg':'.jpg');
        $tamanho = 1024*1024*2;
        
        $sql = "select imagem from produto_academia 
            where id_produto_academia = {$id}"; 
        
        $result = $this->Linha($sql);
        
        $caminho = 'Upload/produtos/academia_id_'.retorna_id_academia().'/'.$id.'/'.$result->imagem;
        
        $pasta = 'Upload/produtos/academia_id_'.retorna_id_academia().'/'.$id;
        $nome = md5(time()).$ext;
        
        if(!file_exists($pasta)){
            mkdir($pasta,0777,true);
            if($arq['size'] > $tamanho){
                echo 'Arquivo não pode ser maior que 2MB';
                }elseif(!in_array($arq['type'], $permisão)){
                    echo 'Apenas  imagens ';
                }else{
                    if(move_uploaded_file($arq['tmp_name'],$pasta.'/'.$nome)){
                        echo 'Arquivo enviado com sucesso !!!';
                        $this->Update(array("imagem"=>$nome), 'produto_academia', 'id_produto_academia', $id);
                        
                    }else{
                        echo 'Errou ao enviar arquivo ';
                    }
            }
        }elseif(file_exists($pasta)){
            $scan = scandir($pasta);
            
            if(count($scan) > 1) {
                
                if($arq['size'] > $tamanho){
                echo 'Arquivo não pode ser maior que 2MB';
                }elseif(!in_array($arq['type'], $permisão)){
                    echo 'Apenas  imagens ';
                }else{
                    if(move_uploaded_file($arq['tmp_name'],$pasta.'/'.$nome)){
                        
                        $this->Update(array("imagem"=>$nome), 'produto_academia', 'id_produto_academia', $id);
                        @unlink($caminho);
                        echo 'Foto Atualizada !!!';
                    }else{
                        echo 'Errou ao enviar arquivo ';
                    }
                }
                
                
            }else{
                if($arq['size'] > $tamanho){
                echo 'Arquivo não pode ser maior que 2MB';
                }elseif(!in_array($arq['type'], $permisão)){
                    echo 'Apenas  imagens ';
                }else{
                    if(move_uploaded_file($arq['tmp_name'],$pasta.'/'.$nome)){
                        echo 'Arquivo enviado com sucesso !!!';
						
                        $this->Update(array("imagem"=>$nome), 'produto_academia', 'id_produto_academia', $id);
						
                    }else{
                        echo 'Errou ao enviar arquivo ';
                    }
                }
            }
        }
        

    }
    
}
