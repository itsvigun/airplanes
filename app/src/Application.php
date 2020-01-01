<?php declare(strict_types=1);

namespace Aircrafts;

use Aircrafts\Controllers\HangarController;

class Application
{
    public function run()
    {
        $url = $_SERVER['REQUEST_URI'] ?? null;
        $router = new Router();
        list($controller, $params) = $router->parseURL($url);

        $data = null;
        switch ($controller) {
            case 'Hangar':
                $hangars = new HangarController();
                $id = $params[0];
                $data = $hangars->getAircraftsByIdAction($id);
                break;
            default:
                break;
        }

        echo Response::generateResponse($data, Response::RESPONSE_STATUS_SUCCESS);
    }
}
