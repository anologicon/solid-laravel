<?php

namespace Tests\Unit;

use App\Models\Carrinho\ItemModel;
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testNewItemInvalido()
    {
        $item = new ItemModel();

        $this->assertFalse($item->validar());
    }

    public function testGetSetDescricao()
    {
        $descricao = "PlayStation 5";

        $item = new ItemModel();

        $item->setDescricao($descricao);

        $this->assertEquals($descricao, $item->getDescricao());

        $vazio = "";

        $item->setDescricao($vazio);

        $this->assertEquals($vazio, $item->getDescricao());
    }

    /**
     * @dataProvider dataProviderGetSetValor
     */
    public function testGetSetValor($valor)
    {
        $item = new ItemModel();

        $item->setValor($valor);

        $this->assertEquals($valor, $item->getValor());
    }

    public function dataProviderGetSetValor()
    {
        return [
            [100.0],
            [-2.0],
            [0.0]
        ];
    }

    public function testItemValidar($valor, $descricao, $esperado)
    {
        $itemValido = new ItemModel();

        $itemValido->setValor(30.0);
        $itemValido->setDescricao("Camiseta");

        $this->assertTrue($itemValido->validar());

        $itemInvalido = new ItemModel();

        $itemInvalido->setValor(1.0);
        $itemInvalido->setDescricao("");

        $this->assertFalse($itemInvalido->validar());

        $itemInvalido->setValor(0.0);
        $itemInvalido->setDescricao("Pneu");

        $this->assertFalse($itemInvalido->validar());

        $itemInvalido->setValor(0.0);
        $itemInvalido->setDescricao("");

        $this->assertFalse($itemInvalido->validar());
    }
}
