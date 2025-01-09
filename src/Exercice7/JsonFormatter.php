<?php
namespace EdemotsCourses\EsgiDesignPattern\Exercice7;

class JsonFormatter implements FormatterInterface
{
    public function format(array $data): string
    {
        return json_encode($data);
    }
}
