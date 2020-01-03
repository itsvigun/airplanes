<?php declare(strict_types=1);

namespace Aircrafts\Builders;

use Aircrafts\Models\Airplane;
use Aircrafts\Models\Takeoff;
use Aircrafts\Models\Fly;
use Aircrafts\Models\Land;
use Aircrafts\Models\Aircraft;

class A24Builder implements Builder
{
    /**
     * @var Airplane
     */
    private $airplane;

    public function addTakeoffProperties()
    {
        $this->airplane->setProperty(Takeoff::CAN_TAKEOFF_FROM_RUNWAY, new Takeoff());
        $this->airplane->setProperty(Takeoff::CAN_TAKEOFF_FROM_WATER, new Takeoff());
    }

    public function addFlyProperties()
    {
        $this->airplane->setProperty(Fly::CAN_FLY_GOOD_WEATHER_ONLY, new Fly());
        $this->airplane->setProperty(Fly::CAN_FLY_DAYTIME_ONLY, new Fly());
    }

    public function addLandProperties()
    {
        $this->airplane->setProperty(Land::CAN_LAND_ON_RUNWAY, new Land());
        $this->airplane->setProperty(Land::CAN_LAND_ON_WATER, new Land());
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
