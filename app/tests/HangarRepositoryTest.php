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
use Aircrafts\Repositories\HangarRepository;
use PHPUnit\Framework\TestCase;
require_once ('../config.php');

class HangarRepositoryTest extends TestCase
{
    public function testGetDatsById()
    {
        $repository = new HangarRepository();
        $name = 'Aeroprakt';
        $id = $repository->getIdByName($name);
        $result = $repository->getAircraftsInfoById($id);
        $this->assertCount(3, $result);

        $id = 151;
        $result = $repository->getAircraftsInfoById($id);
        $this->assertCount(0, $result);
    }
}
