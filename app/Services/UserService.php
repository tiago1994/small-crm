<?php

namespace App\Services;

use App\Repositories\Eloquent\UserRepository;

class UserService
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAll()->all();
    }

    public function getAllPaginate()
    {
        return $this->repository->getAll()->paginate(config('app.paginate_limit'));
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function save($request)
    {
        return $this->repository->save($request);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
