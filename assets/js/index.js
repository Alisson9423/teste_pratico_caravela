$(document).ready(function() {
   mask();
});


var helperForm = {
    login(e){
        e.preventDefault();
        let action = document.querySelector('form').action;
        let array = {};
        
        let findElemnt = Array.from(document.querySelectorAll('form input,textarea,select'));
    
        findElemnt.forEach(function(e){
            array[e.name] = e.value;
        });
    
        
        $.post(url_post(action),
        {
    
            inf: array
    
        }, function (data) {
            if(data == 1){
                setTimeout(function(){
                    location.reload();
                }, 
                1000);
            }else{
                $.gritter.add({
                title: 'System',
                text: data,
                image: 'http://'+url_construct()[2]+'/assets/img/avatars/cortana.jpg',
                close_icon: 'l-arrows-remove s16'
                });
            }
        });  
       
    },
    add(e){
        e.preventDefault();
        let action = document.querySelector('form').action;
        
        let array = {};
        
        let findElemnt = Array.from(document.querySelectorAll('form input,textarea,select'));
    
        findElemnt.forEach(function(e){
            if(e.name != ''){
                array[e.name] = e.value;
            }
        });
    
        

        
        $.post(action,
        {
    
            inf: array
    
        }, function (data) {
            $.gritter.add({
            title: 'System',
            text: data,
            image: 'http://'+url_construct()[2]+'/assets/img/avatars/cortana.jpg',
            close_icon: 'l-arrows-remove s16'
            });
            Array.from(document.querySelectorAll('form input')).forEach(e =>e.value = "");
        });
    },
    edit(e){
        e.preventDefault();
        let action = document.querySelector('form').action.replace('editar','edit');
        
        let array = {};
        
        let findElemnt = Array.from(document.querySelectorAll('form input,textarea,select'));
    
        findElemnt.forEach(function(e){
            if(e.name != ''){
                array[e.name] = e.value;
            }
        });
    
        

        
        $.post(action,
        {
    
            inf: array
    
        }, function (data) {
            $.gritter.add({
            title: 'System',
            text: data,
            image: 'http://'+url_construct()[2]+'/assets/img/avatars/cortana.jpg',
            close_icon: 'l-arrows-remove s16'
            });
            Array.from(document.querySelectorAll('form input')).forEach(e =>e.value = "");
        });
    }
    
}

function arrayRandon(array){
    return  array.sort(() => .5 - Math.random());
}

function divTime(numeroJogador,array){

    let temp = [];

    let inicio = 0;

    let fim = parseInt(numeroJogador);

    let tmp = parseInt(numeroJogador);

    while(array.slice(inicio,fim).length){

        temp.push(array.slice(inicio,fim));
        inicio = parseInt(inicio + tmp);
        fim = parseInt(fim + tmp);

    }

    return temp;
    
}

function action(){
    return document.querySelector('form').action.split('/')[5];
}

function excluir(el){
    bootbox.confirm({
        message: "Deseja Realmente Deletar Este Item ",
        title: "Descrição",
        callback: function(result) {
                if(result == true){
                    $.post(window.location.href+"/del/"+el.value,
                        {},
                        function (data) {
                            $.gritter.add({
                            title: 'System',
                            text: data,
                            image: 'http://'+url_construct()[2]+'/assets/img/avatars/cortana.jpg',
                            close_icon: 'l-arrows-remove s16'
                            });
                            $(el).parents('tr').remove();
                        });
                }
            }
        });
    
    
}

function goBack() {
    window.history.back();
}



function get_cnpj(e){
    let cnpj = e.value;

    cnpj = cnpj.replace(/([-.*+?^=!:${}()|\[\]\/\\])/g,'');

    if(cnpj.length === 14){
        post_cnpj(cnpj);
    }
    
}


function caps_primeira_letra(str){
    str = str.toLowerCase().split('');
    for(var i = 0; i < str.length; i++){
        if(str[i-1] === ' ' || i == 0){
            str[i] = str[i].toUpperCase();
        }
    }
    
    return str.join('');
}

function formata_data_time(data = null){
    if(data == null){
        return '';
    }else{
        var dia = data.split(' ');
        return dia[0].split('-').reverse().join('/')+((dia[1] == null)?'':' & ' +dia[1]);
    }
}

function formata_data_db(data){
    return data.replace(/\//g,'-').split('-').reverse().join('-');    
}

function formatReal(n){
    let valor = parseFloat(n);
    return "R$ " + valor.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+\,)/g, "$1.");
}


function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function url_post(action = ''){
    var url_atual = window.location.href;
    var array =  url_atual.split("/");
    var index =  array[0]+"//"+array[2]+""+"/"+array[3]+"/"+array[4]+"/"+action;
    if(array[3] == ''){
        index = array[0]+"//"+array[2]+""+"/home/home/login"
    }
    return index;
}

function url_construct(){
    var url_atual = window.location.href;
    var array =  url_atual.split("/");
    return array;
}

function id_post(){
    var url_atual = window.location.href;
    var array =  url_atual.split("/");
    var index =  array[6];
    return index;
}

function sair(){
    return url_construct()[0]+"//"+url_construct()[2]+"/home/home/Logout";
}

function get_img(){
    var url = $("#user").attr("src");
    return url;
}

function get_nome(){
    var nome = $("#nome_usuario").text();
    return nome;
}

function url_upload(method = null){
    
    if(method == null){
        var result = 'upload';
    }else{
        var result = method
    }
    
    return url_construct()[0]+"//"+url_construct()[2]+"/upload/upload/"+result;
}

function mask(){
    
    $('input[data-mask=porcento]').mask('00,00');
    $('input[data-mask=n]').mask('0000');
    $('input[data-mask=numero]').mask('0');
    $('input[data-mask=altura]').mask('0,00');
    $('input[data-mask=peso]').mask('00,000');
    $('input[data-mask=data_site]').mask('00/00/0000');
    $('input[data-mask=time]').mask('00:00');
    $('input[data-mask=cnpj]').mask('00.000.000/0000-00');
    $('input[data-mask=tel]').mask('(00)90000-0000',{
    translation: {
            '9': {
              pattern: /[9]/, optional: true
            }
        }   
    });
    $('input[data-mask=cep]').mask('00000-000');
    $('input[data-mask=money]').mask('000,00', {reverse: true});
}    

function Logout(){
    $.post(sair(),
            {cookie: encodeURIComponent(document.cookie),
            
            }, function (data) {
                $(location).attr('href', url_construct()[0]+'//'+url_construct()[2]+'');
        });
}