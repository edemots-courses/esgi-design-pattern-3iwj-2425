<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice7;

class ProductDataRenderer extends DataRenderer
{
    public function render(array $data): string
    {
        return $this->formatter->format($data);
    }
}
