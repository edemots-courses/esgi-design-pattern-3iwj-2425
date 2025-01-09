<?php

declare(strict_types=1);

namespace EdemotsCourses\EsgiDesignPattern\TheGildedRose;

final class GildedRose
{
    public function __construct(private array $items)
    {
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            if ($item->name !== 'Sulfuras, Hand of Ragnaros') {
                $item->sellIn--;
            }
            if (str_starts_with($item->name, 'Conjured')) {
                if ($item->quality > 0) {
                    $item->quality -= 2;
                }
            } else {
                if ($item->name !== 'Aged Brie' && $item->name !== 'Backstage passes to a TAFKAL80ETC concert') {
                    if ($item->quality > 0) {
                        if ($item->name !== 'Sulfuras, Hand of Ragnaros') {
                            $item->quality--;
                        }
                    }
                } else {
                    if ($item->quality < 50) {
                        $item->quality++;
                        if ($item->name === 'Backstage passes to a TAFKAL80ETC concert') {
                            if ($item->sellIn < 10 && $item->quality < 50) {
                                $item->quality++;
                            }
                            if ($item->sellIn < 5 && $item->quality < 50) {
                                $item->quality++;
                            }
                        }
                    }
                }
            }
            if ($item->sellIn < 0) {
                if (str_starts_with($item->name, 'Conjured')) {
                    if ($item->quality > 0) {
                        $item->quality -= 2;
                    }
                } else {
                    if ($item->name !== 'Aged Brie') {
                        if ($item->name !== 'Backstage passes to a TAFKAL80ETC concert') {
                            if ($item->quality > 0) {
                                if ($item->name !== 'Sulfuras, Hand of Ragnaros') {
                                    $item->quality--;
                                }
                            }
                        } else {
                            $item->quality = 0;
                        }
                    } else {
                        if ($item->quality < 50) {
                            $item->quality++;
                        }
                    }
                }
            }
            if ($item->quality < 0) {
                $item->quality = 0;
            }
            if ($item->quality > 50 && $item->name !== 'Sulfuras, Hand of Ragnaros') {
                $item->quality = 50;
            }
        }
    }
}
