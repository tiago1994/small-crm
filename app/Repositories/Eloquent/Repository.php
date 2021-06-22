<?php

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\Cache;

class Repository
{
    public function fromCache($key)
    {
        $model = Cache::get($key);
        return collect(json_decode($model, true));
    }

    public function checkCache($key)
    {
        return Cache::get($key);
    }

    public function storeCache($key, $collection)
    {
        $data = $collection->get()->toJson();
        Cache::add($key, $data);
        return collect(json_decode($data, true));
    }
}
