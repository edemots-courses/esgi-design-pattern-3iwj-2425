<?php

namespace EdemotsCourses\EsgiDesignPattern\TheGildedRose;

class Item
{
    public function __construct(
        public string $name,
        public int $quality,
        public int $sellIn
    ) {}

    public function tick(): void
    {
        if ($this->name === 'Sulfuras, Hand of Ragnaros') {
            return;
        }
        $this->sellIn = $this->sellIn - 1;

        if ($this->name === 'Aged Brie') {
            $this->quality = $this->quality + 1;
            if ($this->sellIn < 0) {
                $this->quality = $this->quality + 1;
            }
        }
        else if ($this->name === 'Backstage passes to a TAFKAL80ETC concert') {
            $this->quality = $this->quality + 1;
            if ($this->sellIn < 10) {
                $this->quality = $this->quality + 1;
            }
            if ($this->sellIn < 5) {
                $this->quality = $this->quality + 1;
            }
            if ($this->sellIn < 0) {
                $this->quality = 0;
            }
        }
        else if (str_contains($this->name, 'Conjured')) {
            $this->quality = $this->quality - 2;
            if ($this->sellIn < 0) {
                $this->quality = $this->quality - 2;
            }
        }
        else {
            $this->quality = $this->quality - 1;
            if ($this->sellIn < 0) {
                $this->quality = $this->quality - 1;
            }
        }

        if ($this->quality < 0) {
            $this->quality = 0;
        }
        if ($this->quality > 50) {
            $this->quality = 50;
        }
    }
}
