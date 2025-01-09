<?php

namespace EdemotsCourses\EsgiDesignPattern\TheGildedRose;

class ItemBehaviorFactory
{
    public static function createBehavior(string $name): ItemBehavior
    {
        return match ($name) {
            'Aged Brie' => new AgedBrieBehavior(),
            'Backstage passes to a TAFKAL80ETC concert' => new BackstagePassBehavior(),
            'Sulfuras, Hand of Ragnaros' => new SulfurasBehavior(),
            'Conjured Mana Cake' => new ConjuredItemBehavior(),
            default => new NormalItemBehavior(),
        };
    }
}
