<?php

namespace App\Services;

use App\Repositories\Eloquent\ClientRepository;

class ClientService
{
    protected $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAll()->get();
    }
    
    public function getAllPaginate()
    {
        return $this->repository->getAll()->paginate(config('app.paginate_limit'));
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function save($request)
    {
        return $this->repository->save($request);
    }
}
