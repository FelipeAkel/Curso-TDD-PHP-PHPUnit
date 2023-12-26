<?php
namespace OrderBundle\Validators\Test;

use OrderBundle\Validators\CreditCardExpirationValidator;
use PHPUnit\Framework\TestCase;

class CreditCardExpirationValidatorTest extends TestCase {

    /**
     * @dataProvider valueProvider
     */
    public function testIsValid($valor, $resultadoEsperado){
        
        $cartaoCreditoDataExpiracao = new \DateTime($valor);
        $cartaoCreditoDataExpiracaoValidador = new CreditCardExpirationValidator($cartaoCreditoDataExpiracao);

        $isValid = $cartaoCreditoDataExpiracaoValidador->isValid();

        $this->assertEquals($resultadoEsperado, $isValid);

    }

    public function valueProvider() {
        return [
            'deveSerValidoQuandoDataNaoEstaExpirada' => ['valor' => '2040-01-01', 'resultadoEsperado' => true],
            'naoDeveSerValidoQuandoDataEstaExpirada' => ['valor' => '1999-01-01', 'resultadoEsperado' => false],
            'naoDeveSerValidoQuandoDataEstaVazia' => ['valor' => '', 'resultadoEsperado' => false]
        ];
    }

}

// Executar o Teste no Prompt
// ./vendor/bin/phpunit felipe_akel_parte_2/src/OrderBundle/Test/Validators/NotEmptyValidatorTest.php
