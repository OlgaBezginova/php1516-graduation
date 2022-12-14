<?php

namespace App\Services\Auth;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

/**
 *
 */
class HttpUserAuthenticationService
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var Request
     */
    private $request;

    /**
     * @param UserRepository $userRepository
     * @param Request $request
     */
    public function __construct(
        UserRepository $userRepository,
        Request $request
    ) {
        $this->userRepository = $userRepository;
        $this->request = $request;
    }

    /**
     * @return void
     */
    public function attempt()
    {
        if (!$token = $this->request->bearerToken()) {
            throw new \Exception('Token not provided', 403);
        }

        if (!$user = $this->userRepository->byToken($token)) {
            throw new \Exception('Token is invalid', 403);
        }

        $userContext = new UserContext($user->id, $user->email);

        App::instance(UserContext::class, $userContext);
    }
}
