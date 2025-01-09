<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice7;

abstract class DataRenderer
{
    protected $formatter;

    public function __construct(FormatterInterface $formatter)
    {
        $this->formatter = $formatter;
    }

    abstract public function render(array $data): string;
}
class UserDataRenderer extends DataRenderer
{
    public function render(array $data): string
    {
        return $this->formatter->format($data);
    }
}

class ProductDataRenderer extends DataRenderer
{
    public function render(array $data): string
    {
        return $this->formatter->format($data);
    }
}
