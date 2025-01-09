<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice7;

class User
{
    private $id;
    private $name;
    private $email;

    public function __construct(int $id, string $name, string $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function toArray(): array
    {
        return [
            'id'    => $this->id,
            'name'  => $this->name,
            'email' => $this->email
        ];
    }
}
