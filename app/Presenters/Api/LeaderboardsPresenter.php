<?php
declare(strict_types=1);

namespace App\Presenters\Api;


use App\Domain\Repository\LeaderboardRepository;
use App\Transformer\LeaderboardTransformer;
use DateTime;
use Domain\Entity\LeaderboardEntity;
use Nette\Application\UI\Presenter;
use function bdump;

class LeaderboardsPresenter extends Presenter
{
    private LeaderboardRepository  $leaderboardsRepository;
    private LeaderboardTransformer $leaderboardTransformer;

    public function __construct(
        LeaderboardRepository $leaderboardsRepository,
        LeaderboardTransformer $leaderboardTransformer
    ) {
        parent::__construct();
        $this->leaderboardsRepository = $leaderboardsRepository;
        $this->leaderboardTransformer = $leaderboardTransformer;
    }

    public function actionDefault() {
        $transformed = array_map(function (LeaderboardEntity $entity) {
            return $this->leaderboardTransformer->transform($entity);
        }, $this->leaderboardsRepository->getAllSorted());
        $this->sendJson($transformed);
    }

    public function actionPush() {
        $values = $this->getHttpRequest()->getPost();
        $name = $values['name'];
        $score = $values['score'];
        $date = DateTime::createFromFormat('Y-m-d H:i:s', $values['date']);

        $entity = new LeaderboardEntity();
        $entity->setName($name);
        $entity->setScore((int)$score);
        $entity->setDate($date);
        $this->leaderboardsRepository->persist($entity);

        $this->sendJson([
            'name' => $name,
            'score' => $score,
            'date' => $date->format('d. m. Y'),
        ]);
    }
}