<?php

namespace Tests\StoreFactory;

use Mike\Models\MenuItem;
use  \Mike\StoreFactory\FamintooLinkFactory;
use Goutte\Client;
class FamintooLinkFactoryTest extends \PHPUnit\Framework\TestCase
{

    public function testListandoTodosOsLinks(){

        $famintooLinks = new FamintooLinkFactory();
        $result = $famintooLinks->captureLinks();

        $this->assertTrue(is_array($result));

    }
}