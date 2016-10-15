<?php

namespace App\Action;

class SignUp 
{
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next = null
    ) : JsonResponse
    {
        $users = $this->gateway->getUsers();
        $userArray = [];

        if (count($users) === 0) {
            return new JsonResponse($userArray);
        }

        foreach ($users as $user) {
            $userArray[] = $user->toArray();
        }

        return new JsonResponse($userArray);
    }
}
