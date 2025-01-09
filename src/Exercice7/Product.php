<?php
namespace EdemotsCourses\EsgiDesignPattern\Exercice7;

class Product
{
    public function __construct(
        private int $id,
        private string $name,
        private float $price
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price
        ];
    }
}
