<?php

namespace App\Domain\Repository;

use Etyka\Repository\Repository;

class LeaderboardRepository extends Repository
{
    public function getAllSorted(): array
    {
        $entities = $this->getAll();
        usort($entities, function ($a, $b) {
            return ($a->getScore() >= $b->getScore()) ? -1 : 1;
        });
        return $entities;
    }
}