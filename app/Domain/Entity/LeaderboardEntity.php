<?php

namespace Domain\Entity;

use DateTime;
use LeanMapper\Entity;

class LeaderboardEntity extends Entity
{
    public const ID = 'id';
    public const NAME = 'name';
    public const SCORE = 'score';
    public const DATE = 'date';

    public function getId(): int
    {
        return (int)$this->row->{self::ID};
    }

    public function setId(int $id): void
    {
        $this->row->{self::ID} = $id;
    }

    public function getName(): string
    {
        return $this->row->{self::NAME};
    }

    public function setName(string $name): void
    {
        $this->row->{self::NAME} = $name;
    }

    public function getScore(): int
    {
        return (int)$this->row->{self::SCORE};
    }

    public function setScore(int $score): void
    {
        $this->row->{self::SCORE} = $score;
    }

    public function getDate(): DateTime
    {
        return $this->row->{self::DATE};
    }

    public function setDate(DateTime $date): void
    {
        $this->row->{self::DATE} = $date;
    }

}