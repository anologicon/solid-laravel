<?php
namespace App\Interfaces;

interface PoligonoInterface {

    public function getAltura(): int;

    public function getLargura(): int;

    public function setAltura(int $valor): void;

    public function setLargura(int $valor): void;
}