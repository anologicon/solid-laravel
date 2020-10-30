<?php

namespace App\Models;

use App\Enum\Pedido\StatusEnum as PedidoStatusEnum;
use App\Models\CarrinhoModel;
use Illuminate\Database\Eloquent\Model;

class PedidoModel extends Model
{

    /**
     * Carrinho que compoem o pedido
     *
     * @var CarrinhoModel
     */
    private $carrinho;

    /**
     * Status do pedido
     *
     * @var int
     */
    private $status;

    /**
     * Valor total do pedido
     *
     * @var float
     */
    private $valor;

    public function __construct()
    {
        $this->carrinho = new CarrinhoModel();
        $this->status = PedidoStatusEnum::ABERTO;
        $this->valor = 0;
    }

    public function exibirStatus(): int
    {
        return $this->status;
    }

    public function validar(): bool
    {
        return $this->carrinho->validarCarrinho();
    }

    public function modificarStatus(int $status): void
    {
        $this->status = $status;
    }


    public function confirmar(): bool
    {
        if ($this->validar()) {

            $this->modificarStatus(PedidoStatusEnum::CONFIRMADO);
            
            $this->modificarValor($this->carrinho->calcularTotal());

            return true;
        }

        return false;
    }

    public function recuperarCarrinho(): CarrinhoModel
    {
        return $this->carrinho;
    }
    
    private function modificarValor(float $valor): void
    {
        $this->valor = $valor;
    }
}
