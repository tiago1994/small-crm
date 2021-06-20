<?php

namespace App\Repositories\Eloquent;

use App\Models\Client;

class ClientRepository
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getAll()
    {
        return $this->client->query();
    }

    public function find($id)
    {
        return $this->client->find($id);
    }

    public function delete($id)
    {
        return $this->client->find($id)->delete();
    }

    public function save($request)
    {
        return $this->client->updateOrCreate(
            ['id' => $request['id']],
            [
                'name' => $request['name'],
                'email' => $request['email'],
                'cpf' => $request['cpf'],
                'phone' => $request['phone'],
                'whatsapp' => $request['whatsapp']
            ]
        );
    }
}
