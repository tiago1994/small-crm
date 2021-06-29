<?php

namespace App\Repositories\Eloquent;

use App\Models\OfferProvider;

class OfferProviderRepository
{
    protected $model;

    public function __construct(OfferProvider $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->query();
    }

    public function save($offer_id, $provider_id)
    {
        return $this->model->create(['offer_id' => $offer_id, 'provider_id' => $provider_id]);
    }
}
