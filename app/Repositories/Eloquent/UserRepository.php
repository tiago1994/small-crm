<?php

namespace App\Repositories\Eloquent;

use App\Models\User;

class UserRepository
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getAll()
    {
        return $this->user->all();
    }

    public function find($id)
    {
        return $this->user->find($id);
    }
}
