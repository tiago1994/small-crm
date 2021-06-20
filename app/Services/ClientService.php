<?php

namespace App\Services;

use App\Repositories\Eloquent\ClientRepository;

class ClientService
{
    protected $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function getAll()
    {
        return $this->clientRepository->getAll()->paginate(config('app.paginate_limit'));
    }

    public function find($id)
    {
        return $this->clientRepository->find($id);
    }

    public function delete($id)
    {
        return $this->clientRepository->delete($id);
    }

    public function save($request)
    {
        return $this->clientRepository->save($request);
    }
}
