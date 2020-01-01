<?php declare(strict_types=1);

namespace Aircrafts;

use Aircrafts\Models\Aircraft;

interface Builder
{
    public function createAircraft();

    public function addTakeoffProperties();

    public function addFlyProperties();

    public function addLandProperties();

    public function getAircraft(): Aircraft;
}
