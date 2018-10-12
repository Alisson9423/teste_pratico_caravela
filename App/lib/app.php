<?php

namespace App\lib;


class app {


    private  $modules;

    private  $controller = "Controllerhome";

    private  $mothod;

    private  $param = [];

    private  $url = [];


    public function __construct() {

        $this->url = self::parseURl(isset($_GET['url'])?$_GET['url'] : "home");

        $this->controller($this->url[0], $this->url[1]);

        $this->method($this->url[2]);

        $this->paran($this->url);

        

        switch ($this->controller){
            case (!empty($_COOKIE['d'])):
            call_user_func_array([$this->controller, $this->mothod], $this->param);
            break;

            case (get_class($this->controller) == 'App\modules\home\controllers\Controllerhome' && self::valida($this->mothod)) || $this->mothod == 'cidadeF':
            call_user_func_array([$this->controller, $this->mothod], $this->param);
            break;

            default:
            header("Location: ".$_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']."/");
            break;
        }

    }

    private function controller($module,$controller){


        if(file_exists('App/modules/'.$module.'/Controllers/'.((empty($controller))? $this->controller:$controller = 'Controller'.$controller).'.php')){
            define('CONTROLLER', $this->url[1]);
            define('MODULES', $this->url[0]);
            unset($this->url[0]);
            unset($this->url[1]);
            $this->modules = $module;
            $valor = "App\modules\\".$this->modules."\\Controllers\\".$controller;
            $this->controller = new $valor;


        }else{
            $this->controller =  new \App\modules\home\Controllers\error404();
            $this->mothod = "index";
        }
    }

    private function method($method){
        if($method && method_exists($this->controller, $method)){
            $this->mothod = $method;
            define('METHOD', $method);
            unset($this->url[2]);
        }else{
            $this->controller = new \App\modules\home\Controllers\error404();
            $this->mothod = "index";
            define('METHOD', $this->mothod);
            define('CONTROLLER', 'index');
        }
    }

    private function paran($param){
        if(empty($param[3])){
            $this->param = [];
        }else{
            $this->param =  array_values($param);
            $this->param = trata_paran_url($param);
        }
    }

    private function parseURl($url){

        $array =  explode("/", filter_var(rtrim($url), FILTER_SANITIZE_URL));
        $dados[] = ((!empty($array[0]))?$array[0] = str_replace('-','_',$array[0]):"home");
        $dados[] = ((!empty($array[1]))?$array[1]:"home");
        $dados[] = ((!empty($array[2]))?$array[2]:"index");
        $dados[] = ((!empty($array[3]))?$array[3]:"");
        return $dados;

    }

    private function xml($valor){
        $valor = str_replace('-','_',$valor);
        if (file_exists('arquivo.xml')) {
            $xml = simplexml_load_file('arquivo.xml');
            foreach($xml->clientes as $key =>$list){
                if($list->nome == $valor){
                    $dados = $list;

                }
            }
            return ((!empty($dados))?$dados:null);
        }
    }

    private function valida($metodo){

        $array = array('index','login','cadastrar_pelo_face','logar_pelo_face','atualiza_ficha','facebook','login_adm','adicionar','email','senha','esqueci_senha','gerar_xml','email_site_cli','msg','teste','boas_vinda','teste_promocao','msg_promocao');

        if(in_array($metodo,$array)){
            return true;
        }
    }
}
