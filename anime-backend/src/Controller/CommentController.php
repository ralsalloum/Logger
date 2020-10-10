<?php


namespace App\Controller;


use App\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    public function __construct()
    {
    }

    /**
     * @Route("/comment", name="createComment", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request)
    {
        $comment = new Comment();

        $data = json_decode($request->getContent(), true);

        $comment->setUserID($data['userID']);
        $comment->setText($data['text']);
        $comment->setAnimeID($data['animeID']);

        $this->getDoctrine()->getManager()->persist($comment);
        $this->getDoctrine()->getManager()->flush();
        $this->getDoctrine()->getManager()->clear();

        return $this->json(['created comment'=>true]);
    }
}