var sorteio = {
    /**
     *Seleciona Todos os jogadores 
     */
    selecionaJogadores(){
        let jogadores = document.querySelectorAll('#lista tr');
        var time = [];
        
        jogadores.forEach( e => {
            var element = {
                nome : e.childNodes[1].innerHTML, 
                nivel : parseInt(e.children[1].querySelector('input').value),
                goleiro : parseInt(e.children[2].querySelector('input').value),
                confirmado : e.children[3].querySelector('input[type=checkbox]').checked,
            }
            time.push(element);
        });

        return time;
    },
	/**
	*Adiciona quantidade no modal
	*/
	setQtd(){
        let contador = 0;

        sorteio.selecionaJogadores().filter(function(e){
            if(e.confirmado){
                contador++;
            }
        });

        document.getElementById("qtd").innerHTML = contador;
        
    },
    /**
     * retorna um array
     * com os jogadores que confirmarão  
     */
    selectJogadoresConfirmados(){
        var time = [];

        sorteio.selecionaJogadores().filter(function(e){
            if(e.confirmado){
                var element = {
                    nome : e.nome, 
                    nivel : e.nivel,
                    goleiro : e.goleiro,
                    confirmado : e.confirmado,
                }
                time.push(element);
            }
        });

        return time;

    },

    verfica(e){
        e.preventDefault();
        
        //número digitado pelo usuario
        let numeroJogador = e.srcElement[0].value;

        //Número de confirmação
        let numeroConfir = sorteio.contaQtdConfir();

        //Número de Goleiro
        let numeroGoleiro = sorteio.contaGoleiro();

        //Qtd minima
        let qtdMinimaTime = numeroJogador * 2;

        //Array de jogadores ja sorteado 'script local assets/js/index.js'
        let array = arrayRandon(sorteio.selectJogadoresConfirmados());

        //retorna um array sem os goleiros
        let arrayJogadores = sorteio.removeGoleiro(array,numeroGoleiro);

        //forma os times com base na quantidade que usuario informou 
        let times = divTime(parseInt(numeroJogador - 1),arrayJogadores[0]);

        //qtd goleiros
        let goleirosNoTime = parseInt(arrayJogadores[1].length);

        //qtd de times formados
        let numerDeTimes = parseInt(times.length);

        //qtd goleiros
        let jogadoresGoleiro = arrayJogadores[1];

        
        if(numeroJogador < 5 ){
            $.gritter.add({
            title: 'System',
            text: "Um time não pode ter menos que 5 Jogadores",
            image: get_img(),
            close_icon: 'l-arrows-remove s16'
            });
            e.srcElement[0].value = "";
        }else if(numeroConfir < qtdMinimaTime){
            $.gritter.add({
                title: 'System',
                text: "Esta faltando gente :(",
                image: get_img(),
                close_icon: 'l-arrows-remove s16'
                });
                e.srcElement[0].value = "";
        }else if(goleirosNoTime  < numerDeTimes){

                $.gritter.add({
                title: 'System',
                text: "Esta Faltando Goleiro Tente Adicionar Mais 1",
                image: get_img(),
                close_icon: 'l-arrows-remove s16'
                });
                e.srcElement[0].value = "";
                
            
        }else if(goleirosNoTime > numerDeTimes){
                $.gritter.add({
                title: 'System',
                text: "Voce tem  "+numerDeTimes+" times mais existem "+goleirosNoTime+ " 'Goleiros'",
                image: get_img(),
                close_icon: 'l-arrows-remove s16'
                });
                e.srcElement[0].value = "";
        }else{

            //ordenando jogadores por nivel
            let ordenandoJogadores = sorteio.ordenarJogadores(times);

            //balanciando o time
            let balanciamentoTime = sorteio.balanciamento(ordenandoJogadores,numeroJogador);

            //junta os jogadores de linha com os goleiros e retorna um array de times
            let formaTimeCorreto = sorteio.formaTime(balanciamentoTime,jogadoresGoleiro);

            //exibe o resultado no modal
            sorteio.render(formaTimeCorreto);        
        }

    },

    /**
     * Conta quantidade de
     * jogadores que confirmarão
     */
    contaQtdConfir(){
        let contador = 0;

        sorteio.selectJogadoresConfirmados().filter(function(e){
            if(e.confirmado){
                contador++;
            }
        });

        return contador;
    },

    /**
     * Conta quantidade de goleiros
     */
    contaGoleiro(){
        let contador = 0;

        sorteio.selectJogadoresConfirmados().filter(function(e){
            if(e.goleiro){
                contador++;
            }
        });

        return contador;
    },

    /**
     * 
     * @param {Array} array 
     * @param {Number} goleirosNoTime 
     * Preferi remover os goleiros para
     * deixa o sorteio mais fácil 
     */
    removeGoleiro(array,goleirosNoTime){

        let tempGoleiroArray = [];

        for(var i =0; i<goleirosNoTime; i++){

            let indexGoleiro = array.findIndex(e => e.goleiro == 1);

            tempGoleiroArray.push(array.splice(parseInt(indexGoleiro),1));

        }

        return [array,tempGoleiroArray];
        
    },

    /**
     * 
     * @param {Array} jogadoresLinha 
     * @param {Array} jogadoresGoleiro 
     * Junta os array depois de sortearem os jogadores
     */
    formaTime(jogadoresLinha,jogadoresGoleiro){

        for(var i = 0; i<jogadoresGoleiro.length; i++){
            jogadoresLinha[i].splice(0,0,jogadoresGoleiro[i][0]);
        }

        return jogadoresLinha;

    },

    /**
     * 
     * @param {Array} ordenandoJogadores
     * retorna um array com os jogadores
     * ordenados por nivel para maior facilidade
     * no balanciamento do time  
     */
    ordenarJogadores(ordenandoJogadores){
        var tmp = [];
        
        for(var i =0; i<ordenandoJogadores.length; i++){
            tmp.push(ordenandoJogadores[i].sort((a,b) => a.nivel < b.nivel ));
        }

        return tmp;
    },

    /**
     * 
     * @param {Array} arrayDeTime 
     * @param {Number} numeroJogador 
     */
    balanciamento(arrayDeTime,numeroJogador){
        
        //array temporario que armazenara os times ja sorteados por nivel
        var tmpNovaArray = [];

        // variavel de controle do while
        var controle = true;
        
        while(controle){

            //Percorrendo os 2 primeiros array e balanciando o time
            for (let i = 0; i < parseInt(numeroJogador); i++) {
            
                //Capturando melhor Jogador
                let melhorJogador = arrayDeTime[0].splice(0,1);
    
                //Capturando o Pior Jogador
                let piorJogador = arrayDeTime[1].splice(parseInt(arrayDeTime[1].length -1), 1);
    
                //Colocando o melhor jogador no time mais fraco
                arrayDeTime[0].push(piorJogador[0]);

                //Colocando o pior jogador no time mais forte
                arrayDeTime[1].push(melhorJogador[0]);
    
                //fazendo a soma dos niveis de todos os jogadores 
                tmpTotalNivelArray0 = arrayDeTime[0].reduce((pre,cur) => {
                    return pre += cur.nivel;
                },0);
    
                //fazendo a soma dos niveis de todos os jogadores 
                tmpTotalNivelArray1 = arrayDeTime[1].reduce((pre,cur) => {
                    return pre += cur.nivel;
                },0);
    
                //Realizando a média dos times 
                let nivelPrimeiroArray = parseInt(tmpTotalNivelArray0 / numeroJogador);
    
                //Realizando a média dos times 
                let nivelSegundoArray = parseInt(tmpTotalNivelArray1 / numeroJogador);
    
                //se a media dos dois times estiverem igual ou 1 ponto pra  mais ow menos retorna uma equipe balanciada 
                if(nivelPrimeiroArray == nivelSegundoArray){
                    tmpNovaArray.push(arrayDeTime[0]);
                    tmpNovaArray.push(arrayDeTime[1]);
    
                    arrayDeTime.splice(0,2);
                    break;
                    
                }else if(nivelPrimeiroArray +1 == nivelSegundoArray){
                    tmpNovaArray.push(arrayDeTime[0]);
                    tmpNovaArray.push(arrayDeTime[1]);
    
                    arrayDeTime.splice(0,2);
    
                    break;
    
                }else if(nivelPrimeiroArray -1 == nivelSegundoArray){
                    tmpNovaArray.push(arrayDeTime[0]);
                    tmpNovaArray.push(arrayDeTime[1]);
    
                    arrayDeTime.splice(0,2);
                    break;
    
                }else if(nivelPrimeiroArray == nivelSegundoArray +1){
                    tmpNovaArray.push(arrayDeTime[0]);
                    tmpNovaArray.push(arrayDeTime[1]);
    
                    arrayDeTime.splice(0,2);
                    break;
    
                }else if(nivelPrimeiroArray == nivelSegundoArray -1){
                    tmpNovaArray.push(arrayDeTime[0]);
                    tmpNovaArray.push(arrayDeTime[1]);
    
                    arrayDeTime.splice(0,2);
                    break;
                }else if(i == 5){

                    controle = false;
                    break;
                }
    
            }
    
            //verifica tamanho do array se for igaul a 0 sai do while 
            if(arrayDeTime.length == 0){
                controle = false;
            }

            //se existir apenas um array sai do while e retorna o resto dos jogadores em uma nova equipe 
            if(arrayDeTime.length == 1){
                tmpNovaArray.push(arrayDeTime[0]);
                arrayDeTime.splice(0,1);
                controle = false;
            }

        }

        return tmpNovaArray;
        
    },
    /**
     * 
     * @param {Array} formaTimeCorreto
     * exibi o resultado para usuário 
     */
    render(formaTimeCorreto){
        let str = '';
        
        for (let i = 0; i < formaTimeCorreto.length; i++) {
            str += `<h1 class='text-center'>${i + 1}° Time</h1>
                    <table id="editable-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="">Nome</th>
                            <th class="">Nivel</th>
                            <th class="">Goleiro</th>
                        </tr>
                    </thead>
                    <tbody>`;
            formaTimeCorreto[i].forEach(function(e,i){
                
                str+= `
                    <tr>
                        <td>${e.nome}</td>
                        <td>${sorteio.nivel(e.nivel)}</td>
                        <td>${(e.goleiro)?"Sim":"Não"}</td>
                    </tr>
                    `;
            });

            str+= `</tbody>
            </table>`;
            
        }

        document.getElementById('arraySort').innerHTML = str;
    },

    nivel(nivel){
        let str = "";
        for (let i = 0; i < parseInt(nivel); i++) {
            str += `<i class="glyphicon glyphicon-star"></i>`
        }

        return str;
    }
    
}

let form = document.getElementById("time");

if(form){     
    form.addEventListener('submit',sorteio.verfica,false);
}