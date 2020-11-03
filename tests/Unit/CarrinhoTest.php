<?php

namespace Tests\Unit;

use App\Models\Carrinho\ItemModel;
use App\Models\CarrinhoModel;
use PHPUnit\Framework\TestCase;

class CarrinhoTest extends TestCase
{
    public function testAdcionarItem()
    {
        $carrinho = new CarrinhoModel();

        $itemValido = new ItemModel();
        $itemValido->setValor(30.0);
        $itemValido->setDescricao("Camiseta");

        $resultValido = $carrinho->adicionarItem($itemValido);

        $this->assertTrue($resultValido);

        $this->assertCount(1, $carrinho->listarItens());

        $itemInvalido = new ItemModel();

        $resultInvalido = $carrinho->adicionarItem($itemInvalido);

        $this->assertFalse($resultInvalido);

        $this->assertCount(1, $carrinho->listarItens());
    }
}
