<?php
namespace EdemotsCourses\EsgiDesignPattern\Exercice7;

class UserDataRenderer extends DataRenderer
{
    public function render(User $user): string
    {
        return $this->formatter->format($user->toArray());
    }
}
