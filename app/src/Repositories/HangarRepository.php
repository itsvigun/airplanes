<?php declare(strict_types=1);

namespace Aircrafts\Repositories;

/**
 * @Todo refactor DB query handling
 *
 * Class HangarRepository
 * @package Aircrafts\Repositories
 */
class HangarRepository
{
    /**
     * @var \PDO
     */
    private $pdo;

    public function __construct()
    {
        $dsn = DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME;
        $this->pdo = new \PDO($dsn, DB_USER, DB_PASSWORD);
    }

    /**
     * Get aircrafts info by Hangar id
     *
     * @param int $id
     * @return array
     */
    public function getAircraftsInfoById($id)
    {
        $sql = 'select aircraft.name, hangar_aircrafts.amount from hangar_aircrafts 
            join aircraft on aircraft.id = hangar_aircrafts.aircraft_type_id
            where hangar_aircrafts.hangar_id = :hangar_id';
        $query = $this->pdo->prepare($sql);
        $query->execute([
            ":hangar_id" => $id,
        ]);
        $result =$query->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    /**
     * Get id by name
     *
     * @param $name
     * @return int|null
     */
    public function getIdByName($name)
    {
        $sql = 'select id from hangars where name = :name limit 1';
        $query = $this->pdo->prepare($sql);
        $query->execute([
            ":name" => $name,
        ]);
        $result =$query->fetch(\PDO::FETCH_ASSOC);
        $id = null;
        if ($result) {
            $id = $result['id'];
        }

        return $id;
    }
}
