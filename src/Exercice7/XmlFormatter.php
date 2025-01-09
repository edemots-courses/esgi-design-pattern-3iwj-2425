<?php
namespace EdemotsCourses\EsgiDesignPattern\Exercice7;

class XmlFormatter implements FormatterInterface
{
    public function format(array $data): string
    {
        $xml = new \SimpleXMLElement('<?xml version="1.0"?><data></data>');
        $this->arrayToXml($data, $xml);
        return $xml->asXML();
    }

    private function arrayToXml(array $data, \SimpleXMLElement $xml): void
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
