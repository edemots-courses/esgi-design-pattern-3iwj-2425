<?php

declare(strict_types=1);

namespace EdemotsCourses\EsgiDesignPattern\TheGildedRose;

final class GildedRose
{
    /**
     * @param Item[] $items
     */
    public function __construct(
        private array $items
    ) {
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            $strategy = $this->getUpdateStrategy($item);
            $strategy->updateQuality($item);  

            if ($item->name !== 'Sulfuras, Hand of Ragnaros') {
                $item->sellIn -= 1;
            }

            if ($item->sellIn < 0) {
                $strategy->updateQuality($item);
            }
        }
    }


    private function getUpdateStrategy(Item $item): QualityUpdateStrategy
    {
        switch ($item->name) {
            case 'Aged Brie':
                return new AgedBrieQualityUpdateStrategy();
            case 'Backstage passes to a TAFKAL80ETC concert':
                return new BackstagePassesQualityUpdateStrategy();
            case 'Sulfuras, Hand of Ragnaros':
                return new SulfurasQualityUpdateStrategy();
            case strpos($item->name, 'Conjured') !== false:
                return new ConjuredItemQualityUpdateStrategy();
            default:
                return new NormalItemQualityUpdateStrategy();
        }
    }
}

interface QualityUpdateStrategy
{
    public function updateQuality(Item $item): void;
}

class NormalItemQualityUpdateStrategy implements QualityUpdateStrategy
{
    public function updateQuality(Item $item): void
    {
        if ($item->quality > 0) {
            $item->quality -= 1;
        }
    }
}

class AgedBrieQualityUpdateStrategy implements QualityUpdateStrategy
{
    public function updateQuality(Item $item): void
    {
        if ($item->quality < 50) {
            $item->quality += 1;
        }
    }
}

class BackstagePassesQualityUpdateStrategy implements QualityUpdateStrategy
{
    public function updateQuality(Item $item): void
    {
        if ($item->quality < 50) {
            $item->quality += 1;

            if ($item->sellIn < 11) {
                $item->quality += 1;
            }
            if ($item->sellIn < 6) {
                $item->quality += 1;
            }
        }

        // Assurer que la qualité ne dépasse jamais 50
        if ($item->quality > 50) {
            $item->quality = 50;
        }

        // Après la date de péremption, la qualité devient 0
        if ($item->sellIn < 0) {
            $item->quality = 0;
        }
    }
}


class ConjuredItemQualityUpdateStrategy implements QualityUpdateStrategy
{
    public function updateQuality(Item $item): void
    {
        if ($item->quality > 0) {
            $item->quality -= 2;
        }
    }
}

class SulfurasQualityUpdateStrategy implements QualityUpdateStrategy
{
    public function updateQuality(Item $item): void
    {
    }
}
