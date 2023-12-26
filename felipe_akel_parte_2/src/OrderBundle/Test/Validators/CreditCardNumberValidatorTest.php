<?php
namespace OrderBundle\Validators\Test;

use OrderBundle\Validators\CreditCardNumberValidator;
use PHPUnit\Framework\TestCase;

class CreditCardNumberValidatorTest extends TestCase {

    /**
     * @dataProvider valueProvider
    */
    public function testIsValid($valor, $resultadoEsperado){
        
        $cartaoCreditoNumeroValidador = new CreditCardNumberValidator($valor);

        $isValid = $cartaoCreditoNumeroValidador->isValid();

        $this->assertEquals($resultadoEsperado, $isValid);

    }

    public function valueProvider() {
        return [
            'deveSerValidoQuandoValorForNumeroCartaoCredito' => ['valor' => 10, 'resultadoEsperado' => true],
            'deveSerValidoQuandoValorForNumeroCartaoCreditoString' => ['valor' => '10', 'resultadoEsperado' => true],
            'naoDeveSerValidoQuandoValorNaoForNumeroCartaoCredito' => ['valor' => 12345, 'resultadoEsperado' => false],
            'naoDeveSerValidoQuandoValorEstaVazio' => ['valor' => '', 'resultadoEsperado' => false]

        ];
    }

}

// Executar o Teste no Prompt
// ./vendor/bin/phpunit felipe_akel_parte_2/src/OrderBundle/Test/Validators/NotEmptyValidatorTest.php
