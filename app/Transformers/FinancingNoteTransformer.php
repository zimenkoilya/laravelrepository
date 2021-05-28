<?php

namespace App\Transformers;

use App\Models\FinancingNote;
use League\Fractal\TransformerAbstract;

class FinancingNoteTransformer extends TransformerAbstract
{
    public function transform(FinancingNote $FinancingNote)
    {
        return [
            'id' => $FinancingNote->id,
            'name' => $FinancingNote->name,
            'description' => $FinancingNote->description,
            'permissions' => $FinancingNote->permissions,
            'is_default' => $FinancingNote->is_default,
            'created_at' => $FinancingNote->created_at,
            'updated_at' => $FinancingNote->updated_at
        ];
    }
}
