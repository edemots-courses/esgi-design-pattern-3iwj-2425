<?php

namespace EdemotsCourses\EsgiDesignPattern\TheGildedRose;

class NormalItemBehavior implements ItemBehavior
{
    public function update(Item $item): void
    {
        $item->sellIn--;
        $item->quality = max(0, $item->quality - 1);

        if ($item->sellIn < 0) {
            $item->quality = max(0, $item->quality - 1);
        }
    }
}
