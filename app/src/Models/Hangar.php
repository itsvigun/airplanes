<?php declare(strict_types=1);

namespace Aircrafts\Models;

use Aircrafts\Repositories\HangarRepository;

class Hangar
{
    /**
     * @var HangarRepository
     */
    private $repository;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    public function __construct()
    {
        $this->repository = new HangarRepository();
    }

    /**
     * @return HangarRepository
     */
    public function getRepository(): HangarRepository
    {
        return $this->repository;
    }

    /**
     * @param HangarRepository $repository
     */
    public function setRepository(HangarRepository $repository): void
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt($createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt($updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getAircraftsById($id)
    {
        return $this->repository->getAircraftsInfoById($id);
    }
}
