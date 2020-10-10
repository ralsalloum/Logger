<?php


namespace App\EventListener;


use App\Entity\Comment;
use App\Entity\Grade;
use App\Entity\Rating;
use App\Entity\User;
use App\Repository\GradeRepository;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class UserGrade
{
    private $gradeRepository;

    public function __construct(GradeRepository $gradeRepository)
    {
        $this->gradeRepository = $gradeRepository;
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getObject();

        if($entity instanceof User)
        {
            $entityManager = $args->getObjectManager();

            $grade = new Grade();

            $grade->setUserID($entity);
            $grade->setPoints(0);

            $entityManager->persist($grade);
            $entityManager->flush();
        }
        elseif ($entity instanceof Comment)
        {
            $entityManager = $args->getObjectManager();

            $gradeEntity = $this->gradeRepository->findByUserID($entity->getUserID());

            $pre_points = $gradeEntity->getPoints();

            $gradeEntity->setPoints($pre_points + 2);

            $entityManager->flush();
        }
        elseif ($entity instanceof Rating)
        {
            $entityManager = $args->getObjectManager();

            $ratingEntity = $this->gradeRepository->findByUserID($entity->getUserID());

            $pre_points = $ratingEntity->getPoints();

            $ratingEntity->setPoints($pre_points + 3);

            $entityManager->flush();
        }
    }
}