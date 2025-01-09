<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice7;

class UserDataRenderer extends DataRenderer
{
    public function render($entity): string
    {
        if (!$entity instanceof User) {
            throw new \InvalidArgumentException('Entity must be an instance of User');
        }
        return $this->formatter->format($entity->toArray());
    }
}
