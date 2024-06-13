<?php

namespace App\Controller;

use http\Header;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Csrf\CsrfTokenManager;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class ApiController extends AbstractController
{
    #[Route('/api/get', name: 'api_get', requirements: ['spaRouting' => '.*'], defaults: ["spaRouting" => null], methods: ['GET'], priority: "-1")]
    public function get(Request $request): Response
    {
        $apiModule = $request->headers->get('X-Requested-Module');
        $id = $request->query->get('id');
        $controller = 'App\API\\'.$apiModule.'Controller::get';
        $requestInner = new Request();

        $requestInner->attributes->set(
            '_controller',
            $controller
        );

        $requestInner->request->set('id',$id);

        $httpKernel = $this->container->get('http_kernel');

        $response = $httpKernel->handle(
            $requestInner,
            HttpKernelInterface::SUB_REQUEST
        );

        dump($response->getContent());

        return $response;
    }

    #[Route('/api/post', name: 'api_post', requirements: ['spaRouting' => '.*'], defaults: ["spaRouting" => null], methods: ['POST'], priority: "-1")]
    public function post(Request $request): Response
    {
        dump($request);
        $apiModule = $request->headers->get('X-Requested-Module');
        $controller = 'App\API\\'.$apiModule.'Controller::post';
        $requestInner = new Request();

        $requestInner->attributes->set(
            '_controller',
            $controller
        );

        $requestInner->request->set('data', $request->getContent());

        dump($requestInner);
        $httpKernel = $this->container->get('http_kernel');

        $response = $httpKernel->handle(
            $requestInner,
            HttpKernelInterface::SUB_REQUEST
        );

        return $response;
    }

    #[Route('/api/login', name: 'api_login', requirements: ['spaRouting' => '.*'], defaults: ["spaRouting" => null], methods: ['POST'], priority: "-1")]
    public function login(Request $request, Security $security, SerializerInterface $serializer): Response
    {
        dump($request);
        //$serializer->deserialize($request)

        return new Response('OK', Response::HTTP_OK, [

        ]);
    }

    #[Route('/api/get-csrf-token', name: 'get-csrf-token', methods: ['GET'])]
    public function getCsrfToken(CsrfTokenManagerInterface $csrfTokenManager): JsonResponse
    {
        $csrfToken = $csrfTokenManager->getToken('csrf_token')->getValue();
        return $this->json(['csrf_token' => $csrfToken]);
    }
}