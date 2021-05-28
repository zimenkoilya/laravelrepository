<?php

namespace App\Transformers;

use App\Models\EmailDomainAlias;
use League\Fractal\TransformerAbstract;

class EmailDomainAliasTransformer extends TransformerAbstract
{
    public function transform(EmailDomainAlias $EmailDomainAlias)
    {
        return [
            'id' => $EmailDomainAlias->id,
            'name' => $EmailDomainAlias->name,
            'description' => $EmailDomainAlias->description,
            'permissions' => $EmailDomainAlias->permissions,
            'is_default' => $EmailDomainAlias->is_default,
            'created_at' => $EmailDomainAlias->created_at,
            'updated_at' => $EmailDomainAlias->updated_at
        ];
    }
}
