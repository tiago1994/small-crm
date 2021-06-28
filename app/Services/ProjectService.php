<?php

namespace App\Services;

use App\Repositories\Eloquent\ProjectRepository;

class ProjectService
{
    protected $repository;

    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllPaginate()
    {
        return $this->repository->getAll()->orderBy('created_at', 'DESC')->paginate(config('app.paginate_limit'));
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
    
    public function save($request)
    {
        return $this->repository->save($request);
    }
    
    public function find($id)
    {
        return $this->repository->find($id);
    }
}
