<?php

namespace Tests\Models;


use Mike\Models\MenuItem;
use Mike\Models\Store;

class StoreTest extends \PHPUnit\Framework\TestCase
{

    public function testCriandoUmStore(){
        $store = new Store(
            "Popedi",
            "https://famintoo.com/view/img/menu/11/logo.png",
            "(043) 3132-8069",
            "Lanchonete"
        );

        $store->setMenu([
            new MenuItem(
                "Tapioca de Frango",
                "Polvilho, frango, mussarela e tomate.",
                17.90,
                "Tapiocas"
            )
        ]);

        $this->assertEquals("Popedi", $store->getName());
        $this->assertEquals("https://famintoo.com/view/img/menu/11/logo.png", $store->getLogo());
        $this->assertEquals("(043) 3132-8069", $store->getPhone());
        $this->assertEquals("Lanchonete", $store->getType());
        $this->assertInstanceOf(Store::class, $store);

        $item = $store->getMenu()[0];
        $this->assertEquals("Tapioca de Frango", $item->getTitle());
        $this->assertEquals("Polvilho, frango, mussarela e tomate.", $item->getDescription());
        $this->assertEquals(17.90, $item->getValor());
        $this->assertEquals("Tapiocas", $item->getCategory());
        $this->assertInstanceOf(MenuItem::class, $item);
        $this->assertTrue(is_string(json_encode($store)));
    }
}