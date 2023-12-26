<?php
namespace OrderBundle\Validators\Test;

use OrderBundle\Validators\NumericValidator;
use PHPUnit\Framework\TestCase;

class NumericValidatorTest extends TestCase {

    /**
     * @dataProvider valueProvider
     */
    public function testIsValid($valor, $resultadoEsperado){
        
        $validadorNaoVazio = new NumericValidator($valor);

        $isValid = $validadorNaoVazio->isValid();

        $this->assertEquals($resultadoEsperado, $isValid);

    }

    public function valueProvider() {
        return [
            'deveSerValidoQuandoValorForNumero' => ['valor' => 10, 'resultadoEsperado' => true],     
            'deveSerValidoQuandoValorForNumeroString' => ['valor' => '10', 'resultadoEsperado' => true],     
            'naoDeveSerValidoQuandoValorForString' => ['valor' => 'abc', 'resultadoEsperado' => false],     
            'naoDeveSerValidoQuandoValorForVazio' => ['valor' => '', 'resultadoEsperado' => false]   
        ];
    }

}

// Executar o Teste no Prompt
// ./vendor/bin/phpunit felipe_akel_parte_2/src/OrderBundle/Test/Validators/NotEmptyValidatorTest.php
