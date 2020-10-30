<?php

namespace App\Models\Carrinho;

use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model
{
    private $descricao;

    private $valor;

    public function __consruct()
    {
        $this->descricao = null;
        $this->valor = 0;
    }

    public function adicionarDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function exibirDescricao(): string
    {
        return $this->descricao;
    }

    public function modificarValor(float $valor): void
    {
        $this->valor = $valor;
    }

    public function exibirValor(): float
    {
        return $this->valor;
    }

    public function validar(): bool
    {
        if (!$this->descricao) {
            return false;
        }

        if ($this->valor <= 0) {
            return false;
        }

        return true;
    }
}
