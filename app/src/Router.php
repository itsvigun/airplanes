<?php declare(strict_types=1);

namespace Aircrafts;

class Router
{
    private $routing = [
        'hangars' => 'Hangar',
    ];

    public function parseURL($url)
    {
        if ($url) {
            $parts = explode('/', $url);
        }
        $endpoints = array_keys($this->routing);
        if (in_array($parts[1], $endpoints) && isset($parts[2])) {
            $controller = $this->routing[$parts[1]];
            array_shift($parts);
            array_shift($parts);
        } else {
            echo 'Incorrect endpoint';
            die;
        }

        return [
            $controller,
            $parts
        ];
    }
}
