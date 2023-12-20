<?php 

class descontoCalculadoraTeste
{
    public function deveAplicarQuantoValorEstiverAcimaDoMinimoTeste() {
        $descontoCalculadora = new descontoCalculadora();

        $valorTotal = 130;
        $valorComDesconto = $descontoCalculadora->aplica($valorTotal);
        
        $valorEsperado = 110;   // Já que minha função de desconto aplicar 20
        $this->verificacaoValores($valorComDesconto, $valorEsperado);
    }

    public function naoDeveAplicarQuandoValorEstiverAbaixoDoMinnimoTeste(){
        $descontoCalculadora = new descontoCalculadora();

        $valorTotal = 85;
        $valorComDesconto = $descontoCalculadora->aplica($valorTotal);

        $valorEsperado = 85;
        $this->verificacaoValores($valorComDesconto, $valorEsperado);
    }


    public function verificacaoValores($valorComDesconto, $valorAtual){

        if($valorComDesconto !== $valorAtual){
            $mensagem = "\nTeste Falhou! \nValor Esperado [ " .  $valorComDesconto . " ] todavia o valor foi [ " . $valorAtual . " ]\n\n";
            throw new \Exception($mensagem);
        }

        echo "\nTeste Aprovado!\nValor com Desconto [ " .  $valorComDesconto . " ] é igual a Valor Esperado [ " . $valorAtual . " ]\n\n";
    }
}

?>