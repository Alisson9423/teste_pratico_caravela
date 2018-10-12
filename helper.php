<?php


/**
 * Versão Do Sistema
 */
define('Version','1.0.0');

/**
 * @author Alisson Ferreira
 * @return Retorna o caminho raiz 
 * @example http://localhost/....
 */

function caminho_raiz(){
    $site_path = ''.$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].'/'.'';
    return $site_path;
}

/**
 * @author Alisson Ferreira
 * @return  Carrega os Scripts do tema Padrão
 */

function Cjs_raiz_P_D(){
    
    echo "\n\t\t" . '<script src="' . caminho_raiz() .'assets/js/libs/jquery-2.1.1.min.js?ver=' . Version . '" type="text/javascript"></script>';
    echo "\n\t\t" . '<script src="' . caminho_raiz() .'assets/js/index.js?ver=' . Version . '" type="text/javascript"></script>';
    echo "\n\t\t" . '<script src="' . caminho_raiz() .'assets/js/upload.js?ver=' . Version . '" type="text/javascript"></script>';
    echo "\n\t\t" . '<script src="' . caminho_raiz() . 'assets/js/jquery-ui.js?ver=' . Version . '" type="text/javascript"></script>';
    echo "\n\t\t" . '<script src="' . caminho_raiz() . 'assets/js/libs/jquery-ui-1.10.4.min.js?ver=' . Version . '" type="text/javascript"></script>';
    echo "\n\t\t" . '<script src="' . caminho_raiz() . 'assets/js/bootstrap/bootstrap.min.js?ver=' . Version . '" type="text/javascript"></script>';
    echo "\n\t\t" . '<script src="' . caminho_raiz() . 'assets/js/libs/modernizr.custom.min.js?ver=' . Version . '" type="text/javascript"></script>';
    echo "\n\t\t" . '<script src="' . caminho_raiz() . 'assets/js/jRespond.min.js?ver=' . Version . '" type="text/javascript"></script>';
    echo "\n\t\t" . '<script src="' . caminho_raiz() . 'assets/plugins/core/slimscroll/jquery.slimscroll.min.js?ver=' . Version . '" type="text/javascript"></script>';
    echo "\n\t\t" . '<script src="' . caminho_raiz() . 'assets/plugins/core/slimscroll/jquery.slimscroll.horizontal.min.js?ver=' . Version . '" type="text/javascript"></script>';
    echo "\n\t\t" . '<script src="' . caminho_raiz() . 'assets/plugins/core/fastclick/fastclick.min.js?ver=' . Version . '" type="text/javascript"></script>';
    echo "\n\t\t" . '<script src="' . caminho_raiz() . 'assets/plugins/core/velocity/jquery.velocity.min.js?ver=' . Version . '" type="text/javascript"></script>';
    echo "\n\t\t" . '<script src="' . caminho_raiz() . 'assets/plugins/core/quicksearch/jquery.quicksearch.min.js?ver=' . Version . '" type="text/javascript"></script>';
    echo "\n\t\t" . '<script src="' . caminho_raiz() . 'assets/plugins/ui/bootbox/bootbox.js?ver=' . Version . '" type="text/javascript"></script>';
    echo "\n\t\t" . '<script src="' . caminho_raiz() . 'assets/plugins/charts/sparklines/jquery.sparkline.min.js?ver=' . Version . '" type="text/javascript"></script>';
    echo "\n\t\t" . '<script src="' . caminho_raiz() . 'assets/js/jquery.dynamic.min.js?ver=' . Version . '" type="text/javascript"></script>';
    echo "\n\t\t" . '<script src="' . caminho_raiz() . 'assets/js/main.min.js?ver=' . Version . '" type="text/javascript"></script>';
    echo "\n\t\t" . '<script src="' . caminho_raiz() . 'assets/js/pages/blank.min.js?ver=' . Version . '" type="text/javascript"></script>';
    echo "\n\t\t" . '<script src="' . caminho_raiz() .'assets/plugins/ui/notify/jquery.gritter.js?ver=' . Version . '" type="text/javascript"></script>'; 
    echo "\n\t\t" . '<script src="' . caminho_raiz() .'assets/js/pages/modals.min.js?ver=' . Version . '" type="text/javascript"></script>'; 
    echo "\n\t\t" . '<script src="' . caminho_raiz() .'assets/plugins/forms/fancyselect/fancySelect.min.js?ver=' . Version . '" type="text/javascript"></script>'; 
    echo "\n\t\t" . '<script src="' . caminho_raiz() .'assets/plugins/forms/select2/select2.min.js?ver=' . Version . '" type="text/javascript"></script>'; 
    echo "\n\t\t" . '<script src="' . caminho_raiz() .'assets/plugins/forms/maskedinput/jquery.mask.min.js?ver=' . Version . '" type="text/javascript"></script>'; 
    //echo "\n\t\t" . '<script src="' . caminho_raiz() .'assets/plugins/forms/maskedinput/jquery.maskMoney.min.js" type="text/javascript"></script>'; 
    echo "\n\t\t" . '<script src="' . caminho_raiz() .'assets/plugins/forms/bootstrap-datepicker/bootstrap-datepicker.min.js?ver=' . Version . '" type="text/javascript"></script>'; 
    echo "\n\t\t" . '<script src="' . caminho_raiz() .'assets/plugins/ui/bootstrap-sweetalert/sweet-alert.min.js?ver=' . Version . '" type="text/javascript"></script>'; 
    
    
    
    if (file_exists('App/modules/'.MODULES.'/View/'.CONTROLLER.'/js/scripts-'.CONTROLLER.'.js')) {
        echo "\n\t\t" . '<script src="'.caminho_raiz().'App/modules/'.MODULES.'/View/'.CONTROLLER.'/js/scripts-'.CONTROLLER.'.js?ver=' . Version . '" type="text/javascript"></script>';
		grafico();
    }else{
            echo "Não Existe <br>";
            echo 'App\View\\'.CONTROLLER.'\js\scripts-home.js';
        }
   
   if(CONTROLLER == 'avisos'):
		echo "\n\t\t" . '<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>';
	endif;
    
}

/**
 * @author Alisson Ferreia
 * @return Carrega os Arquivos CSS do Template Padrão
 */

function Ccss_raiz_P_D(){
    echo "\n\t\t" . '<link rel="stylesheet" href="' . caminho_raiz() . 'assets/css/icons.css?ver=' . Version . '" />';
    echo "\n\t\t" . '<link rel="stylesheet" href="' . caminho_raiz() . 'assets/css/bootstrap.css?ver=' . Version . '" />';
    echo "\n\t\t" . '<link rel="stylesheet" href="' . caminho_raiz() . 'assets/css/plugins.css?ver=' . Version . '" />';
    echo "\n\t\t" . '<link rel="stylesheet" href="' . caminho_raiz() . 'assets/css/main.css?ver=' . Version . '" />';
    echo "\n\t\t" . '<link rel="stylesheet" href="' . caminho_raiz() . 'assets/css/custom.css?ver=' . Version . '" />';
    echo "\n\t\t" . '<link rel="stylesheet" href="' . caminho_raiz() . 'assets/css/upload.css?ver=' . Version . '" />';
    echo "\n\t\t" . '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="' . caminho_raiz() . 'assets/img/ico/apple-touch-icon-144-precomposed.png" />';
    echo "\n\t\t" . '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="' . caminho_raiz() . 'assets/img/ico/apple-touch-icon-114-precomposed.png" />';
    echo "\n\t\t" . '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="' . caminho_raiz() . 'assets/img/ico/apple-touch-icon-72-precomposed.png" />';
    echo "\n\t\t" . '<link rel="apple-touch-icon-precomposed"  href="' . caminho_raiz() . 'assets/img/ico/apple-touch-icon-57-precomposed.png" />';
    echo "\n\t\t" . '<link rel="icon"  href="' . caminho_raiz() . 'assets/img/ico/favicon.ico" type="image/png" />';
    
}

function grafico(){
    
    switch (CONTROLLER){
        case CONTROLLER == 'circunferencia':
        echo "\n\t\t".'<script src="'.caminho_raiz().'assets/js/highcharts.js?ver=' . Version . '"></script>';
        echo "\n\t\t". '<script src="'.caminho_raiz().'assets/js/exporting.js?ver=' . Version . '"></script>';
        echo "\n\t\t" . '<script src="'.caminho_raiz().'App/modules/'.MODULES.'/View/'.CONTROLLER.'/js/grafico-'.CONTROLLER.'.js?ver=' . Version . '" type="text/javascript"></script>';
        break;
    
        case CONTROLLER == 'imc':
        echo "\n\t\t".'<script src="'.caminho_raiz().'assets/js/highcharts.js?ver=' . Version . '"></script>';
        echo "\n\t\t". '<script src="'.caminho_raiz().'assets/js/exporting.js?ver=' . Version . '"></script>';
        echo "\n\t\t" . '<script src="'.caminho_raiz().'App/modules/'.MODULES.'/View/'.CONTROLLER.'/js/grafico-'.CONTROLLER.'.js?ver=' . Version . '" type="text/javascript"></script>';
        break;
    
		case CONTROLLER == 'gordura':
        echo "\n\t\t".'<script src="'.caminho_raiz().'assets/js/highcharts.js?ver=' . Version . '"></script>';
        echo "\n\t\t". '<script src="'.caminho_raiz().'assets/js/exporting.js?ver=' . Version . '"></script>';
        echo "\n\t\t" . '<script src="'.caminho_raiz().'App/modules/'.MODULES.'/View/'.CONTROLLER.'/js/grafico-'.CONTROLLER.'.js?ver=' . Version . '" type="text/javascript"></script>';
        break;
	
        case CONTROLLER == 'home':
        echo "\n\t\t".'<script src="'.caminho_raiz().'assets/js/highcharts.js?ver=' . Version . '"></script>';
        echo "\n\t\t". '<script src="'.caminho_raiz().'assets/js/exporting.js?ver=' . Version . '"></script>';
        echo "\n\t\t" . '<script src="'.caminho_raiz().'App/modules/'.MODULES.'/View/'.CONTROLLER.'/js/scripts-grafico.js?ver=' . Version . '" type="text/javascript"></script>';
        break;
    }
    
}


function logar($inf){
    foreach ($inf as $key => $value){
        setcookie($key, base64_encode($value),time()+3600,'/');
    }
}

/**
 * @author Alisson Ferreira
 * @param type $datapega
 * @return Retorna Data Neste padrão 23/08/1994 
 */
function Formata_Data($datapega) {
    
    if(!empty($datapega)):
        $data = explode('-', $datapega);
        $datacerta = $data[2] . '/' . $data[1] . '/' . $data[0];
        return $datacerta; 
    endif;
    
}

function mensagemUsuario($tipo){

    switch($tipo){
        case 'add':
        echo "Adicionado Com Sucesso";
        break;

        case 'edit':
        echo "Alterado Com Sucesso";
        break;

        case 'del':
        echo "Item Removido do Banco de Dados";
        break;
    }

}

function Formata_data_DB($value){
    $data = explode('/', $value);
    $datacerta = $data[2] . '-' . $data[1] . '-' . $data[0];
    return $datacerta;

}

function capmes($date){
                           
$format = date('Y-m-d', strtotime($date));

$mes = ucwords(strftime('%B', strtotime($format)));
  switch ($mes){
        case 'January':    $month = "Janeiro";     break;
        case 'February':    $month = "Fevereiro";   break;
        case 'March':    $month = "Março";       break;
        case 'April':    $month = "Abril";       break;
        case 'May':    $month = "Maio";        break;
        case 'June':    $month = "Junho";       break;
        case 'July':    $month = "Julho";       break;
        case 'August':    $month = "Agosto";      break;
        case 'September':    $month = "Setembro";    break;
        case 'October':   $month = "Outubro";     break;
        case 'November':   $month = "Novembro";    break;
        case 'December':   $month = "Dezembro";    break;
        default:   $month = "Erro";        break;
 
   }
    return $month;
}

function logout($inf){
    
    foreach ($inf as $key => $value){
       setcookie($key,'',time()-3600,'/');
    }
}

function retorna_cookie($valor){
    
    switch ($valor){
        case 'id':
        return ((!empty($_COOKIE['a']))?trata_numero_input(base64_decode($_COOKIE['a'])):"");
        break;
    
        case 'usuario':
        return ((!empty($_COOKIE['b']))?trata_string_input(base64_decode($_COOKIE['b'])):"");
        break;
    
        case 'nome':
        return ((!empty($_COOKIE['c']))?trata_numero_input(base64_decode($_COOKIE['c'])):"");
        break;
    
        case 'nivel':
        return ((!empty($_COOKIE['d']))?trata_string_input(base64_decode($_COOKIE['d'])):"");
        break;
    
        case 'img':
        return ((!empty($_COOKIE['e']))?trata_string_input(base64_decode($_COOKIE['e'])):"");
        break;
    
    
    }
}



function formata_reais($valor){
    return 'R$'.number_format($valor,2,',','.');
}

function trata_dados_view($inf){
    $inf_array = array();
    
    parse_str($inf, $inf_array);
    
    foreach ($inf_array as $key => $value) {
        $dados[$key] = preg_replace("/(from|select|insert|delete|where|drop table|show tables|#|\*|\\\\)|\'|(\(|\))/",'',$value);
    }
    
    //$dados = array_map('strip_tags', $dados);
    
    return $dados;
    
}

function trata_paran_url($inf_array){
    foreach ($inf_array as $key => $value) {
        $dados[$key] = preg_replace("/[^0-9]&&(\-)/", "", $value);
    }
    
    $dados = array_map('strip_tags', $dados);
    $dados = array_map('trim', $dados);
    return $dados;
}

function trata_string_input($str){
    return preg_replace("/(from|select|insert|delete|where|drop table|show tables|#|\*|\\\\)|\'/",'',$str);
}

function trata_numero_input($str){
    return preg_replace("/[^0-9]/", "", $str);
}

function formata_data_time($datapega) {
    if(!empty($datapega)):
        $dia = explode(' ', $datapega);
    
        $data = str_replace('-', '/', $dia[0]);
        $data = implode("/", array_reverse(explode("/", $data)));
        $hora = $dia[1];

        $datacerta = $data." & ".$hora;

        return $datacerta;
    endif;
}

function formata_data_time_para_data($datapega) {
    if(!empty($datapega)):
        $dia = explode(' ', $datapega);
    
        $data = str_replace('-', '/', $dia[0]);
        $data = implode("-", explode("-", $data));
        
        return $data;
    endif;
}

function formata_time($time){
    return substr($time, 0,5);
}

/**
 * @param type int 0 a 4
 * @return parâmetro da url
 * @author Alisson
 * @example $url[0] / 
 * @example $url[1]core 
 * @example $url[2]modules
 * @example $url[3]controller
 * @example $url[4]action
 * @example $url[5]parâmetro 
 */

function get_url($valor = 4){
   $url = explode("/", $_SERVER['REQUEST_URI']);
   
   switch ($valor){
        case 0:
        return $url[0];
        break;
    
        case 1:
        return $url[1];
        break;
    
        case 2:
        return $url[2];
        break;
    
        case 3:
        return $url[3];
        break;
    
        case 4:
        return $url[4];
        break;
    
        case 5:
        return $url[5];
        break;
    
   }
   
}
/**
 * 
 * @return data
 * @example 2017-05-22 13:51:09
 */
function retorna_data_hora(){
       $data = date('Y-m-d H:i:s');
       return $data;
}

/**
 * 
 * @return data
 * @example 2017-05-22 13:51:09
 */
function retorna_data(){
       $data = date('Y-m-d');
       return $data;
}


function decodeArray($array){
    foreach ($array as $key => $value) {
             $dados[$key] = base64_decode($value);
        }
    return $dados;    
}

function paginacao($tabela){
    $banco = new App\lib\Model();
    $sql = "select * from {$tabela}";
    $count = $banco->count($sql);
    return $calcula = ceil(($count/100)*10);
}

function retorno_id_usuario(){
    return retorna_dados_cookie_usuario_adm('id');
}       

function porcento($valor){
    return number_format($valor,2, '.', '');
}




function retorna_dias_vencimento($data = null){
    if(!empty($data)):
        $diaHoje = strtotime(date('Y-m-d'));
        $diaVencimento = strtotime($data);
        $faltaDia = $diaVencimento - $diaHoje;
        $timeUmDia = 24*60*60;
        $faltaDias = $faltaDia/$timeUmDia;

        return $faltaDias;
    endif;
    
    
}


function validaCPF($cpf){
    $cpf = preg_replace('/[^0-9]/','', $cpf);

    $digitoA = 0;
    $digitoB = 0;

    for($i = 0, $x =10 ; $i<=8 ; $i++ , $x--){
         $digitoA += $cpf[$i] * $x;
    }

     for($i = 0, $x =11 ; $i<=9 ; $i++ , $x--){
         $digitoB += $cpf[$i] * $x;
         if(str_repeat($i, 11) == $cpf){
             return false;
        }
     }

     $somaA = (($digitoA%11 < 2)? 0:11-($digitoA%11));
     $somaB = (($digitoB%11 < 2)? 0:11-($digitoB%11));



    if($somaA != $cpf[9] || $somaB != $cpf[10]){
        return false;
    }else{
        return true;
    }
}

function valida_email($string){
    if(preg_match('/^[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\.\-]+\.[a-z]{2,4}$/i', $string)){
        return true;
    }else{
        return false;
    }
    
}

function rest($valor){
     $reset = str_replace('.', '', $valor);
     $reset2 = str_replace('-', '', $reset);
     return $senha_nova =  substr($reset2, 0,11);
}

function dias_semana(){
    $diaSemana = date('w');
    
    $diaExt = array(
        "0"=>"Domingo",
        "1"=>"Segunda Feira",
        "2"=>"Terça Feira",
        "3"=>"Quarta Feira",
        "4"=>"Quinta Feira",
        "5"=>"Sexta Feira",
        "6"=>"Sabado"
    );
    
    return $diaExt[$diaSemana];
}

function retorna_dia_semana($diaSemana){
    
    
    $diaExt = array(
        "0"=>"Domingo",
        "1"=>"Segunda Feira",
        "2"=>"Terça Feira",
        "3"=>"Quarta Feira",
        "4"=>"Quinta Feira",
        "5"=>"Sexta Feira",
        "6"=>"Sabado"
    );
    
    return $diaExt[$diaSemana];
}

function dia_treino($array){
    $diaSemana = dias_semana();//dia da semana 
    
    $treino = lista_ficha($array);//monta array
    
    switch ($diaSemana){
        case "Domingo":
        return 0;
        break;
    
        case "Segunda Feira":
        return $treino[0];
        break;
    
        case "Terça Feira":
        return $treino[1];
        break;
    
        case "Quarta Feira":
        return $treino[2];
        break;
    
        case "Quinta Feira":
        return $treino[3];
        break;
    
        case "Sexta Feira":
        return $treino[4];
        break;
    
        case "Sabado":
        return $treino[5];
        break;
    
    
   }
    
}

function lista_ficha($treino){
    
    $j = 0;
    if(!empty($treino)){
        for ($i=0; $i < 6; $i++) { 

        if(empty($treino[$i]->Treino)){

           $dados[] =  $treino[$j]->Treino;
           $j ++;

        }else{
            $dados[] =  $treino[$i]->Treino;
        }

    }
    
    return $dados;
    }
    
}

function avaliacao(){
    $banco = new App\lib\Model();
    $id = retorna_dados_cookie_usuario_aluno('usuario_id');
    $sql = "select * from aluno_controle_circunferencias
    where aluno_id = {$id}";
    return @end($banco->Select($sql));

}

function produto_academia(){
    $banco = new App\lib\Model();
    $sql = "select DISTINCT(c.descricao),a.academia,c.id_categoria_produto from produto_academia p
            left join categoria_produto c on c.id_categoria_produto=p.categoria_id
            left join academia a on a.id_academia=c.academia_id
            where academia_id = ".retorna_id_academia()." ";
    return $banco->Select($sql);

}

function get_rout_client($valor){
    $dados['objetivo'] = 'objetivo';
    
    if(in_array($valor, $dados)){
        return TRUE;
    }
}

function return_nivel(){
    return base64_decode($_COOKIE['d']);
}

function redirecionar(){
    header("Location: https://app-shape.com");
}

function saudacao(){
    $data = date('H:i:s');
    $result =(int) substr($data, 0,2);
    
    if($result > 6 && $result <= 12){
        echo "Bom Dia ";
    }elseif($result > 12 && $result <= 18){
        echo "Boa Tarde";
    }else{
        echo "Boa Noite";
    }
}

function retorna_id_academia(){
    if(return_nivel() == 'ADM' || return_nivel() == 'F'){
        return retorna_dados_cookie_usuario_adm('academia_id');
    }else{
        return retorna_dados_cookie_usuario_aluno('academia_id');
    }
}

function forca_dado_aluno_academia($valor){
    $banco = new App\lib\Model();
    $id = retorna_dados_cookie_usuario_aluno('usuario_id');
    $sql = "select * from usuarios 
	where usuario_id = {$id}";
        
    switch ($valor){
        case "academia_id":
        return $banco->Linha($sql)->academia_id;
        break;
    
     
   }    
    
}

function calcula_imc($altura,$peso){
    return $peso/($altura*$altura);
}

function situcao_imc($imc){
    
    switch ($imc) {
        case $imc < 17:
        return "Muito Abaixo Do Peso";
        break;
    
        case $imc >= 17.1 && $imc <=18.49:
        return "Abaixo Do Peso";
        break;
    
        case $imc >= 18.6 && $imc <= 24.99:
        return "Peso Normal";
        break;
    
        case $imc >= 18.6 && $imc <= 24.99:
        return "Peso Normal";
        break;
    
        case $imc >= 25.1 && $imc <= 29.99:
        return "Acima Peso Normal";
        break;
    
        case $imc >= 30.1 && $imc <= 34.99:
        return "Obesidade 1";
        break;
    
        case $imc >= 35.1 && $imc <= 39.99:
        return "Obesidade 2(servera)";
        break;
    
        case $imc > 40:
        return "Obesidade 3(Mórbida)";
        break;
    
        default:
            return null;
            break;
    }
}

function calcula_idade($data){
    
    // Separa em dia, mês e ano
    list($dia, $mes, $ano) = explode('/', $data);
   
    // Descobre que dia é hoje e retorna a unix timestamp
    $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
    // Descobre a unix timestamp da data de nascimento do fulano
    $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);
   
    // Depois apenas fazemos o cálculo já citado :)
    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

    return $idade;
}


function calcula_valor_pagamento($qtd){
    
    
    switch ($qtd){
        case $qtd >=1 && $qtd <= 100:    $valor = array('valor'=>$qtd *1.00,'unitario'=>1.00);     break;
        case $qtd >=101 && $qtd <= 300:    $valor = array('valor'=>$qtd *0.90,'unitario'=>0.90);     break;
        case $qtd >=301 && $qtd <= 500:    $valor = array('valor'=>$qtd *0.80,'unitario'=>0.80);     break;
        case $qtd >=501 && $qtd <= 800:    $valor = array('valor'=>$qtd *0.60,'unitario'=>0.60);     break;
        case $qtd >=801 && $qtd <= 1000:    $valor = array('valor'=>$qtd *0.50,'unitario'=>0.50) ;     break;
        case $qtd >=1001 && $qtd <= 1500:    $valor =  array('valor'=>$qtd *0.40,'unitario'=>0.40);     break;
        case $qtd >=1500 :    $valor =  array('valor'=>$qtd *0.25,'unitario'=>0.25);     break;
        
        default:   $valor = "Erro";        break;
 
   }
    return $valor;
}

function status_pagseguro_meio_pagamento($id = null){
    $rs = ((!empty($id))?$id:0);
    $status = array(0=>" ",
            1=>"Cartão de crédito",
            2=>"Boleto",
            3=>"Débito online",
            4=>"Saldo PagSeguro",
            5=>"Oi Paggo",
            7=>"Depósito em conta",
            );
    return $status[$rs];
}


function status_pagseguro($id = null){
    $rs = ((!empty($id))?$id:0);
    $status = array(0=>"Pendente",
                    1=>"Aguardando pagamento",
                    2=>"Em análise",
                    3=>"Pago",
                    4=>"Pago",
                    5=>"Em disputa",
                    6=>"Devolvida",
                    7=>"Cancelada");
    return $status[$rs];
}

function email($array){
    
    $nome = $array['nome'];
    $email = $array['email'];
    $tel = $array['telefone'];
    $msg = $array['msg'];
    
	$from = new SendGrid\Email("Email Site App-Shape", $email);
    $subject = "Site App-shape Usuario: ".$nome;
    $to = new SendGrid\Email("","alisson_9423@outlook.com");
    $content = new SendGrid\Content("text/html", $msg.'</br><br>Telefone: '.$tel);
    $mail = new SendGrid\Mail($from, $subject, $to, $content);

    $apiKey = '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';
    $sg = new \SendGrid($apiKey);

    $response = $sg->client->mail()->send()->post($mail);
    
    if($response->statusCode() == '202'){
		echo '1';
	}else{
		echo '0';
	}   
}

function esqueci_senha($email,$senha){
    
    $from = new SendGrid\Email("App-Shape", "alisson_9423@outlook.com");
    $subject = "Senha Redefinida";
    $to = new SendGrid\Email("",$email);
    $content = new SendGrid\Content("text/html","Sua Nova Senha: ' {$senha} '");
    $mail = new SendGrid\Mail($from, $subject, $to, $content);

    $apiKey = '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';
    $sg = new \SendGrid($apiKey);

    $response = $sg->client->mail()->send()->post($mail);
    
    if($response->statusCode() == '202'){
		echo '1';
	}else{
		echo '0';
	}
    
}
