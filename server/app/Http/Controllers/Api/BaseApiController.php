<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Auth\UserContext;
use Illuminate\Http\Request;

class BaseApiController extends Controller
{
    protected function userContext(): UserContext
    {
        return app(UserContext::class);
    }

    protected function userId(): ?int
    {
        return $this->userContext()->userId ?? null;
    }
}
