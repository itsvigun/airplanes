<?php declare(strict_types=1);

namespace Aircrafts\Services;

use Aircrafts\Models\Hangar;

class HangarService
{
    private $hangar;

    public function __construct()
    {
        $this->hangar = new Hangar();
    }

    public function getAircraftsById($id)
    {
        return $this->hangar->getAircraftsById($id);
    }
}
