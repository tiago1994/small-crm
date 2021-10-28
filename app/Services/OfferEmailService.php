<?php

namespace App\Services;
use App\Mail\OfferProvider;
use App\Models\Offer;

class OfferEmailService
{
    public function sendEmail($offer_id, $provider_id){
        $base_64 = base64_encode(
            json_encode([
                'offer_id' => $offer_id,
                'provider_id' => $provider_id
            ])
        );
        $offer = Offer::find($offer_id);

        return \Mail::to('tiagovmatos@gmail.com')->send(new OfferProvider($base_64, $offer->description));
    }
}
