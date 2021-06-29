<?php

namespace App\Services;

use App\Repositories\Eloquent\OfferProviderRepository;
use App\Services\OfferEmailService;

class OfferProviderService
{
    protected $repository;

    public function __construct(OfferProviderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getOfferProvider($offer_id, $provider_id)
    {
        return $this->repository->getAll()->where([
            'offer_id' => $offer_id,
            'provider_id' => $provider_id
        ])->firstOrFail();
    }

    public function save($offer_id, $provider_id)
    {
        try {
            $this->repository->save($offer_id, $provider_id);
            $service = new OfferEmailService();
            $service->sendEmail($offer_id, $provider_id);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
