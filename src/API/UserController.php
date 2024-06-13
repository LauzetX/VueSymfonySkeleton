<?php

namespace App\API;

use App\API\Interfaces\ApiControllerInterface;
use App\API\Models\UserModel;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\PasswordHasher\PasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class UserController extends AbstractController implements ApiControllerInterface
{
    public function __construct(
        private readonly UserRepository $userRepository,
        private readonly SerializerInterface $serializer,
        private readonly UserPasswordHasherInterface $passwordHasher,
        private readonly EntityManagerInterface $entityManager
    ) {

    }

    #[Route('api/get/user/{id}', name: 'user_get', methods: ['GET'])]
    public function get(Request $request): Response
    {
        $user = $this->userRepository->find(1);
        $serializedUser = $this->serializer->serialize($user, 'json', ['groups' => 'METHOD_GET']);
        return new Response($serializedUser, Response::HTTP_OK, ['Content-Type' => 'application/json']);
    }

    #[Route('api/post/user', name: 'user_post', methods: ['POST'])]
    public function post(Request $request): Response
    {
        $ser = $this->serializer->deserialize(
            $request->request->get('data'),
            UserModel::class,
            'json'
        );

        $user = new User();
        $user->setEmail($ser->getEmail());
        $user->setName($ser->getName());
        $user->setPassword(
            $this->passwordHasher->hashPassword($user, 'temp')
        );

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return new Response('ok', Response::HTTP_CREATED, ['Content-Type' => 'application/json']);
    }

    public function put(Request $request): Response
    {
        return new JsonResponse([
            'data' => $this->getUser(),
        ]);
    }

    public function delete(Request $request): Response
    {
        return new JsonResponse([
            'data' => $this->getUser(),
        ]);
    }
}