<?php

$groundFactory = new GroundShippingFactory();
$airFactory = new AirShippingFactory();
$seaFactory = new SeaShippingFactory();

$groundInfo = $groundFactory->getShippingInfo(10, 100, '123456');
$airInfo = $airFactory->getShippingInfo(10, 100, '123456');
$seaInfo = $seaFactory->getShippingInfo(10, 100, '123456');
