<?php

namespace App\Transformer;

use Domain\Entity\LeaderboardEntity;

class LeaderboardTransformer
{
    public function transform(LeaderboardEntity $entity): array
    {
        return [
            'name' => $entity->getName(),
            'score' => $entity->getScore(),
            'date' => $entity->getDate()->format('d. m. Y'),
        ];
    }
}