<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice7;

class UserDataRenderer extends DataRenderer
{
    public function render(array $data): string
    {
        return $this->formatter->format($data);
    }
}
