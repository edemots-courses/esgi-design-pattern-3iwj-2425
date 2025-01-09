<?php

namespace EdemotsCourses\EsgiDesignPattern\TheGildedRose;

interface ItemBehavior
{
    public function update(Item $item): void;
}
