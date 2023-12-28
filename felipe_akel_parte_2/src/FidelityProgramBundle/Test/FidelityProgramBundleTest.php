<?php
namespace FidelityProgramBundle\Test\Service;

use FidelityProgramBundle\Repository\PointsRepository;
use FidelityProgramBundle\Service\FidelityProgramService;
use FidelityProgramBundle\Service\PointsCalculator;
use OrderBundle\Entity\Customer;
use PHPUnit\Framework\TestCase;

class FidelityProgramBundleTest extends TestCase
{
    /**
     * @test
     */
    public function deveSalvarAoReceberPontos() {
        // Cria-se um Mock e espero que pelo menos uma vez o method save seja executado! 
        // Pois, tendo uma pontuação acima de zero o method save deve ser chamado pelo menos uma vez!
        $pontosRepositorio = $this->createMock(PointsRepository::class);
        $$pontosRepositorio->expects($this->once())
            ->method('save');

        $pontosCalculadora = $this->createMock(PointsCalculator::class);
        $pontosCalculadora->method('calculatePointsToReceive')
            ->willReturn(100);
        
        $servicoProgramaFidelidade = new FidelityProgramService($pontosRepositorio, $pontosCalculadora);

        $cliente = $this->createMock(Customer::class);
        $valor = 50;

        $servicoProgramaFidelidade->addPoints($cliente, $valor);

    }

    /**
     * @test
     */
    public function naoDeveSalvarAoReceberZeroPontos() {

        $pontosRepositorio = $this->createMock(PointsRepository::class);
        $$pontosRepositorio->expects($this->never()) // Se vor zero, o method seve nnunca deve ser chamado!
            ->method('save');

        $pontosCalculadora = $this->createMock(PointsCalculator::class);
        $pontosCalculadora->method('calculatePointsToReceive')
            ->willReturn(0);
        
        $servicoProgramaFidelidade = new FidelityProgramService($pontosRepositorio, $pontosCalculadora);

        $cliente = $this->createMock(Customer::class);
        $valor = 20;

        $servicoProgramaFidelidade->addPoints($cliente, $valor);

    }
}


// ./vendor/bin/phpunit felipe_akel_parte_2/src/FidelityProgramBundle/Test/FidelityProgramBundleTest.php