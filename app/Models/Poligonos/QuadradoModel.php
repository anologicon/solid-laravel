<?php

namespace App\Models\Poligonos;

use App\Interfaces\PoligonoInterface;

class QuadradoModel implements PoligonoInterface
{

    protected $largura;
    protected $altura;

    public function setLargura(int $valor): void
    {
        $this->largura = $valor;
        $this->altura = $valor;
    }

    public function setAltura(int $valor): void
    {
        $this->largura = $valor;
        $this->altura = $valor;
    }

    public function getAltura(): int
    {
        return $this->altura;
    }
    public function getLargura(): int
    {
        return $this->largura;
    }

}
