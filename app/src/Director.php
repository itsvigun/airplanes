<?php declare(strict_types=1);

namespace Aircrafts;

use Aircrafts\Models\Aircraft;

class Director
{
    public function build(Builder $builder): Aircraft
    {
        $builder->createAircraft();
        $builder->addTakeoffProperties();
        $builder->addFlyProperties();
        $builder->addLandProperties();

        return $builder->getAircraft();
    }
}
