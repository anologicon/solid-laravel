<?php

namespace Tests\Unit;

use App\Models\Carrinho\ItemModel;
use App\Models\CarrinhoModel;
use PHPUnit\Framework\TestCase;

class CarrinhoTest extends TestCase
{
    public function testAdcionarItemAndListarItens()
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

    /**
     * @dataProvider dataProviderCarrinhos
     */
    public function testValidar(CarrinhoModel $carrinho, $esperado)
    {
        $this->assertEquals($esperado, $carrinho->validarCarrinho());
    }

    public function dataProviderCarrinhos()
    {
        $carrinhoTrue = new CarrinhoModel();

        $itemValido = new ItemModel();
        $itemValido->setValor(20.0);
        $itemValido->setDescricao("Meias");
        $carrinhoTrue->adicionarItem($itemValido);

        $itemInvalido = new ItemModel();
        $carrinhoFalse = new CarrinhoModel();
        $carrinhoFalse->adicionarItem($itemInvalido);

        return [
            [new CarrinhoModel(), false],
            [$carrinhoTrue, true],
            [$carrinhoFalse, false]
        ];
    }

    public function testCalcularTotal()
    {
        $carrinho = new CarrinhoModel;

        $this->assertEquals(0, $carrinho->calcularTotal());

        $item1 = new ItemModel();
        
        $item1->setValor(20.00);
        $item1->setDescricao("Meia");

        $carrinho->adicionarItem($item1);

        $this->assertEquals(20.00, $carrinho->calcularTotal());

        $item2 = new ItemModel();

        $item2->setValor(30.00);
        $item2->setDescricao("Camiseta");

        $carrinho->adicionarItem($item2);

        $this->assertEquals(50.00, $carrinho->calcularTotal());
    }
}
