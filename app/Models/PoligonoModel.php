<?php

namespace App\Models;

use App\Interfaces\PoligonoInterface;

class PoligonoModel
{
    private $forma;

    public function __construct(PoligonoInterface $formasPoligonais)
    {
        $this->forma = $formasPoligonais;
    }

    public function getForma(): PoligonoInterface
    {
        return $this->forma;
    }

    public function getArea(): int
    {
        return $this->forma->getAltura() * $this->forma->getLargura();
    }
}
