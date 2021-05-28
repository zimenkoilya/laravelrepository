<?php

namespace App\Repositories;

use App\Models\BillingFormSetting;

class BillingFormSettingRepository
{
    use BaseRepository;

    /**
     * BillingFormSetting Model
     *
     * @var BillingFormSetting
     */
    protected $model;

    /**
     * Constructor
     *
     * @param BillingFormSetting $billingFormSetting
     */
    public function __construct(BillingFormSetting $billingFormSetting)
    {
        $this->model = $billingFormSetting;
    }
}