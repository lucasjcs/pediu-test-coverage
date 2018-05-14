<?php

namespace Tests\StoreFactory;

use Mike\Interfaces\LinkAbstractFactory;
use  \Mike\StoreFactory\FamintooLinkFactory;
use Goutte\Client;
class FamintooStoreFactoryTest extends \PHPUnit\Framework\TestCase
{

    public function testListandoTodosOsLinks(){

        $linkFactory = $this->getMockBuilder(LinkAbstractFactory::class)
                            ->getMock();
        $linkFactory->expects($this->exactly(2))->method('captureLinks')->willReturn([
            'https://famintoo.com/cardapio/acai-wave-cornelio-procopio-pr',
            'https://famintoo.com/cardapio/primavera'
        ]);


        $famintoo = new \Mike\StoreFactory\FamintooStoreFactory(new Client(), $linkFactory);
        $result = $famintoo->captureStores();

        $this->assertCount(2, $linkFactory->captureLinks());
        $this->assertTrue(is_array($result));
        $this->assertCount(2, $result);

    }
}