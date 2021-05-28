<?php

namespace App\Transformers;

use App\Models\Billing;
use League\Fractal\TransformerAbstract;

class BillingTransformer extends TransformerAbstract
{
    public function transform(Billing $billing)
    {
        return [
            'id' => $billing->id,
            'type' => $billing->type,
            'card_type' => $billing->card_type,
            'title' => $billing->title,
            'name_on_account' => $billing->name_on_account,
            'bank_name' => $billing->bank_name,
            'type_id' => $billing->type_id,
            'routing_number' => $billing->routing_number,
            'account_number' => $billing->account_number,
            'credit_card_number' => $billing->credit_card_number,
            'name_on_card' => $billing->name_on_card,
            'exp_month' => $billing->exp_month,
            'exp_year' => $billing->exp_year,
            'cvv' => $billing->cvv,
            'billing_street' => $billing->billing_street,
            'billing_street_2' => $billing->billing_street_2,
            'billing_city' => $billing->billing_city,
            'billing_state' => $billing->billing_state,
            'billing_zip' => $billing->billing_zip,
            'active' => $billing->active,
            'created_by' => $billing->created_by,
            'updated_by' => $billing->updated_by,
            'auth_count' => $billing->auth_count,
            'verified' => $billing->verified,
            'verify_status_id' => $billing->verify_status_id,
            'verify_transaction_id' => $billing->verify_transaction_id,
            'verify_details' => $billing->verify_details,
            'anet_profile' => $billing->anet_profile,
            'verify_id' => $billing->verify_id,
            'created_at' => $backupDownload->created_at,
            'updated_at' => $backupDownload->updated_at,
        ];
    }
}
