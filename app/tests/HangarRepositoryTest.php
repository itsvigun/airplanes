<?php declare(strict_types=1);

namespace Aircrafts\Tests;

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

        $id = -1; //fake id
        $result = $repository->getAircraftsInfoById($id);
        $this->assertCount(0, $result);
    }
}
