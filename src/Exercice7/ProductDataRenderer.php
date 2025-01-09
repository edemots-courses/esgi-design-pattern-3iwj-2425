<?php
namespace EdemotsCourses\EsgiDesignPattern\Exercice7;

class ProductDataRenderer extends DataRenderer
{
    public function render(Product $product): string
    {
        return $this->formatter->format($product->toArray());
    }
}
