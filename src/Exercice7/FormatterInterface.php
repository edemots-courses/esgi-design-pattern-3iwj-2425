<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice7;

interface FormatterInterface
{
    public function format(array $data): string;
}

// Formatter JSON
class JsonFormatter implements FormatterInterface
{
    public function format(array $data): string
    {
        return json_encode($data, JSON_PRETTY_PRINT);
    }
}

// Formatter XML
class XmlFormatter implements FormatterInterface
{
    public function format(array $data): string
    {
        $xml = new \SimpleXMLElement('<root/>' );
        array_walk_recursive($data, function ($value, $key) use ($xml) {
            $xml->addChild($key, $value);
        });
        return $xml->asXML();
    }
}