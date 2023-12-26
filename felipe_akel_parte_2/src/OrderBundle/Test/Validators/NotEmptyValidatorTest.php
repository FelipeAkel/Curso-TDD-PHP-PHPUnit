<?php
namespace OrderBundle\Validators\Test;

use OrderBundle\Validators\NotEmptyValidator;
use PHPUnit\Framework\TestCase;

class NotEmptyValidatorTest extends TestCase {

    // Melhorando a estrutura dos Testes
    // public function testNaoDeveSerValidoQuantoValorVazio(){
    //     $valorVazio = "";
    //     $validadorNaoVazio = new NotEmptyValidator($valorVazio);

    //     $isValid = $validadorNaoVazio->isValid();

    //     $this->assertFalse($isValid);
    // }

    // public function testDeveSerValidoQuantoValorNaoVazio(){
    //     $valorVazio = 100;
    //     $validadorNaoVazio = new NotEmptyValidator($valorVazio);

    //     $isValid = $validadorNaoVazio->isValid();

    //     $this->assertTrue($isValid);
    // }

    /**
     * @dataProvider valueProvider
     */

    public function testIsValid($valor, $resultadoEsperado){
        
        $validadorNaoVazio = new NotEmptyValidator($valor);

        $isValid = $validadorNaoVazio->isValid();

        $this->assertEquals($resultadoEsperado, $isValid);

    }

    public function valueProvider() {
        return [
            'deveSerValidoQuandoValorNaoVazio' => ['valor' => 'abcd', 'resultadoEsperado' => true],     //shouldBeValidWhenValueIsNotEmpty
            'naoDeveSerValidoQuandoValorEstaVazio' => ['valor' => '', 'resultadoEsperado' => false]     //shouldNotBeValidWhenValueIsEmpty
        ];
    }

}

// Executar o Teste no Prompt
// ./vendor/bin/phpunit felipe_akel_parte_2/src/OrderBundle/Test/Validators/NotEmptyValidatorTest.php
