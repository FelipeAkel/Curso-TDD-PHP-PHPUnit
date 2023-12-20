<?php

    class descontoCalculadora{

        // Caso venho a alterar os valores aqui os testes vão começar a valhar garantido a integridade dos testes.
        const VALOR_MINIMO = 100;
        const VALOR_DESCONTO = 20;

        public function aplica ($valor){

            if($valor > self::VALOR_MINIMO) {
                $valor = $valor - self::VALOR_DESCONTO;
                return $valor;
            } else {
                return $valor;
            }

        }
    }

?>