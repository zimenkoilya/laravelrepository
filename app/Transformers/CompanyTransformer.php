<?php

namespace App\Transformers;

use App\Models\Company;
use League\Fractal\TransformerAbstract;

class CompanyTransformer extends TransformerAbstract
{
    public function transform(Company $company)
    {
        return [
            'id' => $company->id,
            'name' => $company->name,
            'long_name' => $company->long_name,
            'legal_name' => $company->legal_name,
            'email' => $company->email,
            'logo' => $company->logo,

            'office_address' => $company->office_address,
            'office_address_2' => $company->office_address_2,
            'office_city' => $company->office_city,
            'office_state' => $company->office_state,
            'office_fax' => $company->office_fax,
            'office_phone' => $company->office_phone,

            'cs_phone' => $company->cs_phone,
            'cs_email' => $company->cs_email,

            'website' => $company->website,
            'client_portal_url' => $company->client_portal_url,
            'social_facebook' => $company->social_facebook,
            'social_instagram' => $company->social_instagram,
            'social_twitter' => $company->social_twitter,
            'social_googleplus' => $company->social_googleplus,
            'social_linkedin' => $company->social_linkedin,

            'suspended' => $company->suspended,
            'active' => $company->active,

            'created_at' => $company->created_at,
            'updated_at' => $company->updated_at,

            'accounting_types' => $company->accounting_types,
            'payment_schedule_types' => $company->payment_schedule_types,
            'document_templates' => $company->document_templates,
            'services' => $company->services,
        ];
    }
}
