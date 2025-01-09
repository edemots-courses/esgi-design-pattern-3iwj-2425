<?php

namespace EdemotsCourses\EsgiDesignPattern\Exercice9;

class StockMarket implements Observable
{
    private float $stockPrice;
    private array $observers = [];

    public function attach(Observer $observer): void
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer): void
    {
        foreach ($this->observers as $key => $obs) {
            if ($obs === $observer) {
                unset($this->observers[$key]);
            }
        }
        $this->observers = array_values($this->observers);
    }

    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this->stockPrice);
        }
    }

    public function setStockPrice(float $price): void
    {
        $this->stockPrice = $price;
        $this->notify();
    }
}
