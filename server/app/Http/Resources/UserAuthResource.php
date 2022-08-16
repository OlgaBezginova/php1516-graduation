<?php

namespace App\Http\Resources;

use App\Repositories\UserRepository;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class UserAuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'token' => $this->userRepository()->tokenByUserId($this->id),
        ];
    }

    private function userRepository(): UserRepository
    {
        return app(UserRepository::class);
    }
}
