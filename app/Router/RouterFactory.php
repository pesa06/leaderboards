<?php

declare(strict_types=1);

namespace App\Router;

use Domain\Entity\ArticleEntity;
use Domain\Entity\TeamEntity;
use Domain\Repository\ArticleRepository;
use Domain\Repository\TeamRepository;
use Nette;
use Nette\Application\Routers\RouteList;
use Nette\Routing\Route;


final class RouterFactory
{
    public function createRouter(): RouteList
    {
        $router = new RouteList;
        $router->addRoute('<presenter>/<action>[/<id>]', 'Api:Leaderboards:default');

        return $router;
    }
}
