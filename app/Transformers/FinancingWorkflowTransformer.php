<?php

namespace App\Transformers;

use App\Models\FinancingWorkflow;
use League\Fractal\TransformerAbstract;

class FinancingWorkflowTransformer extends TransformerAbstract
{
    public function transform(FinancingWorkflow $FinancingWorkflow)
    {
        return [
            'id' => $FinancingWorkflow->id,
            'name' => $FinancingWorkflow->name,
            'description' => $FinancingWorkflow->description,
            'permissions' => $FinancingWorkflow->permissions,
            'is_default' => $FinancingWorkflow->is_default,
            'created_at' => $FinancingWorkflow->created_at,
            'updated_at' => $FinancingWorkflow->updated_at
        ];
    }
}
