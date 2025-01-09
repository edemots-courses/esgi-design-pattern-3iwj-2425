<?php

namespace EdemotsCourses\EsgiDesignPattern\TheGildedRose;

class AgedBrieBehavior implements ItemBehavior
{
    public function update(Item $item): void
    {
        $item->sellIn--;
        $item->quality = min(50, $item->quality + 1);

        if ($item->sellIn < 0) {
            $item->quality = min(50, $item->quality + 1);
        }
    }
}
