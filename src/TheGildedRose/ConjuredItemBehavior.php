<?php

namespace EdemotsCourses\EsgiDesignPattern\TheGildedRose;

class ConjuredItemBehavior implements ItemBehavior
{
    public function update(Item $item): void
    {
        $item->sellIn--;
        $item->quality = max(0, $item->quality - 2);

        if ($item->sellIn < 0) {
            $item->quality = max(0, $item->quality - 2);
        }
    }
}
