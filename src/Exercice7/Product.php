<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice7;

class Product
{
    private $id;
    private $name;
    private $price;

    public function __construct(int $id, string $name, float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    public function toArray(): array
    {
        return [
            'id'    => $this->id,
            'name'  => $this->name,
            'price' => $this->price
        ];
    }
}
