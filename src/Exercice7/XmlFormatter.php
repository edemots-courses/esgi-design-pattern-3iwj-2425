<?php

namespace App\Formatter;

use SimpleXMLElement;
use EdemotsCourses\EsgiDesignPattern\Exercice7\FormatterInterface;

class XmlFormatter implements FormatterInterface
{
    public function format(array $data): string
    {
        $xml = new SimpleXMLElement('<root/>');
        $this->arrayToXml($data, $xml);
        return $xml->asXML();
    }

    private function arrayToXml(array $data, SimpleXMLElement &$xml): void
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $subnode = $xml->addChild($key);
                $this->arrayToXml($value, $subnode);
            } else {
                $xml->addChild($key, htmlspecialchars((string)$value));
            }
        }
    }
}
