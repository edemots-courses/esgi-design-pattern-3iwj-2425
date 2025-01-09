<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice7;

class User
{
    public function __construct(
        private int $id,
        private string $name,
        private string $email
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email
        ];
    }
}
