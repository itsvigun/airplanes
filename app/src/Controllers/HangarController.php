<?php declare(strict_types=1);

namespace Aircrafts\Controllers;

use Aircrafts\Services\HangarService;

class HangarController
{
    private $hangarService;

    public function __construct()
    {
        $this->hangarService = new HangarService();
    }

    public function getAircraftsByIdAction($id) {
        return $this->hangarService->getAircraftsById($id);
    }
}
