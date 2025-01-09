<?php

declare(strict_types=1);

namespace EdemotsCourses\EsgiDesignPattern\TheGildedRose;

final class GildedRose
{
    private array $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            if ($item->name === 'Sulfuras, Hand of Ragnaros') {
                continue;
            }

            $this->updateSellIn($item);

            switch ($item->name) {
                case 'Aged Brie':
                    $this->updateAgedBrie($item);
                    break;
                case 'Backstage passes to a TAFKAL80ETC concert':
                    $this->updateBackstagePass($item);
                    break;
                case 'Conjured Mana Cake':
                    $this->updateConjuredItem($item);
                    break;
                default:
                    $this->updateNormalItem($item);
            }
        }
    }

    private function updateSellIn(Item $item): void
    {
        $item->sellIn -= 1;
    }

    private function updateAgedBrie(Item $item): void
    {
        if ($item->quality < 50) {
            $item->quality += 1;
            if ($item->sellIn < 0 && $item->quality < 50) {
                $item->quality += 1;
            }
        }
    }

    private function updateBackstagePass(Item $item): void
    {
        if ($item->sellIn < 0) {
            $item->quality = 0;
            return;
        }

        if ($item->quality < 50) {
            $item->quality += 1;
            if ($item->sellIn < 10 && $item->quality < 50) {
                $item->quality += 1;
            }
            if ($item->sellIn < 5 && $item->quality < 50) {
                $item->quality += 1;
            }
        }
    }

    private function updateConjuredItem(Item $item): void
    {
        $degradationRate = 2;
        if ($item->sellIn < 0) {
            $degradationRate *= 2;
        }

        $item->quality -= $degradationRate;

        if ($item->quality < 0) {
            $item->quality = 0;
        }
    }

    private function updateNormalItem(Item $item): void
    {
        $degradationRate = 1;
        if ($item->sellIn < 0) {
            $degradationRate *= 2;
        }

        $item->quality -= $degradationRate;

        if ($item->quality < 0) {
            $item->quality = 0;
        }
    }
}