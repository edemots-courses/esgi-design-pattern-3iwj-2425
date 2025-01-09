<?php

declare(strict_types=1);

namespace EdemotsCourses\EsgiDesignPattern\TheGildedRose;

class Item
{
    public function __construct(
        public string $name,
        public int $quality,
        public int $sellIn
    ) {
    }

    public function tick(): void
    {
        if ($this->name === 'Sulfuras, Hand of Ragnaros') {
            return;
        }

        $this->sellIn -= 1;

        switch ($this->name) {
            case 'Aged Brie':
                $this->increaseQuality();
                if ($this->sellIn < 0) {
                    $this->increaseQuality();
                }
                break;

            case 'Backstage passes to a TAFKAL80ETC concert':
                if ($this->sellIn < 0) {
                    $this->quality = 0;
                } elseif ($this->sellIn < 5) {
                    $this->increaseQuality(3);
                } elseif ($this->sellIn < 10) {
                    $this->increaseQuality(2);
                } else {
                    $this->increaseQuality();
                }
                break;

            case 'Conjured Mana Cake':
                $this->decreaseQuality(2);
                if ($this->sellIn < 0) {
                    $this->decreaseQuality(2);
                }
                break;

            default:
                $this->decreaseQuality();
                if ($this->sellIn < 0) {
                    $this->decreaseQuality();
                }
                break;
        }
    }

    protected function increaseQuality(int $amount = 1): void
    {
        $this->quality = min(50, $this->quality + $amount);
    }

    protected function decreaseQuality(int $amount = 1): void
    {
        $this->quality = max(0, $this->quality - $amount);
    }
}