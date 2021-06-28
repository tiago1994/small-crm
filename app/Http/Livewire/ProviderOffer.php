<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OfferProvider;

class ProviderOffer extends Component
{
    public OfferProvider $offer_provider;

    protected $rules = [
        'offer_provider.description' => 'required',
        'offer_provider.value' => 'required'
    ];

    public function mount($code){
        $code_url = base64_decode($code);
        if(!$code_url){
            return abort(404);
        }

        $json_decoded = json_decode($code_url, true);

        if(!is_array($json_decoded) || !array_key_exists('offer_id', $json_decoded) || !array_key_exists('provider_id', $json_decoded)){
            return abort(404);
        }

        $check_offer = OfferProvider::where([
            'offer_id' => $json_decoded['offer_id'],
            'provider_id' => $json_decoded['provider_id']
        ])->firstOrFail();

        $this->offer_provider = $check_offer;
        $this->offer_provider->value = number_format($this->offer_provider->value, 2, ',', '.');
    }

    public function render()
    {
        return view('livewire.provider-offer')
            ->layout('layouts.guest')
            ->section('slot');
    }

    public function submit(){
        $this->validate();
        $this->offer_provider->save();
    }
}
