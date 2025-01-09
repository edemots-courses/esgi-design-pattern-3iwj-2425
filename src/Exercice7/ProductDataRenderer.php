<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice7;

class ProductDataRenderer extends DataRenderer
{
    public function render($entity): string
    {
        if (!$entity instanceof Product) {
            throw new \InvalidArgumentException('Entity must be an instance of Product');
        }
        return $this->formatter->format($entity->toArray());
    }
}
