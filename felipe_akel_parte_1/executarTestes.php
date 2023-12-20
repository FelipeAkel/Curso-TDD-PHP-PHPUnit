<?php 

include 'autoloader.php';

// Colocando linha a linha coficicando cada class e função!
    // $descontoCalculadora = new descontoCalculadoraTeste();
    // $descontoCalculadora->deveAplicarQuantoValorEstiverAcimaDoMinimoTeste();


// Estou listando todos os arquivos do atual diretório: autoloader.php; descontoCalculadora.php; descontoCalculadoraTeste.php; ... 
foreach(new DirectoryIterator(__DIR__) AS $arquivo){
    
    // Verifica se o final do arquivo é Teste.php, se não for não irá listar os outros arquivos.
    if(substr($arquivo->getFileName(), -9) !== 'Teste.php'){
        continue;
    }
    // echo $arquivo->getFileName(); // Verificando se está listando os aquivos!

    // Estou pegando o nome da class pelo do arquivo retirando os 4 últimos caracteres '.php'
    $nomeClass = substr($arquivo->getFileName(), 0, -4);
    $testaClass = new $nomeClass();

    // Pegando dos os métodos da class instânciada acima.
    $metodos = get_class_methods($testaClass);
    foreach ($metodos AS $metodo){

        // Estou pegando os metodos 'deveAplicarQuantoValorEstiverAcimaDoMinimoTeste' e expecificando que só contuará a executar se tiver 'Teste' no final. Para não pegar 'verificacaoValores', por exemplo.
        if(substr($metodo, -5) !== 'Teste'){
            continue;
        }

        $testaClass->$metodo();
    }
}

?>