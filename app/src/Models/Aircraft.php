<?php declare(strict_types=1);

namespace Aircrafts\Models;

abstract class Aircraft
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var object[]
     */
    private $properties = [];

    public function setProperty(string $key, object $value)
    {
        $this->properties[$key] = $value;
    }

    public function getProperties() {
        return $this->properties;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

}
