<?php

namespace App\Models;

use App\Models\Carrinho\ItemModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class CarrinhoModel extends Model
{

    private $itens;

    public function __construct()
    {
        $this->itens = new Collection();
    }

    public function adicionarItem(ItemModel $itemModel): bool
    {
        if ($itemModel->validar()) {
            $this->itens->push($itemModel);

            return true;
        }

        return false;
    }

    public function listarItens(): array
    {
        return $this->itens->all();
    }

    public function calcularTotal(): float
    {
        $valor = 0;

        foreach ($this->listarItens() as  $item) {
            $valor += $item->getValor();
        }

        return $valor;
    }

    public function validarCarrinho(): bool
    {   
        if ($this->itens->count() <= 0) {
            return false;
        }

        return true;
    }
}
