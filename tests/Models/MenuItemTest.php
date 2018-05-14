<?php

namespace Tests\Models;


use Mike\Models\MenuItem;

class MenuItemTest extends \PHPUnit\Framework\TestCase
{

    public function testCriandoUmMenuItem(){
        $item = new \Mike\Models\MenuItem(
            "Tapioca de Frango",
            "Polvilho, frango, mussarela e tomate.",
            17.90,
            "Tapiocas"
        );

        $this->assertEquals("Tapioca de Frango", $item->getTitle());
        $this->assertEquals("Polvilho, frango, mussarela e tomate.", $item->getDescription());
        $this->assertEquals(17.90, $item->getValor());
        $this->assertEquals("Tapiocas", $item->getCategory());
        $this->assertInstanceOf(MenuItem::class, $item);
        $this->assertTrue(is_string(json_encode($item)));
    }
}