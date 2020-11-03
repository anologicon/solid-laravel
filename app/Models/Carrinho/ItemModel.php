<?php

namespace App\Models\Carrinho;

use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model
{
    private $descricao;

    private $valor;

    public function __consruct()
    {
        $this->descricao = "";
        $this->valor = (float) 0.0;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setValor(float $valor): void
    {
        $this->valor = $valor;
    }

    public function getValor(): float
    {
        return $this->valor;
    }

    public function validar(): bool
    {
        if ($this->descricao === "") {
            return false;
        }

        if ($this->valor <= 0) {
            return false;
        }

        return true;
    }
}
