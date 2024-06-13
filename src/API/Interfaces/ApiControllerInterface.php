<?php

namespace App\API\Interfaces;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface ApiControllerInterface
{
    public function get(Request $request): Response;
    public function post(Request $request): Response;
    public function put(Request $request): Response;
    public function delete(Request $request): Response;
}