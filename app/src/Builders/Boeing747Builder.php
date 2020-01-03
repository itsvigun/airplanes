<?php declare(strict_types=1);

namespace Aircrafts\Builders;

use Aircrafts\Models\Airplane;
use Aircrafts\Models\Takeoff;
use Aircrafts\Models\Fly;
use Aircrafts\Models\Land;
use Aircrafts\Models\Aircraft;

class Boeing747Builder implements Builder
{
    /**
     * @var Airplane
     */
    private $airplane;

    public function addTakeoffProperties()
    {
        $this->airplane->setProperty(Takeoff::CAN_TAKEOFF_FROM_RUNWAY, new Takeoff());
    }

    public function addFlyProperties()
    {
        $this->airplane->setProperty(Fly::CAN_FLY_ANY_WEATHER, new Fly());
        $this->airplane->setProperty(Fly::CAN_FLY_ANY_TIME, new Fly());
    }

    public function addLandProperties()
    {
        $this->airplane->setProperty(Land::CAN_LAND_ON_RUNWAY, new Land());
    }

    public function createAircraft()
    {
        $this->airplane = new Airplane();
    }

    public function getAircraft(): Aircraft
    {
        return $this->airplane;
    }
}
