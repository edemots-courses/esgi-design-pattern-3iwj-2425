<?php

namespace EdemotsCourses\EsgiDesignPattern\TheGildedRose;

class BackstagePassBehavior implements ItemBehavior
{
    public function update(Item $item): void
    {
        $item->sellIn--;

        if ($item->sellIn < 0) {
            $item->quality = 0;
            return;
        }

        if ($item->sellIn < 5) {
            $item->quality = min(50, $item->quality + 3);
        } elseif ($item->sellIn < 10) {
            $item->quality = min(50, $item->quality + 2);
        } else {
            $item->quality = min(50, $item->quality + 1);
        }
    }
}
