<?php declare(strict_types=1);

namespace Aircrafts\Tests;

use Aircrafts\Boeing747Builder;
use Aircrafts\NC4Builder;
use Aircrafts\A24Builder;
use Aircrafts\Models\Airplane;
use Aircrafts\Director;
use Aircrafts\Models\Fly;
use Aircrafts\Models\Land;
use Aircrafts\Models\Takeoff;
use PHPUnit\Framework\TestCase;

class DirectorTest extends TestCase
{
    private $a24Properties = [
        Takeoff::CAN_TAKEOFF_FROM_WATER,
        Takeoff::CAN_TAKEOFF_FROM_RUNWAY,
        Land::CAN_LAND_ON_WATER,
        Land::CAN_LAND_ON_RUNWAY,
        Fly::CAN_FLY_GOOD_WEATHER_ONLY,
        Fly::CAN_FLY_DAYTIME_ONLY,
    ];

    private $nc4Properties = [
        Takeoff::CAN_TAKEOFF_FROM_WATER,
        Land::CAN_LAND_ON_WATER,
        Fly::CAN_FLY_GOOD_WEATHER_ONLY,
        Fly::CAN_FLY_DAYTIME_ONLY,
    ];

    private $boeing747Properties = [
        Takeoff::CAN_TAKEOFF_FROM_RUNWAY,
        Land::CAN_LAND_ON_RUNWAY,
        Fly::CAN_FLY_ANY_TIME,
        Fly::CAN_FLY_ANY_WEATHER,
    ];

    private $a24IncorrectProperties = [
        Fly::CAN_FLY_ANY_WEATHER,
        Fly::CAN_FLY_ANY_TIME,
    ];

    private $nc4IncorrectProperties = [
        Takeoff::CAN_TAKEOFF_FROM_RUNWAY,
        Land::CAN_LAND_ON_RUNWAY,
        Fly::CAN_FLY_ANY_TIME,
        Fly::CAN_FLY_ANY_WEATHER,
    ];

    private $boeing747IncorrectProperties = [
        Takeoff::CAN_TAKEOFF_FROM_WATER,
        Land::CAN_LAND_ON_WATER,
        Fly::CAN_FLY_GOOD_WEATHER_ONLY,
        Fly::CAN_FLY_DAYTIME_ONLY,
    ];

    public function testAirplaneNC4()
    {
        $builder = new NC4Builder();
        $newAirplane = (new Director())->build($builder);
        $this->assertInstanceOf(Airplane::class, $newAirplane);

        $properties = $newAirplane->getProperties();
        foreach ($this->nc4Properties as $property) {
            $this->assertArrayHasKey($property, $properties);
        }

        foreach ($this->nc4IncorrectProperties as $property) {
            $this->assertArrayNotHasKey($property, $properties);
        }
    }

    public function testAirplaneA24()
    {
        $builder = new A24Builder();
        $newAirplane = (new Director())->build($builder);
        $this->assertInstanceOf(Airplane::class, $newAirplane);

        $properties = $newAirplane->getProperties();
        foreach ($this->a24Properties as $property) {
            $this->assertArrayHasKey($property, $properties);
        }

        foreach ($this->a24IncorrectProperties as $property) {
            $this->assertArrayNotHasKey($property, $properties);
        }
    }

    public function testAirplaneBoeing747()
    {
        $builder = new Boeing747Builder();
        $newAirplane = (new Director())->build($builder);
        $this->assertInstanceOf(Airplane::class, $newAirplane);

        $properties = $newAirplane->getProperties();
        foreach ($this->boeing747Properties as $property) {
            $this->assertArrayHasKey($property, $properties);
        }

        foreach ($this->boeing747IncorrectProperties as $property) {
            $this->assertArrayNotHasKey($property, $properties);
        }
    }
}
