<?php


namespace App\Controller;


use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    public function __construct()
    {
    }

    /**
     * @Route("register", name="registerUser", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request)
    {
        try
        {
            $user = new User();

            $data = json_decode($request->getContent(), true);

            $user->setEmail($data['email']);
            $user->setPassword($data['password']);

            $this->getDoctrine()->getManager()->persist($user);
            $this->getDoctrine()->getManager()->flush();
            $this->getDoctrine()->getManager()->clear();

            return $this->json(['Done'=>true]);
        }
        catch(\Exception $exception)
        {}
    }
}