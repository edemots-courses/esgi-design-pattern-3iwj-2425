<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice7;

class XmlFormatter implements FormatterInterface
{
    public function format(array $data): string
    {
        $xml = new \SimpleXMLElement('<root/>');
        array_walk_recursive($data, function ($value, $key) use ($xml) {
            $xml->addChild($key, $value);
        });
        return $xml->asXML();
    }
}
