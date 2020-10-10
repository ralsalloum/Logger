<?php


namespace App\Controller;


use App\Entity\Rating;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RatingController extends AbstractController
{
    public function __construct()
    {
    }

    /**
     * @Route("rating", name="createRating", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        $rating = new Rating();

        $data = json_decode($request->getContent(), true);

        $rating->setUserID($data['userID']);
        $rating->setRate($data['rate']);
        $rating->setAnimeID($data['animeID']);

        $this->getDoctrine()->getManager()->persist($rating);
        $this->getDoctrine()->getManager()->flush();
        $this->getDoctrine()->getManager()->clear();

        return $this->json(['rated'=>true]);
    }
}