<?php

use EdemotsCourses\EsgiDesignPattern\Exercice7\FormatterInterface;

class JsonFormatter implements FormatterInterface
{
    public function format(array $data): string
    {
        return json_encode($data);
    }
}
