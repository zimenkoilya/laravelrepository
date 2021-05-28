<?php

namespace App\Transformers;

use App\Models\Service;
use League\Fractal\TransformerAbstract;

class ServiceTransformer extends TransformerAbstract
{
    public function transform(Service $service)
    {
        return [
            'id' => $service->id,
            'name' => $service->name,
            'description' => $service->description,
            'key' => $service->key
        ];
    }
}
